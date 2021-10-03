
<?php 
include 'header.php'
require('php/conn.php');
session_start();
?>

<body class="background">
  <div class="content-box container p-5 mt-5 border">
    <div class="container">
      <div class="container text-center">
        <h2 class="title">Welcome back, <?php echo $_SESSION['firstname'];?> </h2>
        <div class="row p-5">
          <div class="col-md">
            <i class="fas fa-user-circle fa-7x"></i>
            <br></br>
            <a href="my-profile.php"><button class="btn btn-outline-dark w-50">My Profile</button></a>
          </div>
          <?php if ($_SESSION['role'] == "physiotherapist") {
            echo '<div class="col-md">
            <i class="fas fa-users fa-7x"></i>
            <br></br>
            <a href="clients.php"><button class="btn btn-outline-dark w-50">My Clients</button></a>
          </div>';
          } ?>
          <?php if ($_SESSION['role'] == "athlete") {
            echo '<div class="col-md">
            <i class="fas fa-chart-line fa-7x"></i>
            <br></br>
            <a href="track-progress.php"><button class="btn btn-outline-dark w-50">Progress</button></a>
          </div>';
          } ?>

        </div>
      </div>
    </div>
  </div>
</body>