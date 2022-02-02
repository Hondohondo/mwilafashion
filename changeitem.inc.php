<?php

/*This simply determines which submit button on the updateitem page the customer clicked. Since both buttons use the same HTML variable, all you need to do is check the value of the HTML variable. If the customer clicks the Update button, the quantity value replaces the appropriate session cookie with the new value. If the customer clicks the Remove button, the code deletes the session cookie using the unset() function. *
 *
 * */

$button = $_POST['button'];
$prodid = $_POST['prodid'];
if ($button == "Update")
{
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$prodid] = $quantity;
    echo "<h2>Item quantity updated in cart</h2>\n";
    echo "<a href=\"index.php?content=reviewcart\">Review cart</a>\n";
} else
{
    unset($_SESSION['cart'][$prodid]);
    echo "<h2>Item removed from cart</h2>\n";
    echo "<a href=\"index.php?content=reviewcart\">Review cart</a>\n";
}

?>