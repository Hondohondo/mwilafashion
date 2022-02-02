<?php
session_start();
include ("../mylibrary/login.php");
$con = login();

/*
 * <!--
The code in the validate.php file checks the login information provided by the manager. Then it forwards the session to the admin.php page, but it also specifies the name of the next Web page to display.
-->

 * */

$userid = $_POST['userid'];
$password = $_POST['password'];

//$query = "SELECT userid, name from admins where userid = '$userid' and password = PASSWORD('$password')";
$query = "SELECT userid, name from admins where userid = '$userid' and password = MD5('$password')";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0)
{
    echo "<h2>Sorry, your account was not validated.</h2><br>\n";
    echo "<a href=\"admin.php\">Try again</a><br>\n";
} else
{
    /*
     * First, the code creates a store_admin session cookie (remember, that's the session cookie name the code in the adminnav.inc.php file is looking for) and stores the user name there
     *
     * */
    $_SESSION['store_admin'] = $userid;
    header("Location: admin.php");
}
/*
 * The PHP header() function allows us to send HTTP header information to the client browser. HTTP headers control the operation of how the client's browser interprets data in the session. The trick is this function must appear before any HTML code is sent to the client's browser. You can't have any echo statements before the header() function, or it'll fail.

HTTP headers provide for lots of control over the Web session. The HTTP Location header redirects the client browser to another page. In this particular case, we want to return the logged-in manager back to the admin.php page so he or she can now see the full administration Web page.
 * */
?>

<!--
The validate.php file retrieves the data from the HTML form using the standard PHP $_POST[] array variable and stores the values in PHP variables. Next, it uses those values to create an SQL query to compare the user name and password the manager supplied to the values in the admins database table. If the values don't match an existing record, the code displays a simple error message, along with a link back to the login page
-->


