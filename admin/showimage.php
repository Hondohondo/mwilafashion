<?php
/*The most important piece is the header() function:
 * This function sends an HTTP header to your browser. The Content-type: header indicates that the data following the header is a JPEG image. When your browser sees this, it knows to display it as an image and not as normal data. Without it, your browser would just display the binary data of your image.
 * */
header("Content-type: image/jpeg");

$prodid = $_GET['id'];
/*$con = mysql_connect("localhost", "test", "test") or die('');
mysql_select_db("store", $con);*/
//$con = mysqli_connect("localhost", "nandi", "Amigo97!", "mwilafashion_store") or die('Could not connect to server');;
$con = mysqli_connect("localhost", "nandi", "Amigo97!", "mwilafashion_store") or die('Could not connect to server');;


$query = "SELECT picture from products WHERE prodid = $prodid";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$picture = $row['picture'];
echo $picture;

/*
 * After sending the HTTP header, you need to send the raw image data. That's just a matter of retrieving the correct record from the table and using the echo statement to send it to the browser. The echo statement is capable of sending the binary data contained in the BLOB object to the browser.
 *
 * Now all you need to do is make a program that uses this technique to display the image along with the product information.
 *
 * */
?>

