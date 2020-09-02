<?php session_start(); ?>
<?php include 'header.php'; ?>

  <main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Result</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->
    
    <div class='container'>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Test Given</th>
      <th scope="col">Score</th>
      <th scope="col">CID NO.</th>
      <th scope="col">Certificate</th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $_SESSION['bookname']; ?></td>
    <td><?php echo $_SESSION['score']; ?></td>
    <td><?php echo $_SESSION['CID']; ?></td>
    <?php if($_SESSION['result'] == "Pass")
    {
      echo "<td><a href='certificate.php'>Certificate</a></td>";
    }else{
      echo "<td>Failed</td>";
    }
    ?>
    <?php 
      if($_SESSION['message'])
      {
        echo "<center><h3>".$_SESSION['message']."</h3></center>";
      }
    ?>
    </tr>
    
  </tbody>
</table>
    </div>

</main><!-- End #main -->
<?php include 'footer.php'; ?>