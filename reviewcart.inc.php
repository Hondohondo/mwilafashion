<?php

/*
 * This code uses the same code as the real-time cart display section on the main Web page, which displays the contents of the shopping cart.
 * */

echo "<h2>Review your shopping cart contents</h2><br>\n";

$total = 0;
echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
echo "<tr><td>Product</td><td>Price</td><td>Quantity</td><td>Total</td><td> </td>\n";
foreach($_SESSION['cart'] as $prodid => $quantity)
{
    $query = "SELECT description, price FROM products WHERE prodid = $prodid";
    $result = mysqli_query($query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $description = $row['description'];
    $price = $row['price'];

    $subtotal = $price * $quantity;
    $total += $subtotal;

    printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>$%.2f</td>\n",
        $description, $price, $quantity, $subtotal);
    echo "<td><a href=\"index.php?content=updateitem&id=$prodid\">Modify</a></td></tr>\n";
}
printf("<tr><td colspan=\"3\"><b>Total</b></td><td>$%.2f</td></tr>\n", $total);
echo "</table>\n";

/*Since the items are indexed using their prodid values, the array values are numerical, but not necessarily in order. This would make iterating through the individual products in the cart impossible using a standard for loop. Instead, we can use our new friend, the foreach loop: foreach($_SESSION['cart'] as $prodid => $quantity)
 *The foreach loop retrieves the individual prodid keys and the associated quantities stored as values for each key. After retrieving the product ID and quantity values from the session cookie, the code sends an SQL query to the MySQL database to retrieve the description and price of the product. This allows you to display the product in a form that the customer can understand.
 *
 * ---
 * As the code displays each product in the shopping cart, it also produces a link for the customer:

echo "<td><a href=\"index.php?content=updateitem&id;=$prodid\">Modify</a></td></tr>\n";

This link takes the customer to the updateitem.inc.php include file. This allows the customer to update or remove the product in the shopping cart.
 * */
?>