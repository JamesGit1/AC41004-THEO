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
      <form class="" method="post">
        <div class="form-group">
          <label>First Name: </label>
          <input type="text" class="form-control" name="firstname" value="<?php if (isset($firstname)) echo $firstname; ?>" placeholder="First Name..." required maxlength="45" />
        </div>
        <div class="form-group">
          <label>Last Name: </label>
          <input type="text" class="form-control" name="lastname" value="<?php if (isset($lastname)) echo $lastname; ?>" placeholder="Last Name..." required maxlength="45" />
        </div>
        <div class="form-group">
          <label>Email: </label>
          <input type="email" class="form-control" name="email" value="<?php if (isset($email)) echo $email; ?>" placeholder="Email..." required maxlength="200" />
        </div>
        <div class="form-group w-auto">
          <label>Username: </label>
          <input type="text" class="form-control" name="inputusername" value="<?php if (isset($inputusername)) echo $inputusername; ?>" placeholder="Username..." required maxlength="45" />
        </div>
        <div class="form-group">
          <label>Password: </label>
          <input type="password" class="form-control" name="password1" placeholder="Password..." required />
        </div>
        <div class="form-group">
          <label>Confirm Password: </label>
          <input type="password" class="form-control" name="password2" placeholder="Confirm Password..." required />
          <span class="help-block"><?php if (isset($username_err)) echo $username_err; ?></span>
        </div>
        <div class="form-group">
          <label>Account Type: </label>
          <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="role">
            <option value="none" selected>Please select...</option>
            <option value="athlete">Athlete</option>
            <option value="physiotherapist">Physiotherapist</option>
          </select>
        </div>
        <div class="form-group">
          <label>Code (ATHLETE ONLY): </label>
          <input type="int" class="form-control" name="code" value="" placeholder="Code..." required maxlength="11" />
        </div>
        <button class="btn button-orange mt-2 btn-lg" type="submit" name="submitAccount">Register</button>
      </form>
  </div>
</body>
