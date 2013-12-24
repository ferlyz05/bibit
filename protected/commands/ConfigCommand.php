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
class ConfigCommand extends CConsoleCommand
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
  This command searches for messages to be translated in the specified
  source files and compiles them into PHP arrays as message source.

PARAMETERS
 * environment: required, the configuration of application environment
	available on your system. E.g: main, console, etc.
	
 * config-name: required, the configuration section of main.php
	that need to be configured.

   The following options are available:

   - import: autoloading model and component classes.
   - modules: configuration of modules that you'll use in your application.
   - components: application components.
   - params: application-level parameters that can be accessed.

EOD;
	}

	/**
	 * Execute the action.
	 * @param array $args command line parameters specific for this command
	 */
	public function run($args)
	{
		if(!isset($args[0]))
			$this->usageError('the application environment is not specified.');
		else
		{
			if(!isset($args[1]))
				$this->usageError('the setting name is not specified.');
			else
				if($this->confirm("Continue setting process?"))
				{
					$this->env = $args[0];
					$this->fileName = $args[0].'_'.$args[1];
					
					if($this->checkFile($this->env))
						if($this->checkFile($this->fileName))
						{
							$this->processConfig();
						}
						else
							$this->text("File {$this->fileName}.php not found");
					else
						$this->text("File {$this->env}.php not found");
				}
		}
	}

	protected function checkFile($fileName)
	{
		return is_file(Yii::getPathOfAlias('application.config.'.$fileName).'.php');
	}
	
	protected function processConfig()
	{
		$this->text("Input configuration (json format), press Enter to process:");
		$f = fopen( 'php://stdin', 'r' );

		while( $line = fgets( $f ) ) {
			if($line != PHP_EOL) $this->configs[] = $line;
			else break;
		}

		fclose( $f );
		
		ConfigHelper::parseConfig($this->fileName,$this->configs);
		
		$this->text("Done.");
	}
	
	public function text($text,$return=true) {
		if(!$return)
			return $text;
		echo $text."\n";return;
	}
}
