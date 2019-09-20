<!------------------------------------------------------------------------------
  Modification Log
  Date          Name            Description
  ----------    -------------   -----------------------------------------------
  9-12-2019      Sam Shayan     Added getEmployees function
  ----------------------------------------------------------------------------->
<?php

try {
    //connecting the database.php and function.php
    include_once './model/database.php';
    include_once './model/employees.php';
    //Throwing an error if the connection fails
} catch(Exception $e){
    $error_msg = $e->getMessage();
    include('./error/database_error.php');
    exit();
}

// Creating class for employee
class Employee
{
    private $id;
    private $first_name;
    private $last_name;


    public function __construct($id, $first_name, $last_name)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    // get and set  functions as getters and setters for object values

    public function getID()
    {
        return $this->id;
    }

    public function setID($value)
    {
        $this->id = $value;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($value)
    {
        $this->first_name = $value;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($value)
    {
        $this->last_name = $value;
    }
}

$employees = EmployeeDB::getEmployees();
//echo $employee->getLastName();
//print_r($employees);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="personal business page" />
    <meta name="author" content="Sam Shayan">
    <link rel="stylesheet" href="css/bizStyle.css">

</head>

<body>
    <nav class="horizontal">
        <a id="navicon" href="#"><img src="images/navi.png" alt="icon" /></a>
        <ul class="menu">
            <li> <a href="index.html">Home</a></li>
            <li> <a href="Newslette.html">E-Newslette</a></li>
            <li> <a href="Car.html">Our Cars</a></li>
            <li> <a href="ContactBusiness.html">Contact Us</a></li>
            <li> <a href="admin.php">Customer list</a></li>
            <li> <a href="login.php">Log out</a></li>

        </ul>
    </nav>
    <section>
        <!--Using PHP to aquire the name of the user for the thank you message-->
        <h2>Employee List </h2>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <ul>
            <?php foreach ($employees as $employee) : ?>
                <li>
                    <?php echo $employee->getID() . ": " . $employee->getFirstName() . " " . $employee->getLastName(); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <footer>
        <p id="leftfooter">Email me: <a href="mailto:samirshayan@mycwi.cc">samirshayan@mycwi.cc</a><br><br>Official
            website: <a href="www.bmw.us">www.bmw.us</a> </p>
        <!--social network logos-->
        <a href="https://www.linkedin.com/" class="logos" target="_blank"><img src="images/linin.png" height="50px"></a>
        <a href="https://github.com/" class="logos" target="_blank"><img src="images/github.png" height="56px"></a>
        <a href="https://plus.google.com/" class="logos" target="_blank"><img src="images/google.png" height="50px"></a>
        <a href="https://twitter.com/" class="logos" target="_blank"><img src="images/twitter.png" height="50px"></a>
        <a href="https://facebook.com/" class="logos" target="_blank"><img src="images/facebook.png" height="50px"></a>

        <p id="rightfooter">Phone No: <a href="tel:+1555555555">555-555-5555</a> <br> <br> Fax No: <a href="tel:+1555555555">555-555-5555</a></p>

    </footer>
</body>

</html>