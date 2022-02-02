<?php
$catname = $_POST['catname'];

/*
 * The get_magic_quotes_gpc() function checks to see if the magic_quotes_gpc PHP setting is turned on for the server. If it's on, the code uses the stripshlashes() PHP function to actually remove any backslashes that the magic_quotes_gpc feature inserted into the data. This ensures that the data doesn't contain escape characters. So it can be used as-is in the application (except not for SQL queries).
 *
 * */

if (get_magic_quotes_gpc())
{
    $catname = stripslashes($catname);
}

/*The official PHP way to prepare data for MySQL queries is to use the mysql_real_escape_string() function. This function guarantees that the data is properly escaped and will work properly in your SQL statement. To use this feature, though, you have to be sure that the magic_quotes_gpc feature in PHP hasn't already manipulated the original data. If you determine that this feature is enabled, you must include the stripslashes() to remove the slashes added by PHP.
 *
 * */

$catnameval = mysqli_real_escape_string($con, $catname);

$query="INSERT INTO categories (name) VALUES ('$catnameval')";
$result = mysqli_query($con, $query);

if ($result)
    echo "<h2>New category '$catname' added</h2>\n";
else
    echo "<h2>Sorry, unable to add new category</h2>\n";

/*This is the standard technique for handling form data in PHP. Using this technique, you have access to both the clean version of the data (called $catname in the program) and the escaped version (called $catnameval). You can then use whichever version you need for your purposes
 *
 * */
?>


