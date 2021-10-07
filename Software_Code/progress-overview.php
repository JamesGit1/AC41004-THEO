<?php
session_start();
require('php/conn.php');
include('header.php');
?>

<body class="background">
  <div class="content-box container border">
    <div class="d-flex justify-content-between" id="progressOverviewTitle">
      <div>
        <h3>My Details</h3>
      </div>
      <div>
        <a href="current-session.php"><button type="button" class="btn button-orange text-left">
          Start New Session
          <i class="fas fa-running"></i>
        </button></a>
      </div>
    </div>
    <!-- Extra personal details -->
    <div class="border" id="personalInfoBox">
      <div class="row">
        <ul class="list-inline">
          <li class="list-inline-item"> <b> Weight: </b> </li>
          <li class="list-inline-item"> 84 kg </li>
        </ul>
     </div>
     <div class="row">
       <ul class="list-inline">
         <li class="list-inline-item"> <b> Heigth: </b> </li>
         <li class="list-inline-item"> 192 cm </li>
       </ul>
     </div>
     <div class="row">
       <ul class="list-inline">
         <li class="list-inline-item"> <b> Age: </b> </li>
         <li class="list-inline-item"> 23 </li>
       </ul>
     </div>
     <div class="row">
       <ul class="list-inline">
         <li class="list-inline-item"> <b> BMI: </b> </li>
         <!--Calculation fro BMI could be inserted -->
         <li class="list-inline-item"> N/A </li>
       </ul>
     </div>

     <?php if ($_SESSION['role'] == "physiotherapist") {
            } ?>
          <?php if ($_SESSION['role'] == "athlete") {
            echo '<button
            type="button"
            class="btn text-left"
            data-toggle="modal"
            data-target="#editModal"
          >
            Edit details
          </button>';
          } ?>
     <!--Button to edit information -->
     <!-- <button
       type="button"
       class="btn text-left"
       data-toggle="modal"
       data-target="#editModal"
     >
       Edit details
     </button> -->
   </div>

  <div class="container p-0" id="feedbackBox">
    <h3>History of feedback</h3>
  </div>
  <!--if no records have been added yet -->
    <p>The list of records is currently empty.</p>
    <!--if there is at least one record -->
    <div class="table-responsive">
      <table class="table">
        <thead id="feedbackTableHeader">
          <tr>
            <th scope="col">Date</th>
            <th scope="col" class="text-truncate" id="physiotherapist">Physiotherapist</th>
            <th scope="col">Notes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>04/10/21</td>
            <td>Rob</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
          </tr>
          <tr>
            <td>01/10/21</td>
            <td>Rob</td>
            <td>@Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
          </tr>
          <tr>
            <td>28/09/21</td>
            <td>Rob</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
          </tr>
        </tbody>
      </table>
    </div>
</div>

  <div class="modal" id="editModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- Pop-up header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Details</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

        <div class="modal-body p-0">
          <div class="container w-90">
            <form class="p-3">
              <div class="form-group">
                <label>Weight: </label>
                <input
                  type="text"
                  class="form-control"
                  placeholder=""
                  value=""
                  required
                />
              </div>
              <div class="form-group">
                <label>Height: </label>
                <input
                  type="text"
                  class="form-control"
                  value=""
                  placeholder=""
                  required
                />
              </div>
              <div class="form-group">
                <label>Age: </label>
                <input
                  type="text"
                  class="form-control"
                  value=""
                  placeholder=""
                  required
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
