<?php
/*
 *  It first checks to make sure the Web page visitor is logged in, and then it retrieves two HTML variables: cat and page. It passes both of these variables to a new function, called showproduts(), along with a couple of URLs
 *
 * */
if (!isset($_SESSION['store_admin']))
{
    echo "<h2>Sorry, you have not logged into the system</h2>\n";
    echo "<a href=\"admin.php\">Please login</a>\n";
} else
{
    echo "<h2>Click on a product to edit it</h2>\n";
    $catid = $_GET['cat'];
    if (!isset($_GET['page']))
        $page = 1;
    else
        $page = $_GET['page'];

    showproducts($catid, $page, "admin.php?content=editproducts", "admin.php?content=updateproduct");
}

/*
 * The showproducts() function uses four parameters:
    The category ID from which to display products.
    The page of products to display.
    The URL of the current Web page.
    A URL for the Web page to go to if the visitor clicks on a product.
 *
 * */

/*
 * The Food Store has two situations where you'll need to display products. The store manager will need to list products to edit them, and the store customers will need to browse through products to select them for purchasing. By making the showproducts function as generic as possible, you can use it for both the store back-end and front-end applications (that's the whole point of creating a function)
 * */

/*The page value allows you to display only a subset of the total product list. This makes life a little easier for the viewer trying to browse the catalog. Instead of showing all of the products, the visitor will see a group of five products and links to go to the next or previous pages.
 *
 * */
?>