<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),
	
	'import'=>require('console_import.php'),
	'modules'=>require('console_modules.php'),
	// application components
	'components'=>require('console_components.php'),
	'params' => require('console_params.php'),        
	'commandMap' => require('console_commandMap.php')
);