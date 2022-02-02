<?php


/*The updatecart.inc.php file produces a simple HTML form for the customer to select the quantity of the product to purchase.
 * The code displays the standard product information (the product image, name, and price), along with a form to enter the quantity to purchase. The form uses a default value of 1 to help make it easier for your shopper to select just a single item.
 *
 *
 * When your customer clicks the Add to cart button, the HTML form passes the product ID and quantity values to the index.php page using the POST method. It assigns the content HTML variable the value of addtocart.
 *
 * This causes the index.php file to include the addtocart.inc.php file in the main section. This code attempts to add the product to the current list of products in the shopping cart session array variable.
 * */

$prodid = $_GET['id'];

echo "<h2>Add item to cart</h2>\n";

$query = "SELECT description, price from products where prodid = $prodid";
$result = mysqli_query($query);

$row=mysqli_fetch_array($result, MYSQLI_ASSOC);

$description = $row['description'];
$price = $row['price'];
$quantity = 1;

echo "<form action=\"index.php\" method=\"post\">\n";
echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
echo "<tr><td>Image</td><td>Product</td><td>Price</td><td>Quantity</td></tr>\n";
echo "<tr><td><img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\"></td>\n";
echo "<td>$description</td><td>$price</td>\n";
echo "<td><input type=\"text\" name=\"quantity\" value=\"$quantity\" size=\"3\"</td></tr>\n";
echo "</table>\n";
echo "<input type=\"hidden\" name=\"content\" value=\"addtocart\">\n";
echo "<input type=\"hidden\" name=\"prodid\" value=\"$prodid\">\n";
echo "<input type=\"submit\" value=\"Add to cart\">\n";
echo "</form>\n";
?>