<!------------------------------------------------------------------------------
  Modification Log
  Date           Name            Description
  ----------    -------------   -----------------------------------------------
  9-13-2019      Sam Shayan     Added deleteVisitor
  ----------------------------------------------------------------------------->
<?php {
    //try {
        //connecting the database.php and function.php
        require_once './model/database.php';
        require_once './model/function.php';
    
    // Getting the action from HTML form input
    $action = filter_input(INPUT_POST, 'action');
    if ($action == null) {
        //assigning the $action to visitor_list
        $action = 'visitor_list';
    }
    if ($action == 'visitor_list') {

        // Selecting all visitor table data and sort them by visitor_name
        $query = 'SELECT * from visitor
                         ORDER BY visitor_name';
        $statement = $db->prepare($query);
        $statement->execute();
        // Using fetchAll() to retrieve all the user data as an array
        $visitors = $statement->fetchAll();
        $statement->closeCursor();
        //if the action is
    } else if ($action == 'delete_visitor') {
        // Adding the deleteVisitor function to delete the visitirs form the database
        deleteVisitor($visitor_id);
        // Redirect and display the admin page after deletion
        header("Location: admin.php");
    } 
}
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="personal business page" />
    <meta name="author" content="Sam Shayan">

    <link rel="stylesheet" href="css/bizStyle.css">
    <link rel="stylesheet" href="main.css.css">

    <title>Database</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <nav class="horizontal">
        <a id="navicon" href="#"><img src="images/navi.png" alt="icon" /></a>
        <ul class="menu">
            <li> <a href="index.html">Home</a></li>
            <li> <a href="Newslette.html">E-Newslette</a></li>
            <li> <a href="Car.html">Our Cars</a></li>
            <li> <a href="ContactBusiness.html">Contact Us</a></li>
            <li> <a href="list_employee.php">Employee list</a></li>
            <li> <a href="login.php">Log out</a></li>

        </ul>
    </nav>
    <h2>Customer List</h2>
    <!-- Table to display the data from the database -->
    <table>
        <tr>
            <!-- Table head of the data -->
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Reason</th>
            <th>Message</th>
            <th>&nbsp;</th>
        </tr>

        <!-- Using foreach loop to print selected entries-->
        <?php foreach ($visitors as $visitor) : ?>
            <tr>
                <!-- Calling the Name, Email, Phone, Reason & message from database -->
                <td><?php echo $visitor['visitor_name']; ?></td>
                <td><?php echo $visitor['visitor_email']; ?></td>
                <td><?php echo $visitor['visitor_phone']; ?></td>
                <td><?php echo $visitor['visitor_reason']; ?></td>
                <td><?php echo $visitor['visitor_msg']; ?></td>

                <!-- Adding a form with admin.php action and add delete button to delete the data form database-->
                <td>
                    <form action="admin.php" method="post">
                        <input type="hidden" name="action" value="delete_visitor">
                        <input type="hidden" name="visitor_id" value="<?php echo $visitor['visitor_id']; ?>">

                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <footer>
        <p id="leftfooter">Email me: <a href="mailto:samirshayan@mycwi.cc">samirshayan@mycwi.cc</a><br><br>Official website: <a href="www.bmw.us">www.bmw.us</a> </p>
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