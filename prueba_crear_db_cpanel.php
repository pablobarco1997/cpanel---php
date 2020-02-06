<?php 

    include 'cpaneluapi.class.php'; 
    
    class CpanelUAPIOperation {
        
        /*CREDENCIALES CPANEL*/
        private $cpanelCred = array("url"=>"localhost","port"=>2087,"user"=>"adminnub", "pwd"=>"B9707pablo1997");
        private $dbUser     = array("userName"=>"entidad_dental","pwd"=>"Pablo_1997");
        private $cpanel;

        public function __construct(){
            
            $this->cpanel = new cpanelAPI($this->cpanelCred['user'], $this->cpanelCred['pwd'], $this->cpanelCred['url']); //instantiate the object
            
        }
        
        public function createDB($dbName){
            
            $dbNameInCPanel = $this->cpanelCred['user']."_".$dbName;
            
            $createDB = $this->cpanel->uapi->Mysql->create_database(array('name' => $dbNameInCPanel)); //Create the database
            
            if($createDB){
                
                 $databaseuser = $this->cpanelCred['user']."_".$this->dbUser['userName'];
                 
                 // Assign the user to have access to the database.
                 $access = $this->cpanel->uapi->set_privileges_on_database(array('user' => $databaseuser, 'database' => $dbNameInCPanel, 'privileges' => 'ALL'));
                
                if($access)
                {
                    return 'Base de datos Creada exitosamente';
                } 
                
            }   
            
            return false;
        }
        
    }
    
    
    function exec_db_cpanel()
    {
        $dbcreate_cpanel = new CpanelUAPIOperation(); 
        
        $dbcreate_cpanel->createDB('prueba_db');
    }
    

    
?>