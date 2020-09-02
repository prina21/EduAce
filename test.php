<?php
session_start();
?>
  <?php include 'header.php' ?>
<style>
.form-input{
  width:27em;
  height:3em;

}
</style>


  <main id="main">

  <div class="breadcrumbs">
      <div class="container">
        <h2>Test Your Knowledge</h2>
        </div>
    </div><!-- End Breadcrumbs -->

<!-- ======= Test Section ======= -->
<section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <!--To be repeated-->
          <form method='post' class='mx-auto' action='check.php'>
              <?php
                
                include 'config.php';
                
                
                $stmt1 = $conn->prepare("select * from test_details where CID = ?");
                $stmt1->bind_param('s',$_SESSION["CID"]);
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                while($row1 = $result1->fetch_assoc())
                {
                $id = $row1['Course_Id'];
                $_SESSION['id'] = $id;
                }
                $stmt1->close();

                $stmt2 = $conn->prepare("select * from quiz where Course_Id = {$id}");
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $num_rows = mysqli_num_rows($result2);

                for($i =1; $i<=$num_rows;$i++)
                {
                //   $stmt = $conn->prepare("select * from `{$id}` where id = {$i}");
                //   $stmt->execute();
                //  $result = $stmt->get_result();

                 if ($result2->num_rows > 0) {
                  // output data of each row
                   while($row = $result2->fetch_assoc()) {
                                
                  print "<div class='form-group align-items-center' style='padding-top:30px;'>
                  <div class='course-item'>
                    <div class='course-content'>
                      <div class='d-flex justify-content-between align-items-center mb-2 my-3'>
                        <h2>{$row['qno']}.{$row['Question']}</h2>
                      </div>
                      <div class='radio'>
                      <label><input type='radio' name='quizcheck[{$row['qno']}]' value='1'>{$row['Option_1']}</label>
                      </div>
                      <div class='radio'>
                      <label><input type='radio' name='quizcheck[{$row['qno']}]' value='2'>{$row['Option_2']}</label>
                      </div>
                      <div class='radio'>
                      <label><input type='radio' name='quizcheck[{$row['qno']}]' value='3'>{$row['Option_3']}</label>
                      </div>
                      <div class='radio'>
                      <label><input type='radio' name='quizcheck[{$row['qno']}]' value='4'>{$row['Option_4']}</label>
                      </div>
                      
                    </div>
                  </div>
                </div>
                ";
                       }}
                  }
                
                // $stmt->close();
              
          $conn->close();
          print "<button class='get-started-btn' type='submit' name='submit' id='submit'>Submit</button>"

          ?>
          
          </form>
        </div>

      </div>

    </section><!-- End Courses Section -->

  </main><!-- End #main -->
  <?php include 'footer.php' ?>