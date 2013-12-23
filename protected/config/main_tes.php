<?php return array (
  'user' => 
  array (
    'allowAutoLogin' => true,
    'class' => 'application.vendor.mishamx.yii-user.modules.user.UserModule',
  ),
  'db' => 
  array (
    'connectionString' => 'mysql:host=localhost;dbname=contest',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => 'rahasia',
    'charset' => 'utf8',
    'tablePrefix' => 'tbl_',
    'initSQLs' => 'SETNAMES\'utf8\'COLLATE\'utf8_general_ci\';',
  ),
  'errorHandler' => 
  array (
    'errorAction' => 'site/error',
  ),
  'log' => 
  array (
    'class' => 'CLogRouter',
    'routes' => 
    array (
      0 => 
      array (
        'class' => 'CFileLogRoute',
        'levels' => 'error, warning',
      ),
    ),
  ),
  'gii' => 
  array (
    'password' => '123',
  ),
  'title' => false,
);