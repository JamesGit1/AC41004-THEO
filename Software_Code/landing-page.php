<?php
session_start();
require('php/conn.php');
include('header.php');
?>

<body class="background">
  <div class="content-box container border">
    <?php if (isset($_SESSION['signedUp'])) {
      echo '<h3 class="title"> Hello ' . $_SESSION['firstname'] . ', thanks for signing up!</h3><p>Go ahead and have a look around...</p>';
      unset($_SESSION['signedUp']);
    } else {
      echo '<h3 class="title"> Welcome Back, ' . $_SESSION['firstname'] . '!<h3>';
    }
    ?></h3>
    <div class="container d-flex justify-content-center">
      <div class="row">
        <div class="col text-center border" id="homeItem">
          <i class="fas fa-user-circle fa-7x"></i>
          <br></br>
          <a href="my-profile.php"><button class="btn button-orange">My Profile</button></a>
        </div>
        <?php if ($_SESSION['role'] == "physiotherapist") {
          echo '<div class="col text-center border" id="homeItem">
            <i class="fas fa-users fa-7x"></i>
            <br></br>
            <a href="clients.php"><button class="btn button-orange">My Clients</button></a>
          </div>';
        } ?>
        <?php if ($_SESSION['role'] == "athlete") {
          echo '<div class="col text-center border" id="homeItem">
            <i class="fas fa-chart-line fa-7x"></i>
            <br></br>
            <a href="progress-overview.php"><button class="btn button-orange">My Progress</button></a>
          </div>';
        } ?>

      </div>
    </div>
  </div>
</body>