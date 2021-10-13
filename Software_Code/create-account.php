<?php
session_start();
include('header.php');
require('./php/conn.php');
include('php/createAccount.php');
?>

<body class="background">
  <div class="content-box container border">
    <div class="container text-center">
      <a href="./index.php">
      <img src="images/theo-logo2.png" alt="Theo Health Logo" class="img-fluid" id="createAccountLogo" /></a>
    </div>
      <h3>Create your account</h3>
      <p>*For now you require a code from an advisor to access theo health</p>
      <form class="" method="post">
        <div class="form-group w-auto">
          <label>Username: </label>
          <input type="text" class="form-control" name="inputusername" placeholder="Username..." required maxlength="45" />
        </div>
        <div class="form-group">
          <label>Password: </label>
          <input type="password" class="form-control" name="password1" placeholder="Password..." required />
        </div>
        <div class="form-group">
          <label>Confirm Password: </label>
          <input type="password" class="form-control" name="password2" placeholder="Confirm Password..." required />
        </div>
        <div class="form-group mb-3">
          <label>Code: </label>
          <input type="int" class="form-control" name="code" value="" placeholder="Code..." required maxlength="11" />
        </div>
        <button class="btn button-orange mt-2 btn-lg" type="submit" name="submitAccount">Register</button>
      </form>
  </div>
</body>
