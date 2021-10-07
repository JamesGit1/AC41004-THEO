<?php
session_start();
require('php/conn.php');
include('header.php');
include('./php/updateDetails.php');
?>

<body class="background">
  <div class="content-box container w-90 mt-5 p-5 border">
    <div class="container w-90 mb-4 p-0">
      <h2>My Profile</h2>
    </div>
    <!-- Account details -->
    <table class="table">
      <thead id="feedbackTableHeader">
        <tr>
          <th scope="col">Detail</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <tr>
        <td scope="col"> Username</td>
        <td scope="col"> <?php echo $_SESSION['username'] ?></td>
      </tr>
      <tr>
        <td scope="col"> First Name:</td>
        <td scope="col"> <?php echo $_SESSION['firstname'] ?></td>
      </tr>
      <tr>
        <td scope="col"> Last Name</td>
        <td scope="col"> <?php echo $_SESSION['lastname'] ?></td>
      </tr>
      <tr>
        <td scope="col"> Email</td>
        <td scope="col"> <?php echo $_SESSION['email'] ?></td>
      </tr>
      <tr>
        <td scope="col"> Phone</td>
        <td scope="col"> --- </td>
      </tr>
      <tr>
        <td scope="col"> Password</td>
        <td scope="col"> ******</td>
      </tr>
    </table>

    <!--Button to edit information -->
    <button type="button" class="btn button-orange text-left mt-3" data-toggle="modal" data-target="#editModal">
      Edit details <i class="fas fa-user-edit"></i>
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
            <form class="p-3" method="post">
              <div class="form-group">
                <label>Username: </label>
                <input type="text" name="inputusername" class="form-control" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required />
              </div>
              <div class="form-group">
                <label>First Name: </label>
                <input type="text" name="inputfirstname" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" placeholder="First Name" required />
              </div>
              <div class="form-group">
                <label>Last Name: </label>
                <input type="text" name="inputlastname" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" placeholder="Last Name" required />
              </div>
              <div class="form-group">
                <label>Email: </label>
                <input type="email" name="inputemail" class="form-control" value="<?php echo $_SESSION['email']; ?>" placeholder="email@gmail.com" required />
              </div>
              <div class="form-group">
                <label>Phone Number: </label>
                <input type="text" name="inputphone" class="form-control" placeholder="---" disabled />
              </div>
              <div class="form-group">
                <label>New Password: </label>
                <input type="password" name="inputpassword1" class="form-control" placeholder="******" required />
              </div>
              <div class="form-group">
                <label>Confirm Password: </label>
                <input type="password" name="inputpassword2" class="form-control" placeholder="******" required />
              </div>
              <div class="container mt-4 p-0 text-left">
                <button class="btn" type="submit" name="updateDetails">Save changes</button>
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