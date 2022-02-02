<?php
/*
 * First, the code checks to see if the manager is really logged into the system by checking for the store_admin session cookie
 * */

/*First, the code checks to see if the manager is really logged into the system by checking for the store_admin session cookie
 * Since you need to use PHP code to check for the session cookie, you must stay in PHP mode to create the HTML form. You need to use PHP echo statements to produce the required HTML code for this.
 * */
if (!isset($_SESSION['store_admin']))
{
    echo "<h2>Sorry, you have not logged into the system</h2>\n";
    echo "<a href=\"admin.php\">Please login</a>\n";
} else

/*
 * If the manager is logged in, the PHP code produces a simple HTML form by echoing the required HTML code to the client's browser
 * */
{
    echo "<h2>Add a new food category</h2>\n";
    echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
    echo "<form action=\"admin.php\" method=\"post\">\n";
    echo "<tr><td>New category</td><td><input type=\"text\" name=\"catname\" size=\"40\"></td></tr>\n";
    echo "</table>\n";
    echo "<input type=\"hidden\" name=\"content\" value=\"addcat\">\n";
    echo "<input type=\"submit\" value=\"Submit\">\n";
    echo "</form>\n";
}

/*
 * The code uses a simple textbox to input the name of the new category. The action attribute for the form points to the admin.php file (the main administration page). It also uses a hidden input field to pass along a value for the content HTML variable, which the admin.php code checks and uses for the next Web page. The hidden value points to the addcat PHP file, which will do all the work of inserting the new category into the database table.
 * */

/*
 * When the manager clicks the Submit button in the form, the addcat.inc.php include file receives the form information and must process it.
 * */
?>


