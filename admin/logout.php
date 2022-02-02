<?php
session_start();
unset($_SESSION['store_admin']);
header("Location: admin.php");
?>
