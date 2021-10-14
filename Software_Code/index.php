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
?>

<body class="background">
<div class="container index-content-box border">
  <div class="row">
    <div class="col">
      <img src="images/theo-logo2.png" class="img-fluid" alt="Responsive image" id="indexImage" />
      <h3>Coming Soon..</h3>
      <p class="home-text">
        Revolutionising how we train and recover from injury by allowing you
        to measure, track and analyse your muscle development, even before
        progress is physically visible.
        <br />
        <b>Sign up to get started!</b>
      </p>
      <a href="./create-account.php"><button class="btn button-orange">Sign Up</button></a>
    </div>
  </div>
</div>

</body>
</html>
