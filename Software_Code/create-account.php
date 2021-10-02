<?php include 'header.php';?>
<?php
require('./php/conn.php');
session_start();
//var_dump($_POST);

// $query = "SELECT * FROM account";
// $stmt = $pdo->prepare($query);
// $stmt->execute();
// $firstentry = $stmt->fetch();

if (isset($_POST['submitAccount'])) {
  //passwords don't match try again
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $inputusername = $_POST['inputusername'];
  $role = $_POST['role'];

  if ($_POST['password1'] != $_POST['password2']) {
    echo '<script language="javascript">alert("Passwords do not match please re-enter")</script>';
  } else {
    if ($role == "none") {
      echo '<script language="javascript">alert("Please select you profile type")</script>';
    } else {
      $query = "SELECT ID FROM account WHERE account.`username` = :username;";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(":username", $usernamereturned, PDO::PARAM_STR);
      $usernamereturned = $_POST['inputusername'];
      $stmt->execute();
      // if the username is already found in the database, tell the user that this account already exists in the database
      if ($stmt->rowCount() == 1) {
        $username_err = "This username is already taken";
      }

      if (empty($username_err))   // insert the account into the database
      {
        $query = "INSERT INTO account (`username`,`password`,`firstname`,`lastname`, `email`, `role`) VALUES (:username,:password,:firstname,:lastname,:email,:role)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $inputusername, PDO::PARAM_STR);
        $stmt->bindParam(":password", $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":role", $role, PDO::PARAM_STR);

        $hashedPassword = hash('sha256', $_POST['password1']);

        $stmt->execute();
        unset($stmt);

        header("Location: landing-page.php");
      }
    }
  }
}

?>

<!-- Even though these 2 lines are in the header.php file, if I delete them from here - it does not work-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

<body class="background">
  <div class="content-box container p-5 mb-5 border">
    <a href="./index.php">
      <img src="images/theo-logo2.png" alt="" class="img-fluid w-25" /></a>
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

<footer>
  <!-- jQuery then Bootstrap JS for pop-ups -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script src="js/script.js"></script>
</footer>
