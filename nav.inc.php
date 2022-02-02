<!--
The nav.inc.php code provides several features in the navigation section:

A Home link to return to the storefront Web page.
A Browse Products area with links to go to a specific location in the catalog.
A Search textbox and button to allow searching products.
A Review Shopping Cart link, allowing the customer to view and modify the current shopping cart contents.
A Check Out link that allows the customer to purchase the items contained in the shopping cart.
-->

<table width="100%" cellpadding="2">
    <tr>
        <td><h3>Welcome to the store!</h3></td>
    </tr>
    <tr>
        <td><a href="index.php"><strong>Home</strong></a></td>
    </tr>
    <tr>
        <td><hr size="1" noshade="noshade" /></td>
    </tr>
    <tr>
        <td>
            <label><h3>Browse Products:<br><br></h3> </label>
            <?php
            /*The PHP code that creates the Browse Products area performs one SQL query to retrieve all of the categories in the categories table, and then it performs a second query to tally the number of products in each category. This is a common practice in storefront applications.
             *
             * */

            $query="SELECT catid,name from categories";
            $result=mysql_query($query);
            while($row=mysql_fetch_array($result,MYSQL_ASSOC))
            {
                $catid = $row['catid'];
                $name = $row['name'];
                $query2="SELECT count(prodid) FROM products WHERE catid = $catid";
                $result2 = mysql_query($query2);
                $row=mysql_fetch_array($result2);
                $total = $row[0];
                echo "<a href=\"index.php?content=buyproducts&cat=$catid\">$name</a> ($total)<br>\n";
            }
            ?>
        </td>
    </tr>
    <tr>
        <td><hr size="1" noshade="noshade" /></td>
    </tr>
    <tr>
        <td>
            <form action="index.php" method="get">
                <label><font color="#663300" size="-1">search for product:</font> </label>
                <input name="searchFor" type="text" size="14" />
                <input name="goButton" type="submit" value="find" />
                <input name="content" type="hidden" value="search" />
            </form>  </td>
    </tr>
    <tr>
        <td><hr size="1" noshade="noshade" /></td>
    </tr>
    <tr>
        <td><a href="index.php?content=reviewcart"><strong>Review shopping cart</strong></a></td>
    </tr>

    <tr>
        <td><hr size="1" noshade="noshade" /></td>
    </tr>
    <tr>
        <td bgcolor=#FFFF99><a href="index.php?content=checkout"><strong>Check out</strong></a></td>
    </tr>
    <tr>
        <td><hr size="1" noshade="noshade" /></td>
    </tr>
    <tr>
        <td> </td>
    </tr>
</table>