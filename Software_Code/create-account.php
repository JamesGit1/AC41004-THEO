<?php
require('php/conn.php');
session_start();
include('php/createAccount.php');
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body class="background">
  <div class="content-box container p-5 mt-5 border">
    <a href="./index.php">
      <img src="images/theo-logo.png" alt="" class="img-fluid w-25" /></a>
    <div class="container w-90 mt-4">
      <h2>Create your account</h2>
    </div>
    <div class="container w-90">
      <form class="mt-3" method="post">
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
        <button class="btn button-orange mt-4 btn-lg" type="submit" name="submitAccount">Register</button>
      </form>
    </div>
  </div>
</body>