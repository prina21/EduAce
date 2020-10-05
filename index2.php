<?php
session_start();
if(isset($_POST['submit'])){
    $_SESSION['name'] = $_POST['name'];
    header('Location: index.php');
}
?>