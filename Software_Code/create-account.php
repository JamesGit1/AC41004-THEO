<?php
session_start();
require('./php/conn.php');
include('php/createAccount.php');
include('header.php');
?>

<body class="background">
  <div class="content-box container border">
    <div class="container text-center">
      <a href="./index.php">
        <img src="images/theo-logo2.png" alt="Theo Health Logo" class="img-fluid" id="createAccountLogo" /></a>
    </div>
    <h3>Create your account</h3>
    <div class="container p-0">
      <div class="row">
        <div class="col mb-2">
          <a href="./create-account_physio.php">I am a physiotherapist</a>
        </div>
      </div>
        <div class="row">
          <div class="col">
            <p><b>Note:</b> To sign up as an athlete you require to provide an activation code from a physiotherapist.</p>
          </div>
        </div>
    </div>

    <form class="" method="post">
      <div class="form-group">
        <label for="codeInput">Code: </label>
        <input type="int" class="form-control" name="code" id="codeInput" value="" placeholder="5-digit code" required maxlength="11" />
      </div>
      <div class="form-group">
        <label for="newUsernameInput">Username: </label>
        <input type="text" class="form-control" name="inputusername" id="newUsernameInput" required maxlength="45" />
      </div>
      <div class="form-group">
        <label for="newPassword1Input">Password: </label>
        <input type="password" class="form-control" name="password1" id="newPassword1Input" required />
      </div>
      <div class="form-group mb-2">
        <label for="newPassword2Input">Confirm Password: </label>
        <input type="password" class="form-control" name="password2" id="newPassword2Input" required />
      </div>
      <button class="btn button-orange mt-2 btn-lg" type="submit" name="submitAccount">Register</button>
    </form>
  </div>
</body>
