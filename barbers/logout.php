<?php
setcookie('barber-username', '', time() - (86400 * 30), "/");
setcookie('barber-password', '', time() - (86400 * 30), "/");
session_start();
session_unset();
session_destroy();
header('location:index.php');

?>