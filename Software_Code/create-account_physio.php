<?php
session_start();
require('./php/conn.php');
include('php/createAccount_physio.php');
include('header.php');
?>

<body class="background">
  <div class="content-box container border">
    <div class="container text-center">
      <a href="./index.php">
        <img src="images/theo-logo2.png" alt="Theo Health Logo" class="img-fluid" id="createAccountLogo" /></a>
    </div>
    <h3>Create your account</h3>
    <form class="" method="post">
      <div class="form-group">
        <label>Account Type: </label>
        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="role">
          <!-- <option value="none" selected>Please select...</option> -->
          <option selected value="physiotherapist">Physiotherapist</option>
        </select>
      </div>
      <div class="form-group">
        <label>First Name: </label>
        <input type="text" class="form-control" name="firstname" value="<?php if (isset($firstname)) echo $firstname; ?>" required maxlength="45" />
      </div>
      <div class="form-group">
        <label>Last Name: </label>
        <input type="text" class="form-control" name="lastname" value="<?php if (isset($lastname)) echo $lastname; ?>" required maxlength="45" />
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="email" class="form-control" name="email" value="<?php if (isset($email)) echo $email; ?>" required maxlength="200" />
      </div>
      <div class="form-group w-auto">
        <label>Username: </label>
        <input type="text" class="form-control" name="inputusername" value="<?php if (isset($inputusername)) echo $inputusername; ?>" required maxlength="45" />
      </div>
      <div class="form-group">
        <label>Password: </label>
        <input type="password" class="form-control" name="password1" required />
      </div>
      <div class="form-group mb-2">
        <label>Confirm Password: </label>
        <input type="password" class="form-control" name="password2" required />
        <span class="help-block"><?php if (isset($username_err)) echo $username_err; ?></span>
      </div>
      <button class="btn button-orange mt-2 btn-lg" type="submit" name="submitAccount">Register</button>
    </form>
  </div>
</body>
