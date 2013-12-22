<?php

return array(
	'params' => array(
		'composer.callbacks' => array(
			// args for Yii command runner
			'yiisoft/yii-install' => array('yiic', 'webapp', dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'),
			'post-update' => array('yiic', 'migrate'),
			'post-install' => array('yiic', 'migrate'),
		),
		// this is displayed in the header section
		'title'=>'My Yii Blog',
		// this is used in error pages
		'adminEmail'=>'webmaster@example.com',
		// number of posts displayed per page
		'postsPerPage'=>10,
		// the copyright information displayed in the footer section
		'copyrightInfo'=>'Copyright &copy; 2009 by Ferly.',
	),
);

?>