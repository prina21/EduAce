<style>
.error {
color : #FF0000;}
</style>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $usernameErr = $passwordErr = $cpasswordErr = $reasonErr = "";
$name = $email = $username = $password = $password2 = $reason = "";

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
//for script tag
$script = '<script>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!preg_match("/^[a-zA-Z0-9@.\.]*$/", $email)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
    } elseif(!preg_match($reg,$_POST["username"])){
       $usernameErr = "Username must be bigger that 5 chars and contain only digits, letters and underscore";
    }else {
      $username = test_input($_POST["username"]);
    }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } elseif((!preg_match($regn,$_POST["password"])) || (!preg_match($regsl,$_POST["password"])) || (!preg_match($regcl,$_POST["password"]) )
    || (!preg_match($regs,$_POST["password"])) || (strlen($_POST["password"]) < 8) || (strlen($_POST["password"]) > 20)){
     $passwordErr = "Password should be of minimum 8 characters and maximum 20 characters and must include atleast one number, one letter, one capital letter and one symbol";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["password2"])) {
    $cpasswordErr = "Confirmation of password is required";
  } elseif(isset($_POST["password"])){
     if($_POST["password"]!=$_POST["password2"]){
      $cpasswordErr = "It should match with the above password";  
     }
  } else {
    $cpassword = test_input($_POST["password2"]);
  }

  if (empty($_POST["reason"])) {
    $reasonErr = "Reason is required";
  } else {
    $reason = test_input($_POST["reason"]);

    if (preg_match($script,$reason)) {
      $reasonErr = "No script Tag allowed";
    }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php include 'header.php' ?>
<main id="main">

<div class="container" style="margin-top:150px; margin-bottom:150px;">
  <!--Content-->
  <center>
    <!-- REGISTER FORM -->
  <!--Content-->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style="width:750px;">
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header blue-gradient text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Register</h4>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
            <div class="md-form mb-2">
            <label data-error="wrong" data-success="right" for="Form-name">Enter Name</label>
          <input type="text" id="Form-name" class="form-control validate" name="name"><br/>
          <span class="error">* <?php echo $nameErr;?></span>
        </div>

        <div class="md-form mb-2">
        <label data-error="wrong" data-success="right" for="Form-username">Enter Username</label>
          <input type="text" id="Form-username" class="form-control validate" name="username"><br/>
          <span class="error">* <?php echo $usernameErr;?></span>
          </div>

        <div class="md-form mb-2">
        <label data-error="wrong" data-success="right" for="Form-email1">Enter Email</label>
          <input type="email" id="Form-email1" class="form-control validate" name="email"><br/>
            <span class="error">* <?php echo $emailErr;?></span>
         </div>

        <div class="md-form mb-2">
        <label data-error="wrong" data-success="right" for="Form-pass1">Enter Password</label>
          <input type="password" id="Form-pass1" class="form-control validate" name="password" ><br/>
            <span class="error">* <?php echo $passwordErr;?></span> 
        </div>
    
        <div class="md-form mb-2">
        <label data-error="wrong" data-success="right" for="Form-pass2">Confirm Password</label>
          <input type="password" id="Form-pass2" class="form-control validate" name="password2"><br/>
            <span class="error">* <?php echo $cpasswordErr;?></span>
         </div>

         <div class="md-form mb-2">
        <label data-error="wrong" data-success="right" for="Form-reason">Reason to Join</label>
          <input type="text" id="Form-reason" class="form-control validate" name="reason"><br/>
            <span class="error">* <?php echo $reasonErr;?></span>
         </div>

        <div class="text-center mb-2">
        <br><input type="submit" name="submit" value="Submit">
        </div>
      </div>
    </div>
  </form>
  <!--/.Content-->


</center>
</div>
</main>
   