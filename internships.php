<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';

if(isset($_POST['submit'])){
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
     // Remove HTML tags and all characters with ASCII value > 127

          $fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          
          $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
          
          $skills = filter_var($_POST["skills"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

          $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

          // prepare and bind
        $stmt = $conn->prepare("insert into internship (fullname,phone,skills,email) values (?,?,?,?)");
        $stmt->bind_param("ssss", $fullname, $phone,$skills,$email);

        if ($stmt->execute())
          {echo "<h3>Thank You for Connecting!!!!</h3>";}
        else
          {echo "error";}
          $stmt->close();

  }
}
?>
</html>