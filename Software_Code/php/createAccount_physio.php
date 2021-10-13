<?php

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

        // Do a call to the database to get id
        $query = "SELECT * FROM account where username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $inputusername, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch();
        $id = $row['id'];

        unset($stmt);

        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $id;
        $_SESSION['username'] = $inputusername;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;

        $_SESSION['signedUp'] = true;

        echo '<script language="javascript">alert("Signed up as physio, redirecting to homepage")</script>';

        header("Location: landing-page.php");
        exit;
      }
    }
  }
}
?>