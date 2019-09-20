<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  9-13-2019      Sam Shayan     Added Functions to add visitors on contact page 
                                and alos deleting visitoros form database
  ----------------------------------------------------------------------------->
<?php

require "database.php";
global $db;
// Adding the add_visitor functions with parameters for adding visitors to the database  
function add_visitor($fName, $email, $phone, $reason, $comments)
{
    
    global $db;
    $query = 'INSERT INTO visitor
                         (visitor_name, visitor_email, visitor_phone, visitor_reason,visitor_msg )
                      VALUES
                         (:visitor_name, :visitor_email, :visitor_phone, :visitor_reason, :visitor_msg)';
    $statement = $db->prepare($query);
    //PDO statement which bind a value to a parameter
    $statement->bindValue(':visitor_name', $fName);
    $statement->bindValue(':visitor_email', $email);
    $statement->bindValue(':visitor_phone', $phone);
    $statement->bindValue(':visitor_reason', $reason);
    $statement->bindValue(':visitor_msg', $comments);
    $count = $statement->execute();
    $statement->closeCursor();

    if($count == 1 ){
        return $fName;
    }else{
        return 1;
    }
}

// Adding the deleteVisitor functions to delete visitors from the database  
function deleteVisitor($visitor_id)
{
    try{
        global $db;
        $visitor_id = filter_input(
            INPUT_POST,
            'visitor_id',
            FILTER_VALIDATE_INT
        );
        // Deleting the data from visitor table
        $query = 'DELETE FROM visitor
                      WHERE visitor_id = :visitor_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':visitor_id', $visitor_id);
        $count = $statement->execute();
        $statement->closeCursor();
      
        if ($count > 0){
            return $visitor_id;
        } else {
            return 1;
        }
    }
    catch(Exception $e){
        $error_msg = $e->getMessage();
        include('./error/database_error.php');
        exit();
    }
   
}



?>