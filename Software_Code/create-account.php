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
    <div class="container">
      <div class="row">
        <div class="col mb-2">
          <a href="./create-account_physio.php">I am a physiotherapist</a>
        </div>
        <div class="row">
          <div class="col">
            <p>To sign up as an athlete you require an activation code from a physiotherapist</p>
          </div>
        </div>
      </div>

      <form class="" method="post">
        <div class="form-group">
          <label>Code: </label>
          <input type="int" class="form-control" name="code" value="" placeholder="Code..." required maxlength="11" />
        </div>
        <div class="form-group">
          <label>Username: </label>
          <input type="text" class="form-control" name="inputusername" placeholder="Username..." required maxlength="45" />
        </div>
        <div class="form-group">
          <label>Password: </label>
          <input type="password" class="form-control" name="password1" placeholder="Password..." required />
        </div>
        <div class="form-group mb-2">
          <label>Confirm Password: </label>
          <input type="password" class="form-control" name="password2" placeholder="Confirm Password..." required />
        </div>
        <button class="btn button-orange mt-2 btn-lg" type="submit" name="submitAccount">Register</button>
      </form>
    </div>
</body>