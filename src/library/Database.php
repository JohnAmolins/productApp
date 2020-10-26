<?php
# PDO class; Product.php model works with this file

class Database {
    private $dbname = DB_NAME;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $db;  // for handling dabase
    private $statement; // for sql queries
    private $error; // for error report
   
    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        try{
            $this->db = new PDO($dsn, $this->user, $this->pass);
          } catch (PDOException $e){
            $this->error= $e->getMessage();
            echo $this->error;
            exit();
          }
    }

    
    # Creating PDO statement object Function that prepares sql query 
    public function query($query){
        $this->statement = $this->db->prepare($query);
    }

    # Bind variables to the prepared statement as parameters
    public function bind($parameter, $value, $varType = null){
        if(is_null($varType)){
            switch(true){
                case is_int($value):
                    $varType = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $varType = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $varType = PDO::PARAM_NULL;
                    break;
                default:
                    $varType = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($parameter, $value, $varType); 
    }

    # Function that executes prepared statement
    public function execute(){
        return $this->statement->execute();
    }

    # Get results as an array of objects
    public function resultArr(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

}
?>