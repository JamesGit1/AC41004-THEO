<?php
require('php/conn.php');
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

  if ($_POST['password1'] != $_POST['password2']) {
    echo '<script language="javascript">alert("Passwords do not match please re-enter")</script>';
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
      $query = "INSERT INTO account (`username`,`password`,`firstname`,`lastname`, `email`) VALUES (:username,:password,:firstname,:lastname,:email)";

      $stmt = $pdo->prepare($query);

      $stmt->bindParam(":username", $inputusername, PDO::PARAM_STR);
      $stmt->bindParam(":password", $hashedPassword, PDO::PARAM_STR);
      $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
      $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);

      $hashedPassword = hash('sha256', $_POST['password1']);

      $stmt->execute();
      unset($stmt);

      header("Location: index.php");
    }
  }
}

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body class="background">
    <div class="create-form container p-5 mt-5 border">
        <a href="./index.php">
            <img src="images/theo-logo.png" alt="" class="img-fluid w-25" /></a>
        <div class="container w-90 mt-4">
            <h2>Create your account</h2>
        </div>
        <div class="container w-90">
            <form class="mt-3" method="post">
                <div class="form-group">
                    <label>First Name: </label>
                    <input type="text" class="form-control" name="firstname"
                        value="<?php if(isset($firstname))echo $firstname; ?>" placeholder="First Name..." required />
                </div>
                <div class="form-group">
                    <label>Last Name: </label>
                    <input type="text" class="form-control" name="lastname"
                        value="<?php if(isset($lastname))echo $lastname; ?>" placeholder="Last Name..." required />
                </div>
                <div class="form-group">
                    <label>Email: </label>
                    <input type="email" class="form-control" name="email" value="<?php if(isset($email))echo $email; ?>"
                        placeholder="Email..." required />
                </div>
                <div class="form-group w-auto">
                    <label>Username: </label>
                    <input type="text" class="form-control" name="inputusername"
                        value="<?php if(isset($inputusername))echo $inputusername; ?>" placeholder="Username..."
                        required />
                </div>
                <div class="form-group">
                    <label>Password: </label>
                    <input type="password" class="form-control" name="password1" placeholder="Password..." required />
                </div>
                <div class="form-group">
                    <label>Confirm Password: </label>
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password..."
                        required />
                    <span class="help-block"><?php if(isset($username_err))echo $username_err; ?></span>
                </div>
                <button class="btn button-orange mt-4 btn-lg" type="submit" name="submitAccount">Register</button>
            </form>
        </div>
    </div>
</body>