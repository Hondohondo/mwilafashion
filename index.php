<?php
session_start();
?>
<!--
The index.php file uses the same header.inc.php, footer.inc.php, and mystyle.css files that the back-end application uses.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css" />
    <title>The Food Store</title>
</head>
<?php
include("mylibrary/login.php");
include("mylibrary/showproducts.php");

login();
?>

<body>
<table width="100%" border="0">
    <tr>
        <td id="header" height="90" colspan="3">
            <?php include("header.inc.php"); ?></td>
    </tr>
    <tr>
        <td id="nav" width="20%" valign="top">
            <?php include("nav.inc.php"); ?></td>
        <td id="main" width="50%" valign="top">
            <?php
            if (!isset($_REQUEST['content']))
                include("main.inc.php");
            else
            {
                $content = $_REQUEST['content'];
                $nextpage = $content . ".inc.php";
                include($nextpage);
            }
            ?></td>
        <td id="status" width="30%" valign="top">
            <?php include("cart.inc.php"); ?></td>
    </tr>

    <tr>
        <td id="footer" colspan="3">
            <div align="center">
                <?php include("footer.inc.php"); ?>
            </div></td>
    </tr>
</table>
</body>
</html>