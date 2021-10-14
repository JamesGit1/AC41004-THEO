<?php
if (isset($_POST['submitAccount'])) {
  $query = "SELECT * FROM account WHERE code = :code;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":code", $code);
  $code = $_POST['code'];
  $stmt->execute();

  if ($stmt->rowCount() > 0) { // Code matches
    if ($_POST['password1'] != $_POST['password2']) {
      echo '<script language="javascript">alert("Passwords do not match please re-enter")</script>';
    } else { // Code and passwords match!
      $row = $stmt->fetch();
      $id = $row['id'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $role = $row['role'];

      $query = "SELECT ID FROM account WHERE account.`username` = :username;";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(":username", $usernamereturned, PDO::PARAM_STR);
      $usernamereturned = $_POST['inputusername'];
      $stmt->execute();
      // if the username is already found in the database, tell the user that this account already exists in the database
      if ($stmt->rowCount() == 1) {
        echo '<script language="javascript">alert("Username already taken")</script>';
      } else { // Insert account into database
        $query = "UPDATE account SET `username` = :username, `password` = :password, code = NULL WHERE (`id` = '$id');";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $usernamereturned, PDO::PARAM_STR);
        $stmt->bindParam(":password", $hashedPassword, PDO::PARAM_STR);

        $hashedPassword = hash('sha256', $_POST['password1']);

        $stmt->execute();
        unset($stmt);

        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $id;
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $usernamereturned;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;

        $_SESSION['signedUp'] = true;

        header("Location: landing-page.php");
        exit;
      }
    }
  } else {
    echo '<script language="javascript">alert("Code not recognized")</script>';
  }
}

?>