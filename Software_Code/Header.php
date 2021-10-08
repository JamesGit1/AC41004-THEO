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

  <nav class="navbar navbar-expand-lg p-3">
    <a href="index.php">
      <img src="images/theo-logo2.png" alt="Logo" width="100" />
    </a>
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="p-4">
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <ul class="navbar-nav">
            <?php
            if (isset($_SESSION['loggedIn'])) {
              // When user is logged in
              if ($_SESSION['loggedIn']) {
                echo '<a href="./landing-page.php"><button class="btn button-orange">Home</button></a>
                  <a href="./my-profile.php"><button class="btn button-orange">My Profile</button></a>
                  <a href="./php/logoff.php"><button class="btn">Log out</button></a>';
              }
            }
            else { // When user not logged in
              echo '<button type="button" class="btn" data-toggle="modal" data-target="#loginModal">
                Log In
              </button>
              <a href="./create-account.php"><button class="btn">Sign Up</button></a>';
            }
            ?>
          </ul>
        </div>
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
            <span class="help-block"><?php if(isset($login_err)) echo $login_err; ?></span>
            <div class="container p-0">
              <button class="btn button-orange w-100 mt-4" type="submit" name="loginRequest">
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
