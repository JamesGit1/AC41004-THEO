<?php
session_start();
if(isset($_SESSION['loggedIn'])){
  if($_SESSION['loggedIn']){
    header("Location: landing-page.php");
    exit;
  }
}
require('./php/conn.php');
include('header.php');
include('./php/login.php');
?>

<body class="background">
<div class="container p-3">
  <div class="row">
    <div class="col index-para-box">
      <img src="images/theo-logo.png" width="400px" class="img-fluid" alt="Responsive image" />
      <h3>coming soon..</h3>
      <p class="home-text">
        Revolutionising how we train and recover from injury by allowing you
        to measure, track and analyse your muscle development, even before
        progress is physically visible.
        <br />
        Sign up to get started!
      </p>
      <a href="./create-account.php"><button class="btn button-orange">Sign Up</button></a>
    </div>
  </div>
</div>

</body>
</html>
