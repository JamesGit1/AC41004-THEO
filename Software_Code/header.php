<?php include('./php/login.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Favicon -->
  <link rel="icon" href="images/Favicon.png">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!--Icons-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Theo Health</title>
</head>

<header>

  <nav id="nav" class="navbar navbar-expand-lg">
    <div class="container">
      <a href="index.php">
        <img src="images/theo-logo2.png" alt="Logo" width="100" />
      </a>
      <button class="navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </button>
      <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- <div class="menu d-flex"> -->
          <?php
          if (isset($_SESSION['loggedIn'])) {
            // When user is logged in
            if ($_SESSION['loggedIn']) {
              echo '<li class="nav-item active">
                              <a class="nav-link logged-in-menu-item" href="./landing-page.php">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link logged-in-menu-item" href="./my-profile.php">My Profile</a>
                          </li>
                          ';
              if ($_SESSION['role'] == "physiotherapist") {
                echo '<li class="nav-item"><a class="nav-link logged-in-menu-item" href="./clients.php">My Clients</a></li>';
              }
              if ($_SESSION['role'] == "athlete") {
                echo '<li class="nav-item"><a class="nav-link logged-in-menu-item" href="./progress-overview.php">My Progress</a></li>';
              }
              echo '<li class="nav-item">
                              <a class="nav-link logged-in-menu-item" href="./php/logoff.php"><b>Log out</b></a>
                          </li>';
            }
          } else { // When user not logged in
            echo '
            <li class="nav-item not-logged-in-menu-item">
                <button class="btn" data-toggle="modal" data-target="#loginModal">Log In</button>
            </li>
            <li class="nav-item not-logged-in-menu-item">
                <a href="./create-account.php"><button class="btn button-orange">Sign Up</button></a>
            </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Log-in pop-up -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog-centered modal-dialog">
      <div class="modal-content">
        <!-- Pop-up header -->
        <div class="modal-header">
          <h4 class="modal-title container text-center">Log In to Theo Health</h4>
          <button type="button" class="modal-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
        </div>

        <div class="modal-body p-0">
          <div class="container w-90">
            <form class="text-left" method="post">
              <div class="form-group">
                <label> Username: </label>
                <input type="text" class="form-control" name="inputUsername" placeholder="Username" />
              </div>
              <div class="form-group">
                <label> Password: </label>
                <input type="password" class="form-control" name="inputPassword" placeholder="Password" />
              </div>
              <span class="help-block"><?php if (isset($login_err)) echo $login_err; ?></span>
              <div class="container p-0">
                <button class="btn button-orange w-100 mt-4" type="submit" name="loginRequest">
                  Log In
                </button>
              </div>
            </form>
          </div>
        </div>

        <div class="container text-center p-0 mt-2">
          <p style="color: black">No account?
            <a href="./create-account.php">Create one
          </p></a>
        </div>
      </div>
    </div>
  </div>
  <!-- End of login pop-up -->
</header>

<footer>
  <!-- jQuery then Bootstrap JS for pop-ups -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</footer>