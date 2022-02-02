<h2>Welcome to our store!</h2>
<br>
<br>
<p>Please feel free to browse our great selection of products. Select the category
    from the drop-down menu in the navigation bar. Add items to your cart, then check out.
<p>
<h2>Items on sale today:</h2>

<!--
The main.inc.php code displays a short message about the store to the customer. It then performs a simple SQL query, looking for all the products marked as on sale. It iterates through the returned data records, displaying each product on a separate line.
-->

<?php
$query = "SELECT * from products where onsale = TRUE";
$result = mysql_query($query);

echo "<table width=\"100%\" border=\"0\">\n";
while($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
    $prodid = $row['prodid'];
    $description = $row['description'];
    $price = $row['price'];
    $quantity = $row['quantity'];

    echo "<tr><td>\n";
    echo "<img src=\"showimage.php?id=$prodid\" width=\"80\" height=\"60\">";
    echo "</td><td>\n";
    if ($quantity == 0)
        echo "<font size=\"3\">$description</font>\n";
    else
    {
        echo "<a href=\"index.php?&content;=updatecart&id;=$prodid\">";
        echo "<font size=\"3\"><b><u>$description</u></b></font>\n";
    }
    echo "</td><td>\n";
    printf("$%.2f\n", $price);
    echo "</td><td>\n";
    if ($quantity == 0)
        echo "<font color=\"red\">Sorry, this item out of stock</font>\n";
    else if ($quantity < 5)
        echo "Hurry, only $quantity left in stock!\n";
    else
        echo " \n";
    echo "</td></tr>\n";
}
echo "</table>\n";

/*
 * You'll note that the code checks the quantity in stock for each product. If a product has more than five in stock, no special messages are displayed, and the product description is displayed as a link to the updatecart content (which we'll discuss later). If a product has less than five in stock, the code displays a special message indicating how many are left. Finally, if a product is out of stock, the code displays the product description as regular text without the link (since there aren't any to purchase).
 *
 * */
?>