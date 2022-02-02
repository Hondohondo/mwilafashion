<?php
/*The first section uses the standard isset() function to determine if the shopping cart already exists. If it doesn't (the first time the customer connects to the Web page), it creates it in the session cookie. If the session cookie exists, the code uses the count() function to see if there are any products in the shopping cart. If so, it's just a matter of using the foreach() function to iterate through each value and displaying its information.
 *
 * The cart.inc.php code makes use of the printf() function to ensure that the price values stay in the proper format.
 * */
echo "<h2>Your shopping cart:</h2>\n";
if (!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
    echo "is empty\n";
} else
{
    $items = count($_SESSION['cart']);
    if ($items == 0)
    {
        echo "is empty\n";
    } else
    {
        $total = 0;
        echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";
        echo "<tr><td>Product</td><td>Quantity</td><td>Total</td></tr>\n";
        foreach($_SESSION['cart'] as $prodid => $quantity)
        {
            $query = "SELECT description, price FROM products WHERE prodid = $prodid";
            $result = mysql_query($query);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $description = $row['description'];
            $price = $row['price'];

            $subtotal = $price * $quantity;
            $total += $subtotal;

            printf("<tr><td>%s</td><td>%s</td><td>$%.2lf</td></tr>\n", $description, $quantity, $subtotal);
        }
        printf("<tr><td colspan=\"2\">Total</td><td>$%.2lf</td></tr>\n", $total);
        echo "</table>\n";

    }
}
?>