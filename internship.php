<?php include 'header.php'; ?>


  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Career Opportunities</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="internships" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <!--To be repeated-->
              <?php
                include 'config.php';
                  $stmt = $conn->prepare("select * from internship_details");
                  $stmt->execute();
                 $result = $stmt->get_result();
                    
                 if ($result->num_rows > 0) {
                  // output data of each row
                   while($row = $result->fetch_assoc()) {
                                
                  print "<div class='col-lg-6 col-md-6 d-flex align-items-stretch'>
                      <div class='course-item'>
                        <img src='assets/img/course-1.jpg' class='img-fluid' alt='...'>
                        <div class='course-content'>
                          <div class='d-flex justify-content-between align-items-center mb-3'>
                            <h4>{$row['title']}</h4>
                            <p class='price'>{$row['duration']}</p>
                          </div>

                          <h3><a href='course-details.html'>{$row['skills']}</a></h3>
                          <p>{$row['description']}</p>
                          <div class='trainer d-flex justify-content-between align-items-center'>
                            <div class='trainer-profile d-flex align-items-center'>
                              
                            </div>
                            <div class='trainer-rank d-flex align-items-center'>
                              <a href='{$row['link']}' class='get-started-btn' id='buy' name='buy' type='submit'>Apply</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>";
                  }
                }
                $stmt->close();
              
          $conn->close();

          ?>
        </div>
</div>
  </section>
<center>  <?php require 'internships.php'; ?></center>
</main><!-- End #main -->

<?php include 'footer.php'; ?>
