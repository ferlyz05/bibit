<?php return array(
        'composer.callbacks' => array(
            // args for Yii command runner
            'yiisoft/yii-install' => array('yiic', 'webapp', dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'),
            'pre-install' => array('yiic', 'chkdir', 'migrationPath'),
            'pre-update' => array('yiic', 'chkdir', 'migrationPath'),
            'post-update' => array('yiic', 'migrate'),
            'post-install' => array('yiic', 'migrate'),
        ),
    );