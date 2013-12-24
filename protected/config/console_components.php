<?php return array(
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'sqlite:protected/vendor/yiisoft/yii/demos/blog/protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			// uncomment the following to show log messages, create runtime folder manually under protected directory
			/* 'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				// array(
					// 'class'=>'CWebLogRoute',
				// ),
				
			), */
		),
	);