<?php
function login()
{
  /*  $con = mysql_connect("localhost", "test", "test") or die('Could not connect to server');
    mysql_select_db("store", $con) or die('Could not connect to database');*/

    $con = mysqli_connect("localhost", "nandi", "Amigo97!", "mwilafashion_store") or die('Could not connect to server');;
    return $con;

}
?>