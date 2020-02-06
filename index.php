

<?php 

function connectar()
{
    $host     = 'localhost:3306';
    $database = 'adminnub_schema_dental_entity_login'; //SE ENCUENTRA TODAS LAS ENTIDADES REGISTRADAS -- BASE DE DATOS DE LAS ENTIDADES GLOBAL
    $username = 'adminnub_entidad_dental';
    $password = 'Pablo_1997';
    $utf8mb4  = 'utf8mb4';

    try{
    
    /*$conexion = new PDO("mysql:host=$host;dbname=$database;charset=$utf8mb4",$username, $password ); */
    
    $conexion  = mysql_connect($host, $username, $password ); 
    mysql_select_db($database, $conexion);
    
    }catch (PDOException $e){
    
            echo $e;

    }
    
    return $conexion;

}


if(connectar())
{
        echo ' conectado';
}else{
    echo 'Error no conectado';
}

        
?>