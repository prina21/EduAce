
<?php
if(isset($_POST['delete']))
{
// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);
echo'<script>alert("Successfully logged out")</script>';
}
?>


<?php
echo "Cookie 'user' is deleted.";
?>
