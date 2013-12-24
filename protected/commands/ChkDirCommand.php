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


	public function actionMigrationPath()
	{
		if(isset(Yii::app()->commandMap['migrate']['modulePaths']))
		{
			foreach(Yii::app()->commandMap['migrate']['modulePaths'] as $module=>$path)
			{
				$migrationPath = Yii::getPathOfAlias($path).DIRECTORY_SEPARATOR.'migrations';
				if(!$this->checkDir($migrationPath))
				{
					if($this->createDir($migrationPath))
						$this->text("Done creating migration directory of '{$module}' module.");
				}
				else
					$this->text("Migration directory of '{$module}' module alredy exist.");
			}
		}
	}

	public function ActionAlias($alias)
	{
		if($pathofalias = Yii::getPathOfAlias($alias))
			if(!$this->checkDir($pathofalias))
			{
				if($this->createDir($pathofalias))
					$this->text("Done.");
			}
			else
				$this->text("Directory alredy exist.");
	}
	
	
	protected function createDir($dirName)
	{
		return mkdir($dirName,0777,true);
	}
}
