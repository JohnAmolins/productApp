<?php
# taking care of URL's - removes'/', decides witch controller, method to load

class Core{
    # default controllers and methods
    protected $controller = 'Products';  
    protected $method = 'index';
    protected $parameters = [];  


public function __construct(){
    $url = $this->getUrl(); // getting the URL for controller to match
    
    # looking at 0 index to match Controller after the URL has been split
    $file = '../src/controllers/' . ucwords($url[0]) . '.php';  
    if(file_exists($file)){
        $this->controller = ucwords($url[0]);
        unset($url[0]);
    } 
    
    
    # creating a new Object from the Controller
    require_once '../src/controllers/' . $this->controller . '.php'; 
    $this->controller = new $this->controller;


    # check to see if there is a method after the Controller
    if (isset($url[1])) {
        if (method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        } 
    }

    
    # loads actual method and parameters if there are any
    $this->parameters = $url ? array_values($url) : [];
    call_user_func_array([$this->controller, $this->method], $this->parameters);
    
 

}
    # function that gets the URL, checks it, and breaks in an array for the Controller
    public function getUrl(){  
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }



}

?>