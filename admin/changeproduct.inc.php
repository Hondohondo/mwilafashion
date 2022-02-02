<?php

/*The first thing the code needs to detect is which submit button the manager selected in the form. In the form, you assigned both buttons the same name but gave them different values. All you need to do is retrieve the data for the button name and determine which value appears.
 *
 *
 * If the manager selects the button to remove the record, the code creates a DELETE SQL statement and submits it to the server. You must be careful when working with DELETE statements. By default, a DELETE statement that has no WHERE clause will delete every record in your database! That little tidbit has bitten quite a few database programmers. The WHERE clause specifies which records you want deleted. In your case, you must specify the product ID you want to delete
 * */

$delete = $_POST['button'];
if ($delete == "Delete Product")
{
    $prodid = $_POST['prodid'];
    $query = "DELETE from products WHERE prodid = $prodid";
    $result = mysqli_query($con, $query);
    if ($result)
    {
        echo "<h2>Product: $prodid deleted</h2>\n";
        exit;
    } else
    {
        echo "<h2>Problem deleting $prodid</h2>\n";
        exit;
    }
} else
{
    $prodid = $_POST['prodid'];
    $catid = $_POST['catid'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if (get_magic_quotes_gpc())
    {
        $description = stripslashes($description);
    }
    $description = mysqli_real_escape_string($con, $description);

    if (isset($_POST['onsale']))
        $onsale = 1;
    else
        $onsale = 0;

    $PictName = $_FILES['picture']['name'];

    if ($PictName)
    {
        $thumbnail = getThumb($_FILES['picture']);
        $thumbnail = mysqli_real_escape_string($thumbnail);
        $query = "UPDATE products SET catid='$catid', description = '$description', " .
            "price = $price, quantity = $quantity, onsale = $onsale, picture = '$thumbnail' " .
            "WHERE prodid = $prodid";
    }
    else
    {
        $query = "UPDATE products SET catid='$catid', description = '$description', " .
            "price = $price, quantity = $quantity, onsale = $onsale " .
            "WHERE prodid = $prodid";
    }

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    if ($result)
    {
        echo "<h2>Product information changed.</h2>\n";
    }
    else
    {
        echo "<h2>Sorry, I could not change the product information.</h2>\n";
    }
}

/*If the manager selects the Update button, you must retrieve all of the posted data from the HTML form. Again, there are a couple of interesting things happening here as well:

    The onsale check box is only set if there's a check in it. Use the isset() function to determine if that variable is set or not. If so, assign a true value (1) to the variable.

    If a new image is set in the image field, the $_FILES[] value will be set. You assign the ['name'] element to a variable and check if it exists. If it does exist, you need to create a new thumbnail using your friend getThumb(), then use that value along with the other data values to update the record. If no new image file was specified, you can leave the picture BLOB alone and just replace the other data.
 *
 *
 * */

/*Again, just like the DELETE statement, the WHERE clause is important. It defines which records get the updated data. Without it, the UPDATE statement updates all of the records with the new data, which would not be a very good thing.
 *
 * */
?>