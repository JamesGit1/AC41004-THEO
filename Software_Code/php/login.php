<?php
$login_err = "";

// Logs in and checks user details to log in
if (isset($_POST['loginRequest'])) {
  $query = "SELECT * FROM account where username = :username";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":username", $inputUsername, PDO::PARAM_STR);
  $inputUsername = $_POST['inputUsername'];
  $stmt->execute();

  // counts row of statement
  if ($stmt->rowCount() == 1) {
      $row = $stmt->fetch();
      $id = $row['id'];
      $username = $row['username'];
      $password = $row['password'];
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $role = $row['role'];

      $hashedpassword = hash('sha256', $_POST['inputPassword']);


      // Set sessions variables
      if ($password == $hashedpassword) {
          $_SESSION['loggedIn'] = true;
          $_SESSION['userID'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          $_SESSION['email'] = $email;
          $_SESSION['role'] = $role;

          unset($_SESSION['login_err']);
          
          header("Location: landing-page.php");

      } else {
          $_SESSION['login_err'] = "Password or username incorrect please try again...";
      }
  } else {
    $_SESSION['login_err'] = "Password or username incorrect please try again...";
  }
}
