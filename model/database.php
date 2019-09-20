<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  9-12-2019      Sam Shayan     Added Database Class
  9-19-2019      Sam Shayan     Taking the database PDo ou of the class 
                                in order to avoid having error in other pages
  ----------------------------------------------------------------------------->
<?php
    //Connecting the database with username and password 
     $dsn ='mysql:host=localhost;dbname=businessdb';
     $username =  'root';
     $password ='Pa$$word';
    try{
        $db = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e){
        $error_msg = $e->getMessage();
        include('./error/database_error.php');
        exit();
    }


?>

