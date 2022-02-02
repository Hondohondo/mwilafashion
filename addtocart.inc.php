<?php

/*The addtocart code retrieves the product ID and quantity values from the HTML form data, and then it performs an SQL query to check the current quantity value listed for the product in the products table. If your customer attempts to purchase more than the quantity in stock, the code displays an error message and asks the customer to select another quantity.
 *If there's enough of the product in stock, the addcart code adds the quantity value to a session cookie array variable using the product ID as the variable:
 *
 * */


$prodid = $_POST['prodid'];
$quantity = $_POST['quantity'];

$query = "SELECT quantity, description FROM products WHERE prodid = $prodid";
$result = mysqli_query($query);
$row = mysqli_fetch_array($result);
$stock = $row[0];
$description = $row[1];

if ($quantity > $stock)
{
    echo "<h2>Sorry, there are only $stock $description left in stock</h2>\n";
    echo "<h2>Please select another quantity</h2>\n";
} else
{
    if (isset($_SESSION['cart'][$prodid]))
    {
        $_SESSION['cart'][$prodid] += $quantity;
    } else
    {
        $_SESSION['cart'][$prodid] = $quantity;
    }
    echo "<h2>Product added to cart.</h2>\n";
}
echo "<a href=\"index.php\">Continue shopping</a><br>\n";
echo "<a href=\"index.php?content=checkout\">Check out</a>\n";
?>