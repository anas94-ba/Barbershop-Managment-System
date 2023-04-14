<?php
setcookie('username', '', time() - (86400 * 30), "/");
setcookie('password', '', time() - (86400 * 30), "/");
session_start();
session_unset();
session_destroy();
header('location:index.php');

?>