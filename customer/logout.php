<?php
setcookie('customer-email', '', time() - (86400 * 30), "/");
setcookie('customer-password', '', time() - (86400 * 30), "/");
session_start();
session_unset();
session_destroy();
header('location:index.php');

?>