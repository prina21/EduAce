<?php
session_start();
session_unset();
setcookie("user", "", time() - 3600);
session_destroy();
header('Location: login.php');
?>