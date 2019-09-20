<!------------------------------------------------------------------------------
  Modification Log
  Date           Name            Description
  ----------    -------------   -----------------------------------------------
  9-11-2019      Sam Shayan    Creating login page
  ----------------------------------------------------------------------------->
<?php
// setting a var for username, password and action
$action = filter_input(INPUT_POST, 'action');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if ($action == NULL) {
    echo $action;
    // if the username and password input is empty the page reloads
} else if (empty($username) || empty($password)) {
    header("Location: login.php");
} else {
    // After entering username and password admin page with loads up
    header("Location: admin.php");
}

?>
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
    <nav class="horizontal">
        <a id="navicon" href="#"><img src="images/navi.png" alt="icon" /></a>
        <ul class="menu">
            <li> <a href="index.html">Home</a></li>
            <li> <a href="Newslette.html">E-Newslette</a></li>
            <li> <a href="Car.html">Our Cars</a></li>
            <li> <a href="ContactBusiness.html">Contact Us</a></li>
            <!--  <li> <a href="Home.html">Portfolio</a></li> -->
            <li> <a href="login.php">Admin</a></li>
            <li><a href="http://www.w3expressions.com/samirshayan/portfolio/">Portfolio</a></li>

        </ul>
    </nav>
    <main>
        <form name="form" class="ContactForm" action="login.php" method="post">
            <br>
            <div>
                <label class="info" for="name">Username</label>
                <input class="contForm" type="text" name="username" id="name" required>
            </div>
            <br>
            <div>
                <label class="info" for="password">Password</label>
                <input class="contForm" type="password" name="password" id="password" required><br>
                <input type="hidden" name="action" value="action">
            </div>


            <div>
                <input type="submit" id="submit" value="Submit" class="btn">
                <input type="reset" id="reset" value="Reset" class="btn">
            </div>
        </form><br>
    </main>
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