<!------------------------------------------------------------------------------
  Modification Log
  Date           Name            Description
  ----------    -------------   -----------------------------------------------
  9-1-2019      Sam Shayan       Creating thanks_submit page
  9-19-2019     Sam Shayan       Changing code structure to allow having 
                                 friendly error messages
  ----------------------------------------------------------------------------->
<?php
// Getting the data from the form and assigning it to a var
$fName = filter_input(INPUT_POST, 'first_name');
$lName = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'emailaddress');

// Setting a Boolean for checkbox of newletter 
$eNewsletter = filter_input(INPUT_POST, 'eNewsletter');
if ($eNewsletter === NULL) {
    $eNewsletter = 0;
} else {
    $eNewsletter = 1;
}

// Setting a Boolean for checkbox of weekly deals
$weeklyDeals = filter_input(INPUT_POST, 'weeklyDeals');
if ($weeklyDeals === NULL) {
    $weeklyDeals = 0;
} else {
    $weeklyDeals = 1;
}

// Setting an error message if the information entered are inadequate
if (
    $fName == null || $lName == null ||
    $email == null || ($eNewsletter == null && $weeklyDeals == null)
) {
    // redirecting to error page
    $error = header("Location: error\input_error.php");
    
    exit();
} else {
//    connecting to database
    require_once "model/database.php";

    // Entering the information from the website to the visitor table of the business Data Base
    $query = 'INSERT INTO newsletter
                         (first_name, last_name, emiladdress, eNewsletter,weeklyDeals )
                      VALUES
                         (:first_name, :last_name, :emailaddress, :eNewsletter, :weeklyDeals)';
    $statement = $db->prepare($query);
    //PDO statement which bind a value to a parameter
    $statement->bindValue(':first_name', $fName);
    $statement->bindValue(':last_name', $lName);
    $statement->bindValue(':emailaddress', $email);
    $statement->bindValue(':eNewsletter', $eNewsletter);
    $statement->bindValue(':weeklyDeals', $weeklyDeals);

    $statement->execute();
    $statement->closeCursor();
}
?>


<!DOCTYPE html>
<html>

<!--
    Thank you page after submitting the form
    -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="personal business page" />
    <meta name="author" content="Sam Shayan">

    <link rel="stylesheet" href="css/bizStyle.css">.

</head>

<body>
    <?php include_once 'view/navbar.php'; ?>
     <section>
        <!--Using PHP to aquire the name of the user for the thank you message-->

        <h2>Thank you, <?php echo $fName; ?>, for contacting our dealership! we will get back to you shortly.</h2>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
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