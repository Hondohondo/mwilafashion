

<?php
$catid=$_POST['cat'];
$description=$_POST['description'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
/*
if (get_magic_quotes_gpc())
{
    $catid = stripslashes($catid);
    $description = stripslashes($description);
    $price = stripslashes($price);
    $quantity = stripslashes($quantity);
}*/
$catid = mysqli_real_escape_string($con, $catid);
$description = mysqli_real_escape_string($con,$description);
$price = mysqli_real_escape_string($con,$price);
$quantity = mysqli_real_escape_string($con,$quantity);

$thumbnail = getThumb($_FILES['picture']);
$thumbnail = mysqli_real_escape_string($con,$thumbnail);

$query = "INSERT INTO products (catid, description, picture, price, quantity) " .
    " VALUES ('$catid','$description','$thumbnail', '$price', '$quantity')";

$result = mysqli_query($con, $query) or die('Unable to add product');
if ($result)
    echo "<h2>New product added</h2>\n";
else
    echo "<h2>Problem adding new product</h2>\n";
?>