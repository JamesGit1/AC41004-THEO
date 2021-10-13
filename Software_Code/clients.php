<?php
session_start();
include('header.php');
include('php/conn.php');
include('./php/clientmanager.php')
?>

<body class="background">
  <div class="content-box container border">
    <h3>My Clients</h3>
    <div class="container d-flex justify-content-center">
      <div class="row card-deck">
        <?php
        if (isset($returnedRows)) {
          foreach ($returnedRows as $row) {
            echo '<div class="col">
            <div class="card p-2 mt-2">
              <i class="fas fa-user fa-7x text-center mt-3"></i>
              <div class="card-body">
                <h5 class="card-title">' . $row['firstname'] . '</h5>
                <p class="card-text">
                ' . $row['email'] . '
                </p>';
                if(isset($row['username'])){
                  echo '<form method="post" action="progress-overview.php" style="display: inline;">
                          <input type="hidden" name="currentclientid" value="' . $row['id'] . '"/>
                          <button class="btn button-orange" name="addClient" type="submit" >View Progress</button>
                        </form>';
                }
                else{
                  echo '<p>Awaiting Account Setup...</p>'; 
                  echo '<p>Setup Code: <b>'.$row['code'].'</b></p>';
                }
                echo '
                <button class="btn" data-toggle="modal" data-target="#deleteClientModal' . $row['id'] . '">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>
          </div>';

            echo '<!-- Delete client modal -->
          <div class="modal" id="deleteClientModal' . $row['id'] . '">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <!-- Pop-up header -->
                <div class="modal-header">
                  <h4 class="modal-title">Delete Client</h4>
                  <button type="button" class="modal-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                </div>

                <div class="modal-body">
                    <form class="p-3" method="post">
                      <div class="form-group">
                        <p> <b>Client "' . $row['firstname'] . ' ' . $row['lastname'] . '" will be deleted from your client list.</b> <br> Would you like to proceed? </p>
                      </div>
                      <div class="modal-footer">
                      <input type="hidden" name="clientusername" value="' . $row['username'] . '"/>
                      <input type="hidden" name="deleteid" value="' . $row['id'] . '"/>
                      <button class="btn button-orange" name="delete" type="submit" name="addClient">Yes</button>
                      <button type="button" class="btn" data-dismiss="modal">No</button>
                    </div>
                    </form>
                  </div>

              </div>
            </div>
          </div>';
          }
        }
        ?>
        <!-- NEW CARD FOR ADDING CLIENTS -->
        <div class="col">
          <div class="card p-2 mt-2">
            <i class="fas fa-user-plus fa-7x text-center mt-3"></i>
            <div class="card-body d-flex justify-content-center">
              <!--Button to edit information -->
              <button type="button" class="btn button-orange text-center" data-toggle="modal" data-target="#addClient">
                Add Client
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Add client modal -->
    <div class="modal" id="addClient">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- Pop-up header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Client</h4>
            <button type="button" class="modal-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
          </div>

          <div class="modal-body p-0">
            <div class="container w-90">
              <form class="p-3" method="post">
                <div class="form-group">
                  <label>First Name: </label>
                  <input type="text" name="inputforename" class="form-control" value="" required maxlength="45" placeholder="Firstname..."/>
                </div>
                <div class="form-group">
                  <label>Last Name: </label>
                  <input type="text" name="inputsurname" class="form-control" value="" required maxlength="45" placeholder="Lastname...">
                </div>
                <div class="form-group">
                  <label>E-Mail: </label>
                  <input type="email" name="inputemail" class="form-control" value="" required maxlength="200" placeholder="email@example.com...">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                  <button class="btn button-orange" type="submit" name="addClient">Add Client</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>