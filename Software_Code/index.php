<?php 
session_start();
require('./php/conn.php');
include('header.php');
include('./php/login.php');
if(isset($_SESSION['loggedIn'])){
  if($_SESSION['loggedIn']){
    header("Location: landing-page.php");
  }
}
?>

<body class="background">
<div class="container">
  <div class="row">
    <div class="col-4">
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

<footer>
  <!-- jQuery then Bootstrap JS for pop-ups -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script src="js/script.js"></script>
</footer>

</body>
</html>
