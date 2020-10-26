<?php
# 'Bootstrap' requires all the files that are needed
# config file for constance of ROOT and URL
require_once 'config/path.php';


# autoloader for the libraries
spl_autoload_register(function($className){
    require 'library/' . $className . '.php';
});







?>