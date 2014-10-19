<?php

/**
 * Funcion que retorna la cadena de conexion
 * segun el servidor donde se ejecute
 * si es local: retorna una cadena de conexion local
 * si es servidor de prueba: retorna conexion a servidor remoto
 */
function cadenaConexion() {
    $servidor = $_SERVER['SERVER_NAME'];
    $clave = "wfpc92.tk";
    
    //Yii::setPathOfAlias('ecalendarview', dirname(__FILE__).'/../extensions/ecalendarview');
    if (strpos($servidor, $clave) !== FALSE) {
        return array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=mysql.nixiweb.com;dbname=u974710561_proy2',
            'emulatePrepare' => true,
            'username' => 'u974710561_proy2',
            'password' => 'u974710561_proy2',
            'charset' => 'utf8',
        );
    } else {
        return array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=u974710561_proy2',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        );
    }
}

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Planificación de Actividades Diarias',
    'theme' => 'classic', // requires you to copy the theme under your themes directory
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => cadenaConexion(),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'clientScript' => array(
            'enableJavaScript' => true
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
    
);
