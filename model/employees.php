<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  9-12-2019      Sam Shayan     create getEmployees function
  ----------------------------------------------------------------------------->
<?php

class EmployeeDB
{
    //Creating function employee information
    public static function getEmployees()
    {
        global $db;
        // getting the employee data and order them by its Id
        $query = 'SELECT * FROM employee 
                        ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();

        // Using array ad foreach loop to call the data from database columns
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee(
                $row['employeeID'],
                $row['first_name'],
                $row['last_name']
            );
            //print_r ($row);
            $employees[] = $employee;
        }
        // echo count($employees);
        return $employees;
    }
}

?>