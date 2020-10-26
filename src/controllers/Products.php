<?php
class Products extends BaseController{
    public function __construct(){
        parent::__construct();
        $this->productModel = $this->loadModel('Product');
                
    }

    public function index(){
        $this->view->render('product/index');
    }

    public function list($id){
        $products = $this->productModel->getProducts();
        $data = ['products' => $products];
        $this->view->render('product/list', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // process input form
            $data = [
                'sku'=>trim($_POST['sku']),
                'name'=>trim($_POST['name']),
                'price'=>trim($_POST['price']),
                'size'=>trim($_POST['size']),
                'weight'=>trim($_POST['weight']),
                'height'=>trim($_POST['height']),
                'width'=>trim($_POST['width']),
                'length'=>trim($_POST['length']),             
                ];

                
            if($this->productModel->addProduct($data)){
                    header('Location: '. URL.'product/add');
                    return;
                }else{
                    die('Product not added');
                }        
            }else{
            $data = [
                'sku'=>'',
                'name'=>'',
                'price'=>'',
                'size'=>'',
                'weight'=>'',
                'height'=>'',
                'width'=>'',
                'length'=>'',
            ];
            $this->view->render('product/add', $data);
        }                  
    }

    
    public function delete(){
        if(isset($_POST['deleteProduct'])){
            if(isset($_POST['check'])){
                foreach($_POST['check'] as $value){
                    $this->productModel->deleteProduct($value);
                }
            }
        }
    }

}

?>
