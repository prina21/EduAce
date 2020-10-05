
<?php
$cookie_name = 'user';
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<?php
        if(isset($_COOKIE[$cookie_name]))
        {
        ?>
        <form action="cookiee.php" method="post">
        	<br>
            <input type="submit" value="Delete" name="delete">
        </form>
        <?php
        }
      ?>