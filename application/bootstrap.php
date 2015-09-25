<?php

require_once 'php-activerecord/ActiveRecord.php';
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory(__DIR__.'/models');
    $cfg->set_connections(array(
        'development' => 'mysql://root:@127.0.0.1/Store'));
});

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
define('__ROOT__',$_SERVER['DOCUMENT_ROOT']);
define('__CanCreate__',0x1);
define('__CanRead__',0x2);
define('__CanUpdate__',0x4);
define('__CanRemove__ ',0x8);
/*
define('__Viewer__',0x1);
define('__Editor __ ',0x2);*/
define('__Viewer__',"Viewer");
define('__Editor __ ',"Editor");
Route::start();