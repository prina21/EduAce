

<?php include 'header.php' ?>
<main id="main">

<div class="container" style="margin-top:150px; margin-bottom:150px;">
  <!--Content-->
  <center>
    <!-- REGISTER FORM -->
  <!--Content-->
  <form action="/register" method="POST" style="width:750px;">
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header blue-gradient text-center">
        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Register</h4>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
            <div class="md-form mb-2">
          <input type="text" id="Form-name" class="form-control validate" name="name" required>
          <label data-error="wrong" data-success="right" for="Form-name">Enter Name</label>
        </div>

        <div class="md-form mb-2">
          <input type="text" id="Form-username" class="form-control validate" name="username" required>
          <label data-error="wrong" data-success="right" for="Form-username">Enter Username</label>
        </div>

        <div class="md-form mb-2">
          <input type="email" id="Form-email1" class="form-control validate" name="email" required>
          <label data-error="wrong" data-success="right" for="Form-email1">Enter Email</label>
        </div>

        <div class="md-form mb-2">
          <input type="password" id="Form-pass1" class="form-control validate" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <label data-error="wrong" data-success="right" for="Form-pass1">Enter Password</label>
        </div>
    
        <div class="md-form mb-2">
          <input type="password" id="Form-pass2" class="form-control validate" name="password2" required>
          <label data-error="wrong" data-success="right" for="Form-pass2" onchange="validateForm()">Confirm Password</label>
        </div>

        <div class="text-center mb-2">
          <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign Up</button>
        </div>
      </div>
    </div>
  </form>
  <!--/.Content-->


</center>
</div>
</main>
    <?php include 'footer.php' ?>
