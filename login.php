<?php include 'header.php' ?>
<style>
.error {
color : #FF0000;}
</style>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $usernameErr = $passwordErr = $cpasswordErr = "";
$name = $email = $username = $password = $password2 = "";

//for username
$reg = '/^[0-9a-zA-Z_]{5,}$/';

//for password
//for number
$regn = '#[0-9]+#';
//for letter
$regsl='#[a-z]+#';
//for captal letter
$regcl='#[A-Z]+#';
//for symbol
$regs='#\W+#';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
    } elseif(!preg_match($reg,$_POST["username"])){
       $usernameErr = "Username must be bigger that 5 chars and contain only digits, letters and underscore";
    }else {
      $username = test_input(filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));
    }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } elseif((!preg_match($regn,$_POST["password"])) || (!preg_match($regsl,$_POST["password"])) || (!preg_match($regcl,$_POST["password"]) )
    || (!preg_match($regs,$_POST["password"])) || (strlen($_POST["password"]) < 8) || (strlen($_POST["password"]) > 20)){
     $passwordErr = "Password should be of minimum 8 characters and maximum 20 characters and must include atleast one number, one letter, one capital letter and one symbol";
  } else {
    $password = test_input($_POST["password"]);
  }



}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
if(isset($_POST['submit']))
{
$cookie_name = "user";
$cookie_value = $_POST["username"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
// header('Location: cookie1.php');
$_SESSION['user'] = $_POST["username"];
$_SESSION['pass'] = $_POST['password'];
header('Location: index1.php');
}
?>



<main id="main">

<div class="container" style="margin-top:150px; margin-bottom:150px;">
  <!--Content-->
  <center>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:500px;">
      <div class="modal-content form-elegant">
        <!--Header-->
        <div class="modal-header blue-gradient text-center">
          <h4 class="modal-title white-text w-100 font-weight-bold py-2">Login</h4>
        </div>
        <!--Body-->     
        <div class="modal-body mx-4">
          <!--Body-->
          <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="Form-username">Enter Username</label>
            <input type="text" id="Form-usernamelogin" class="form-control validate" name="username"><br/>
            <span class="error">* <?php echo $usernameErr;?></span>
          </div>

          <div class="md-form mb-3">
         <label data-error="wrong" data-success="right" for="Form-pass1">Enter Password</label>
          <input type="password" id="Form-pass1" class="form-control validate" name="password" ><br/>
            <span class="error">* <?php echo $passwordErr;?></span> 
          </div>
         

          <div class="text-center mb-3">
            <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a" name="submit" id="submit">Sign in</button>
          </div>
        </div>
      </div>
    </form>
    <!--/.Content-->
</center>
</div>
</main>
    <?php include 'footer.php' ?>