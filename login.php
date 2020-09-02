
<?php include 'header.php' ?>
<main id="main">

<div class="container" style="margin-top:150px; margin-bottom:150px;">
  <!--Content-->
  <center>
    <form method="POST" action="/login" style="width:500px;">
      <div class="modal-content form-elegant">
        <!--Header-->
        <div class="modal-header blue-gradient text-center">
          <h4 class="modal-title white-text w-100 font-weight-bold py-2">Login</h4>
        </div>
        <!--Body-->     
        <div class="modal-body mx-4">
          <!--Body-->
          <div class="md-form mb-3">
            <input type="text" id="Form-usernamelogin" class="form-control validate" name="username">
            <label data-error="wrong" data-success="right" for="Form-username">Enter Username</label>
          </div>

          <div class="md-form mb-3">
            <input type="password" id="Form-passlogin1" class="form-control validate" name="password">
            <label data-error="wrong" data-success="right" for="Form-pass1">Enter Password</label>
          </div>
         

          <div class="text-center mb-3">
            <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
          </div>
        </div>
      </div>
    </form>
    <!--/.Content-->
</center>
</div>
</main>
    <?php include 'footer.php' ?>
