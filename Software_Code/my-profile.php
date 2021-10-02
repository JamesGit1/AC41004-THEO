<?php include 'header.php';?>

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
        <p>Example username</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> First name: </b>
      </div>
      <div class="col-md-10">
        <p>Example name</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> Last name: </b>
      </div>
      <div class="col-md-10">
        <p>Example surname</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <b> Email: </b>
      </div>
      <div class="col-md-10">
        <p>Example email</p>
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
    <button
      type="button"
      class="btn button-orange text-left mt-3"
      data-toggle="modal"
      data-target="#editModal"
    >
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
                <input
                  type="text"
                  class="form-control"
                  id="#"
                  placeholder="Username"
                />
              </div>
              <div class="form-group">
                <label>First Name: </label>
                <input
                  type="text"
                  class="form-control"
                  id="#"
                  placeholder="First Name"
                />
              </div>
              <div class="form-group">
                <label>Last Name: </label>
                <input
                  type="text"
                  class="form-control"
                  id="#"
                  placeholder="Last Name"
                />
              </div>
              <div class="form-group">
                <label>Email: </label>
                <input
                  type="email"
                  class="form-control"
                  id="#"
                  placeholder="email@gmail.com"
                />
              </div>
              <div class="form-group">
                <label>Phone Number: </label>
                <input type="text" class="form-control" id="#" placeholder="" />
              </div>
              <div class="form-group">
                <label>Password: </label>
                <input
                  type="password"
                  class="form-control"
                  id="#"
                  placeholder=""
                />
              </div>
              <div class="form-group">
                <label>Confirm Password: </label>
                <input
                  type="password"
                  class="form-control"
                  id="#"
                  placeholder=""
                />
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
  <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"
  ></script>
  <script src="js/script.js"></script>
</footer>
