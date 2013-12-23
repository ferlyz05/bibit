<?php return array(
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
	);