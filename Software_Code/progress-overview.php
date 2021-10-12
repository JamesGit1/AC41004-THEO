<?php
session_start();
require('php/conn.php');
include('header.php');
include('./php/progressmanager.php');
?>

<body class="background">
  <div class="content-box container border">
    <div class="d-flex justify-content-between" id="progressOverviewTitle">
      <?php if ($_SESSION['role'] == "physiotherapist") {
        echo '<div>
                  <h3> Client Details - ' . $userdetails["firstname"] . ' ' . $userdetails["lastname"] . ' </h3>
                </div>
                <div>
                  <form method="post" action="current-session.php">
                    <input type="hidden" name="currentclientid" value="' . $userId . '"/>
                    <button class="btn button-orange" name="addClient" type="submit" >Track Client
                    <i class="fas fa-chart-line"></i>
                    </button>
                  </form>
                ';
      } ?>
      <?php if ($_SESSION['role'] == "athlete") {
        echo '<div>
                  <h3> My Details - ' . $userdetails["firstname"] . ' ' . $userdetails["lastname"] . ' </h3>
                </div>
                <div>
                  <a href="current-session.php">
                  <button type="button" class="btn button-orange text-left">
                    Start New Session
                    <i class="fas fa-running"></i>
                  </button>
                </a>';
      } ?>
    </div>
  </div>
  <!-- Extra personal details -->
  <div class="border" id="personalInfoBox">
    <div class="row">
      <ul class="list-inline">
        <li class="list-inline-item"> <b> Weight: </b> </li>
        <li class="list-inline-item"> <?php
                                      if (isset($userdetails['weight'])) {
                                        echo $userdetails['weight'] . " kg";
                                      } else {
                                        echo "Provide detail...";
                                      }
                                      ?> </li>
      </ul>
    </div>
    <div class="row">
      <ul class="list-inline">
        <li class="list-inline-item"> <b> Heigth: </b> </li>
        <li class="list-inline-item"> <?php
                                      if (isset($userdetails['height'])) {
                                        echo $userdetails['height'] . " cm";
                                      } else {
                                        echo "Provide detail...";
                                      }
                                      ?> </li>
      </ul>
    </div>
    <div class="row">
      <ul class="list-inline">
        <li class="list-inline-item"> <b> Age: </b> </li>
        <li class="list-inline-item"> <?php
                                      if (isset($userdetails['age'])) {
                                        echo $userdetails['age'];
                                      } else {
                                        echo "Provide detail...";
                                      }
                                      ?> </li>
      </ul>
    </div>
    <div class="row">
      <ul class="list-inline">
        <li class="list-inline-item"> <b> BMI: </b> </li>
        <!--Calculation fro BMI could be inserted -->
        <li class="list-inline-item"> <?php
                                      if (isset($userdetails['weight']) && isset($userdetails['height'])) {
                                        $bmi = round(($userdetails['weight'] / $userdetails['height'] / $userdetails['height']) * 10000, 2);
                                        echo $bmi;
                                      } else {
                                        echo "Provide details...";
                                      }
                                      ?> </li>
      </ul>
    </div>
    <!--Button to edit information -->
    <?php if ($_SESSION['role'] == "physiotherapist") {
    } ?>
    <?php if ($_SESSION['role'] == "athlete") {
      echo '<button
            type="button"
            class="btn text-left"
            data-toggle="modal"
            data-target="#editModal"
          >
            Edit Details <i class="fas fa-user-edit"></i>
          </button>';
    } ?>
  </div>

  <div class="container p-0" id="feedbackBox">
    <h3>History of feedback</h3>
  </div>
  <a href="review-session.php"><button class="btn mb-3" name="reviewSession" type="submit">Review latest session <i class="fas fa-history"></i> </button> </a>

  <!--if no records have been added yet -->
  <?php if (!$returnedRows) echo "<p>No comments on record.</p>";
  else { ?>
    <!--if there is at least one record -->
    <div class="table-responsive">
      <table class="table table-hover">
        <thead id="feedbackTableHeader">
          <tr>
            <th scope="col">Date</th>
            <th scope="col" class="text-truncate" id="physiotherapist">Physiotherapist</th>
            <th scope="col">Comments</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($returnedRows as $key => $currentRow) {
            $date = substr($currentRow['date'], 0, strpos($currentRow['date'], " "));
            echo "<tr>
                    <td>" . $date . "</td>
                    <td>" . $currentRow['commentfullname'] . "</td>
                    <td>" . $currentRow['comment'] . "</td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    <?php } ?>
    </div>
    </div>

    <div class="modal" id="editModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- Pop-up header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Details</h4>
            <button type="button" class="modal-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
          </div>

          <div class="modal-body">
            <div class="container w-90">
              <form class="p-3" method="post">
                <div class="form-group">
                  <label><b>Weight (kg):</b></label>
                  <input type="text" class="form-control" value="<?php if (isset($userdetails['weight'])) echo $userdetails['weight']; ?>" name="inputWeight" required maxlength="3" />
                </div>
                <div class="form-group">
                  <label><b>Height (cm):</b></label>
                  <input type="text" class="form-control" value="<?php if (isset($userdetails['height'])) echo $userdetails['height']; ?>" name="inputHeight" required maxlength="3" />
                </div>
                <div class="form-group">
                  <label><b>Age (years):</b></label>
                  <input type="text" class="form-control" value="<?php if (isset($userdetails['age'])) echo $userdetails['age']; ?>" name="inputAge" required maxlength="3" />
                </div>
                <div class="modal-footer mt-3">
                  <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                  <button class="btn button-orange" type="submit" name="updatePersonal">Save changes</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
</body>
<footer>