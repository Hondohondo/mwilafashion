<?php

/*
 * This PHP code produces a simple HTML form, and populates the form with the information about the product and the current quantity in the shopping cart. You'll notice that there are two submit buttons in this form. One is to update the quantity value and one to remove the item from the cart.
 * */

echo "<h2>Update item in cart</h2><br>\n";

$prodid = $_GET['id'];

$query = "SELECT description, price FROM products where prodid = $prodid";
$result = mysqli_query($query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$description = $row['description'];
$price = $row['price'];

$quantity = $_SESSION['cart'][$prodid];

echo "<form action=\"index.php\" method=\"post\">\n";
echo "<input type=\"hidden\" name=\"content\" value=\"changeitem\">\n";
echo "<input type=\"hidden\" name=\"prodid\" value=\"$prodid\">\n";
echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
echo "<tr><td><h3>Product ID</h3></td><td>$prodid</td></tr>\n";
echo "<tr><td><h3>Description</h3></td><td>$description</td></tr>\n";
printf("<tr><td><h3>Price</h3></td><td>$%.2lf</td></tr>\n", $price);
echo "<tr><td><h3>Quantity</h3></td><td><input type=\"text\" name=\"quantity\" value=\"$quantity\"></td></tr>\n";

$total = $price * $quantity;
printf("<tr><td><h3>Total</h3></td><td>\$%.2lf</td></tr>\n", $total);
echo "</table>\n";
echo "<input type=\"submit\" name=\"button\" value=\"Update\">\n";
echo "<input type=\"submit\" name=\"button\" value=\"Remove Item from cart\">\n";
echo "</form>\n";
?>