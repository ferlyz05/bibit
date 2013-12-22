<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),
	
	'import'=>array(
		'application.components.config.*',
	),

	'modules'=>array(
		'user'=>array(
			'class' => 'application.vendor.mishamx.yii-user.modules.user.UserModule',
		),
	),
	// application components
	'components'=>array(
		/* 'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		), */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=contest',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'app_',
		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
	'params' => array(
        'composer.callbacks' => array(
            // args for Yii command runner
            'yiisoft/yii-install' => array('yiic', 'webapp', dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'),
            'post-update' => array('yiic', 'migrate'),	//	Execute migrate command taken from commandMap
            'post-install' => array('yiic', 'migrate'),
        ),
    ),        
	'commandMap' => array(
		'migrate' => array(
			 // alias of the path where you extracted the zip file
            'class' => 'application.vendor.yiiext.migrate-command.EMigrateCommand',
            // this is the path where you want your core application migrations to be created
            'migrationPath' => 'application.migrations',
            // the name of the table created in your database to save versioning information
            'migrationTable' => 'migration',
            // the application migrations are in a pseudo-module called "core" by default
            'applicationModuleName' => 'core',
            // define all available modules (if you do not set this, modules will be set from yii app config)
			'modulePaths' => array(
				'user' => 'application.vendor.mishamx.yii-user.migrations',
			),
            // you can customize the modules migrations subdirectory which is used when you are using yii module config
            //'migrationSubPath' => 'migrations',
            // here you can configure which modules should be active, you can disable a module by adding its name to this array
            'disabledModules' => array(
				#'admin', 'anOtherModule', // ...
            ),
            // the name of the application component that should be used to connect to the database
            'connectionID' => 'db',
			// alias of the template file used to create new migrations
			#'templateFile' => 'system.cli.migration_template',
        ),
	)
);