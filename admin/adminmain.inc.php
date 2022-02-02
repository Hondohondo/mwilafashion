<?php
/*
 * extracts the manager's username from the session cookie, performs an SQL query to find the name value in the database table, displays a personalized welcome message, and shows the current date using the PHP date() function
 * */
$userid = $_SESSION['store_admin'];
$query = "SELECT name from admins WHERE userid = '$userid'";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$name = $row['name'];

echo "<h2>Welcome, $name</h2><br>\n";

$date = date("l, F j, Y");
echo "<h2>Today's date: $date</h2><br>\n";

echo "<h2>Admin messages:</h2>\n";

/*
 * The middle section of the adminmain.inc.php file uses a feature of PHP that allows us to retrieve data from simple text files. This is a great tool for posting quick information without messing with the database or importing data from another application into your application
 * */

if (is_readable("/mylibrary/dailymessages.txt"))
{
    $message = file_get_contents("/mylibrary/dailymessages.txt");
    $message = nl2br($message);
    echo $message;
}
else
{
    echo "No messages for today.\n";
}

echo "<h2><br>Products currently on sale:</h2>\n";

/*. Sends an SQL query to the MySQL database looking for products that have the onsale data field set. It then displays basic information, showing which products are on sale, their current price, and if they're out of stock
 *
 * */

$query = "SELECT prodid,description,price,quantity from products where onsale = 1";
$result = mysqli_query($con, $query);

while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $prodid = $row['prodid'];
    $description = $row['description'];
    $price = $row['price'];
    $quantity = $row['quantity'];

    printf("<a href=\"admin.php?content=updateproduct&id;=$prodid\">%s</a>   - $%.2lf\n", $description, $price);
    if ($quantity == 0)
        echo "  <font color=\"ff0000\">OUT OF STOCK</font><br>\n";
    else
        echo "<br>";
}

/*
 * The printf() function works similar to the echo statement, but it allows us to format data when displaying it.
 * */

?>