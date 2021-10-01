<!DOCTYPE html>

<?php
session_start();
require('./php/conn.php');

$login_err = "";

// Logs in and checks user details to log in
if (isset($_POST['loginRequest'])) {
  $query = "SELECT * FROM account where username = :username";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":username", $inputUsername, PDO::PARAM_STR);
  $inputUsername = $_POST['inputUsername'];
  $stmt->execute();

  // counts row of statement
  if ($stmt->rowCount() == 1) {
      $row = $stmt->fetch();
      $id = $row['id'];
      $username = $row['username'];
      $password = $row['password'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];

      $hashedpassword = hash('sha256', $_POST['inputPassword']);


      // Set sessions variables
      if ($password == $hashedpassword) {
          $_SESSION['loggedIn'] = true;
          $_SESSION['userID'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          $_SESSION['email'] = $email;

          var_dump($_SESSION);
      } else {
          $login_err = "Password or username incorrect please try again...";
      }
  } else {
      $login_err = "Password or username incorrect please try again...";
  }
}

?>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/logo.png" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <!--Icons-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Theo Health</title>
</head>

<header>
  <nav class="navbar navbar-expand-lg">
    <a href="index.php">
      <img src="images/theo-logo.png" alt="Logo" width="100" />
    </a>
    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
      <ul class="navbar-nav">
        <button type="button" class="btn" data-toggle="modal" data-target="#loginModal">
          Log In
        </button>
        <a href="./create-account.php"><button class="btn">Sign up</button></a>
      </ul>
    </div>
  </nav>

  <!-- Log-in pop-up -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog-centered modal-dialog">
      <div class="modal-content">
        <!-- Pop-up header -->
        <div class="modal-header">
          <h4 class="modal-title container text-center">Log In to Theo Health</h4>
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <!-- Login form -->
          <form class="text-left" method="post">
            <div class="form-group">
              <label> Username: </label>
              <input type="text" class="form-control" name="inputUsername" placeholder="Username" />
            </div>
            <div class="form-group">
              <label> Password: </label>
              <input type="password" class="form-control" name="inputPassword" placeholder="Password" />
            </div>
            <span class="help-block"><?php echo $login_err; ?></span>
            <div class="container p-0">
              <button class="btn button-orange w-100" type="submit" name="loginRequest">
                Log In
              </button>
            </div>
          </form>
        </div>
        <div class="container text-center p-0">
          <p style="color: black">No account?
            <a href="./create-account.php">Create one
          </p></a>
        </div>
      </div>
    </div>
  </div>
  <!-- End of login pop-up -->
</header>
<div class="container">
  <div class="row">
    <div class="col-6 overlay">
      <img src="images/theo-logo.png" width="400px" class="img-fluid" alt="Responsive image" />
      <h3>coming soon..</h3>
      <p>
        Revolutionising how we train and recover from injury by allowing you
        to measure, track and analyse your muscle development, even before
        progress is physically visible.
        <br />
        Sign up to get started!
      </p>
      <a href="./create-account.php"><button class="btn button-orange">Sign up</button></a>
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

</html>