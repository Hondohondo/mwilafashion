<?php

/*
 * The link in the navigation section passes the category ID value to the buyproducts.inc.php code. The code takes that value and finds the actual name of the category in the categories table and then displays the category name on the top of the main section. Next, it checks the HTML variable page to see if the showproducts() function passed on the next page value. If not, it assigns the variable to the value of 1 to display the first page.
 *
 * Finally, it calls the same showproducts() function we used in our administration back-end application to display the products on the main Web page.
 * */

$catid = $_GET['cat'];
$query="SELECT name from categories WHERE catid = $catid";
$result = mysqli_query($query);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
echo "<h2>{$row['name']} - Click on a product to purchase it</h2>\n";

if (!isset($_GET['page']))
    $page = 1;
else
    $page = $_GET['page'];

showproducts($catid, $page, "index.php?content=buyproducts", "index.php?content=updatecart");


/*The showproducts() function specifies the two URLs required for the product list. The first URL points to the original Web page for displaying more pages of data. The second URL points to the Web page used when a customer selects an individual product. This code uses the URL:

index.php?content=updatecart

When you click the link for a product, it automatically adds the product ID to the end of this link and sends the customer to the index.php page using the updatecart.inc.php file as the content for the main section.
 *
 * */
?>



