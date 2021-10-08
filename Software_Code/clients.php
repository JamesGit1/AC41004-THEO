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
                </p>
                <form method="post" action="progress-overview.php" style="display: inline;">
                  <input type="hidden" name="currentclientid" value="' . $row['id'] . '"/>
                  <button class="btn button-orange" name="addClient" type="submit" >Track progress</button>
                </form>

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
                  <button type="button" class="close" data-dismiss="modal">
                    &times;
                  </button>
                </div>
  
                <div class="modal-body p-0">
                  <div class="container w-90">
                    <form class="p-3" method="post">
                      <div class="form-group">
                        <p> <b>Client "' . $row['firstname'] . ' ' . $row['lastname'] . '" will be deleted from your client list.</b> <br> Would you like to proceed? </p>
                      </div>
                      <div class="container mt-4 p-0 text-left">
                        <input type="hidden" name="clientusername" value="' . $row['username'] . '"/>
                        <input type="hidden" name="deleteid" value="' . $row['id'] . '"/>
                        <button class="btn" name="delete" type="submit" name="addClient">Yes</button>
                        <button type="button" class="btn" data-dismiss="modal">No</button>
                      </div>
                    </form>
                  </div>
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
              <button type="button" class="btn button-orange text-center" data-toggle="modal" data-target="#editModal">
                Add Client
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Add client modal -->
    <div class="modal" id="editModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- Pop-up header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Client</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <div class="modal-body p-0">
            <div class="container w-90">
              <form class="p-3" method="post">
                <div class="form-group">
                  <label>Username: </label>
                  <input type="text" name="inputusername" class="form-control" placeholder="Username" value="" required maxlength="45" />
                </div>
                <div class="container mt-4 p-0 text-left">
                  <button class="btn" type="submit" name="addClient">Add Client</button>
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
  </div>
</body>
<footer>
  <!-- jQuery then Bootstrap JS for pop-ups -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
  <script src="js/script.js"></script>
</footer>