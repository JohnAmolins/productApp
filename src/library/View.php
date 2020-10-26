<?php
# View, that calls on all pages required header, footer views 
class View {
    function __construct(){
        
    }

    public function render($name, $data=[]){
        
        require '../src/views/templates/header.php';
        require '../src/views/' . $name . '.php';
        require '../src/views/templates/footer.php';
    }

}

?>