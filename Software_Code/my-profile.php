<?php
session_start();
require('php/conn.php');
include('header.php');
include('./php/updateDetails.php');
?>

<body class="background">
  <div class="content-box container border">
    <div class="container w-90 mb-4 p-0">
      <h3>My Profile</h3>
    </div>
    <!-- Account details -->
    <table class="table table-hover" id="myProfileTable">
      <thead id="myProfileTableHeader">
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
        <td scope="col"> First Name</td>
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
      <!-- <tr>
        <td scope="col"> Phone number</td>
        <td scope="col"> --- </td>
      </tr> -->
      <tr>
        <td scope="col"> Password</td>
        <td scope="col"> ******</td>
      </tr>
    </table>

    <!--Button to edit information -->
    <button type="button" class="btn button-orange text-left mt-3" data-toggle="modal" data-target="#editModal">
      Edit Details <i class="fas fa-user-edit"></i>
    </button>
  </div>

  <div class="modal" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Pop-up header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Account Details</h4>
          <button type="reset" class="modal-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
        </div>

        <div class="modal-body p-0">
          <div class="container w-90">
            <form class="p-3" method="post">
              <div class="form-group">
                <label for="editUsernameInput">* Username: </label>
                <input type="text" name="inputusername" id="editUsernameInput" class="form-control" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" required />
              </div>
              <div class="form-group">
                <label for="editFirstNameInput">* First Name: </label>
                <input type="text" name="inputfirstname" id="editFirstNameInput" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" placeholder="First Name" required />
              </div>
              <div class="form-group">
                <label for="editLastNameInput">* Last Name: </label>
                <input type="text" name="inputlastname" id="editLastNameInput" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" placeholder="Last Name" required />
              </div>
              <div class="form-group">
                <label for="editEmailInput">* Email: </label>
                <input type="email" name="inputemail" id="editEmailInput" class="form-control" value="<?php echo $_SESSION['email']; ?>" placeholder="email@gmail.com" required />
              </div>
              <!-- <div class="form-group">
                <label>Phone Number: </label>
                <input type="text" name="inputphone" class="form-control" placeholder="---" disabled />
              </div> -->
              <div class="form-group mt-3">
                <label for="editNewPasswordInput">New Password: </label>
                <input type="password" name="inputpassword1" id="editNewPasswordInput" class="form-control" placeholder="******"/>
              </div>
              <div class="form-group">
                <label for="editConfirmPasswordInput">Confirm Password: </label>
                <input type="password" name="inputpassword2" id="editConfirmPasswordInput" class="form-control" placeholder="******"/>
                <small class="form-text text-muted"> * required fields</small>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                <button class="btn button-orange" type="submit" name="updateDetails">Save changes</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
