<?php session_start(); ob_start();
try {

#Load thư viện Mail
include 'Lib/PHPMailer/PhpMail.php';
#Load config
include './App/Config/database.php';
include './App/Config/config.php';
include './App/Config/routes.php';
include 'Core/DB.php';

include 'Core/Helper.php';

include 'Core/Controller.php';

#load helper_function
if (count($env_config['autoload_helper']) > 0) {
    foreach ($env_config['autoload_helper'] as $env_config_helper) {
        include './app/Helpers/' . $env_config_helper . '.php';
    }
}
if (count($env_config['autoload_core']) > 0) {
    foreach ($env_config['autoload_core'] as $env_config_core) {
        include './app/Core/' . $env_config_core . '.php';
    }
}
  #Autoload 
if (count($env_config['autoload']) > 0) {
    foreach ($env_config['autoload'] as $env_config_core) {
        include './app/Autoload/' . $env_config_core . '.php';
    }
}


#load app
include 'Core/App.php';
$APP = new App();
} catch (Exception $e) {
    echo $e->getMessage();
}