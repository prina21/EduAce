<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

if(isset($_POST['submit']))
{

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
  include 'config.php';

  $fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

  $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

  $bookname = filter_var($_POST["bookname"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

  $_SESSION['bookname'] = $bookname;
  $stmt1 = $conn->prepare("select * from book where Book_Name = ?");
  $stmt1->bind_param('s',$bookname);
  $stmt1->execute();
  $result = $stmt1->get_result();
  $row = $result->fetch_assoc();
  $id = $row['id'];

  $bytes = random_bytes(8);
  $cid = bin2hex($bytes);

  // set the timezone first
if(function_exists('date_default_timezone_set')) {
  date_default_timezone_set("Asia/Kolkata");
}

  $timestamp = date("Y-m-d H:i:s");


  $_SESSION["CID"]=$cid;

   $stmt = $conn->prepare("insert into test_details(Course_Id,Name,Email,Phone,Timestamp,CID) values (?,?,?,?,?,?)");
   $stmt->bind_param('isssss',$id,$fullname,$email,$phone,$timestamp,$cid);
   $stmt->execute();

  }
  header('Location: test.php');

}

?>

</body>
</html>