<?php return array(
        'composer.callbacks' => array(
            // args for Yii command runner
            'yiisoft/yii-install' => array('yiic', 'webapp', dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'),
			
            'post-install' => array('yiic', 'DbImport', 'Auto'),
            'post-update' => array('yiic', 'DbImport', 'Auto'),
			
            'post-install' => array('yiic', 'chkdir', 'migrationPath'),
            'post-update' => array('yiic', 'chkdir', 'migrationPath'),
			
            'post-install' => array('yiic', 'migrate'),
            'post-update' => array('yiic', 'migrate'),
        ),
    );