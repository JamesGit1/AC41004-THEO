<?php
require('php/conn.php');
session_start();
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
  <div class="content-box container w-90 mt-5 p-5 border">
    <div class="container w-90 mb-4 p-0">
      <h2>My Profile</h2>
    </div>
    <!-- Account details -->
    <div class="row">
      <div class="col-md-2">
        <b> Username: </b>
      </div>
      <div class="col-md-10">
        <p><?php echo $_SESSION['username'] ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> First name: </b>
      </div>
      <div class="col-md-10">
        <p><?php echo $_SESSION['firstname'] ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> Last name: </b>
      </div>
      <div class="col-md-10">
        <p><?php echo $_SESSION['lastname'] ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> Email: </b>
      </div>
      <div class="col-md-10">
        <p><?php echo $_SESSION['email'] ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> Phone number: </b>
      </div>
      <div class="col-md-10">
        <p>-</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> Password: </b>
      </div>
      <div class="col-md-10">
        <p>******</p>
      </div>
    </div>

    <!--Button to edit information -->
    <button type="button" class="btn button-orange text-left mt-3" data-toggle="modal" data-target="#editModal">
      Edit details
    </button>
  </div>

  <div class="modal" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Pop-up header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Account Details</h4>
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
        </div>

        <div class="modal-body p-0">
          <div class="container w-90">
            <form class="p-3">
              <div class="form-group">
                <label>Username: </label>
                <input type="text" class="form-control" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required />
              </div>
              <div class="form-group">
                <label>First Name: </label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" placeholder="First Name" required />
              </div>
              <div class="form-group">
                <label>Last Name: </label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" placeholder="Last Name" required />
              </div>
              <div class="form-group">
                <label>Email: </label>
                <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" placeholder="email@gmail.com" required />
              </div>
              <div class="form-group">
                <label>Phone Number: </label>
                <input type="text" class="form-control" placeholder="---" disabled />
              </div>
              <div class="form-group">
                <label>Password: </label>
                <input type="password" class="form-control" placeholder="******" required />
              </div>
              <div class="form-group">
                <label>Confirm Password: </label>
                <input type="password" class="form-control" placeholder="******" required />
              </div>
              <div class="container mt-4 p-0 text-left">
                <button class="btn" type="submit">Save changes</button>
                <button type="button" class="btn" data-dismiss="modal">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<footer>
  <!-- jQuery then Bootstrap JS for pop-ups -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</footer>