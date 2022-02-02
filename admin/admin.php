<?php
session_start();
?>

<!--
The admin.php code starts by using the PHP session_start() function. This function ensures that a session cookie will be started for each client session. This is important, as that's how we identify the administrator after he or she logs in.
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css" />
    <title>Mwila Fashion - Admin Console</title>
</head>


<?php

include("../mylibrary/login.php");
include("../mylibrary/getThumb.php");
include("../mylibrary/showproducts.php");

$con = login();
?>

<body>
<table width="100%" border="0">
    <tr>
        <td id="header" height="90" colspan="3">
            <?php include("header.inc.php"); ?></td>
    </tr>
    <tr>
        <td id="nav" width="20%" valign="top">
            <?php include("adminnav.inc.php"); ?></td>
        <td id="main" width="50%" valign="top">
            <!--
            The application uses an HTML content variable to determine the information to display in the main section of the Web page
            -->
            <!--
            If the content variable isn't set (such as when you first access the Web page), the code performs another check. It checks to see if the visitor has the store_admin session cookie set in their browser session.
            -->
            <!--
            If the cookie is set, it means the visitor is already logged into the application, and he or she is sent to the next Web page defined in the content HTML variable. If the cookie isn't set, the visitor isn't logged in. So the main section includes the file adminlogin.html.
            -->
            <?php
            if (!isset($_REQUEST['content']))
            {
                if (!isset($_SESSION['store_admin']))
                    include("adminlogin.html");
                else
                    include("adminmain.inc.php");
            }
            else
            {
                $content = $_REQUEST['content'];
                $nextpage = $content . ".inc.php";
                include($nextpage);
            } ?></td>
        <td id="status" width="30%" valign="top">
            <?php include("adminstatus.inc.php"); ?></td>
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
