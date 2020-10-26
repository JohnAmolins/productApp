<?php
# load models and views from other controllers; every controller extends this class
class BaseController{
    function __construct(){
        $this->view = new View();   
    }
    
    public function loadModel($model){  
        $path = '../src/models/' . $model . '.php';
        if(file_exists($path)){   
            require_once '../src/models/' . $model . '.php';
            return new $model();
        }
        
    }


}


?>