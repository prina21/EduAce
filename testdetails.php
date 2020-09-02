<?php include 'header.php' ?>
<style>
.form-input{
  width: 30em;
  height: 3em;
}
</style>

  <main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Fill the details Below</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
    
    <div class='container'>
    <form method="POST" action="taketestdetails.php">
        <div class='row'>
      

          <div class='col-lg-6 col-md-6 align-items-center' data-aos="zoom-in" data-aos-delay="100"> 
              
              <br>
              <h4>FullName</h4>
              <input class="form-input" type="text" placeholder="Name...." id="fullname" name="fullname"><br><br>
              <h4>Email</h4>
              <input class="form-input" type="email" placeholder="Email...." id="email" name="email"><br><br>
          </div>
          <div class='col-lg-6 col-md-6 align-items-center' data-aos="zoom-in" data-aos-delay="100"> 
              <br>
                    <h4>Course</h4>

                    <select name='bookname' id='bookname' class='form-input' placeholder="Please Select Subject">
                    <?php 
                      include 'config.php';
                      $stmt = $conn->prepare("select * from book");
                      $stmt->execute();
                      $result = $stmt->get_result();
                      if ($result->num_rows > 0) {
                        // output data of each row
                        
                        while($row = $result->fetch_assoc()) {
                          ?>

                      <option value="<?php echo $row['Book_Name']; ?>"><?php echo $row['Book_Name']; ?></option>
                      <?php
                        }
                        }
                        $stmt->close();
                        
                    $conn->close();
                      ?>
                      
                    </select>
                    <br><br>
                    <h4>Contact Number</h4>
                    <input class="form-input" type="text" placeholder="Phone..." id="phone" name="phone" maxlength="10" minlength="10" size="10"><br><br>
                    
        </div>
        </div>
        <div class='align-items-center'>
        <button class="get-started-btn"  id="submit" name="submit">Submit</button>
        </div>
      </form>
      </div>

</main><!-- End #main -->
<?php include 'footer.php' ?>