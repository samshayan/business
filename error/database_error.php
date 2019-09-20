<!------------------------------------------------------------------------------
  Modification Log
  Date           Name            Description
  ----------    -------------   -----------------------------------------------
  9-19-2019      Sam Shayan    Creating a user friendly page for database errors
  ----------------------------------------------------------------------------->

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="personal business page" />
    <meta name="author" content="Sam Shayan">
    <link rel="stylesheet" href="css/bizStyle.css">
    <!--    <script src="JavaScript/port_formsubmit.js"></script>-->
</head>

<body>
    <!-- Adding navbar for the page -->
 <?php include_once 'view/navbar.php'; ?>
    <?php
    global $db;
    // including th database and function php and setting errors for failed connection
    include_once "./model/database.php";
    include_once "./model/function.php";
    // message of connection to database fails
    if (!is_object($db)) {
        $message = "We are experiencing technical difficulties. Please check back later.";
    } else {
        // message if user cannot be added
        $fName = add_visitor($fName, $email, $phone, $reason, $comments);
        if ($fName == 1) {
            $message = "Unable to add to database. Please check back later.";
        } else {
            // message if there is no error
            $message = "Thank you, $fName, for contacting me! I will get back to you shortly.";
        }
    }

    ?>
    <h2><?php echo $message; ?></h2>
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