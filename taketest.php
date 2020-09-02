<?php include 'header.php' ?>
  <main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Test Your Skills</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
<div class='container'>
    <div style="margin-top:50px; text-align: center;" data-aos="zoom-in" data-aos-delay="100">
    
    <button class="get-started-btn" id="taketest" name="taketest" onClick="window.location='testdetails.php'">Take Test</button><br><br>
    <h4>OR</h4><br>
    <form method='post' action="check.php">
    <input class='form-input' type="text" id='cid' name='cid' placeholder='Enter CID...'>
    <button class="get-started-btn" style="margin-left:20px;" id="showcert" name="showcert" type="submit">Show Certificate</button>
    </form>
    
  </div>
  <br>
</div>

</main><!-- End #main -->
<?php include 'footer.php' ?>