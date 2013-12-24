<?php
/**
 * MessageCommand class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * MessageCommand extracts messages to be translated from source files.
 * The extracted messages are saved as PHP message source files
 * under the specified directory.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system.cli.commands
 * @since 1.0
 */
class ChkDirCommand extends ConsoleCommand
{
	private $env;
	private $fileName;
	private $configs = array();
	
	public function getHelp()
	{
		return <<<EOD
USAGE
  yiic config <environment> <config-name>

DESCRIPTION
  Check migrations directory for every module defined in commandMap. 
  Create it if not available.

PARAMETERS
 * -

EOD;
	}


	public function actionAuto()
	{
		if(isset(Yii::app()->commandMap['migrate']['modulePaths']))
		{
			foreach(Yii::app()->commandMap['migrate']['modulePaths'] as $module=>$path)
			{
				$modulePath = Yii::getPathOfAlias($path);
				if(!$this->checkDir($modulePath))
				{
					if($this->scan($modulePath))
						$this->text("Succeed to import the sql data of '{$module}' module.");
				}
				else
					$this->text("'{$module}' module directory not found.");
			}
			$this->text("Done.");
		}
	}

	private function scan($dir)
	{
		$moduleDir = scandir($dir, 1);
		if(array_search('data', $moduleDir))
		{
			$dataDir = scandir($dir, 1);
			if(array_search('schema.sqlite.sql', $dataDir))
			{
				if(DLDatabaseHelper::import($dir. DIRECTORY_SEPARATOR .'data'. DIRECTORY_SEPARATOR .'schema.sqlite.sql'))
					return true;
				else
					$this->text("Import failed.");
			}
			else
				$this->text("File schema.sqlite.sql not found.");
		}
		else
			$this->text("Data folder not found.");
		return false;
	}
	
	public function actionSqlfile($path)
	{
		if(DLDatabaseHelper::import($path))
			$this->text("Succeed to import the sql data!");
		else
			$this->text("Import failed.");
	}
}
