<?php 
session_start();
include('header.php');
?>

<body class="background">
  <div class="content-box container p-5 mt-5 border">
    <div class="row">
      <div class="container w-90 mt-4 mb-4">
        <h2>My Clients</h2>
      </div>
      <!-- add cards of branches https://getbootstrap.com/docs/4.0/components/card/-->
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <i class="mt-5 fas fa-user fa-7x text-center"></i>
            <div class="card-body">
              <h5 class="card-title">John</h5>
              <p class="card-text">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Perspiciatis, officia delectus. Facere magni officia quae!
                Dolores quo atque illo perspiciatis aut accusantium aperiam
                aliquid ducimus, voluptatibus, dolor officiis fuga in.
              </p>
              <a href="track-progress.php" class="btn button-orange"
                >Track progress</a
              >
              <a href="DELETE"  class="btn button-green" > DELETE</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <i class="mt-5 fas fa-user fa-7x text-center"></i>
            <div class="card-body">
              <h5 class="card-title">Nick</h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima
                neque nihil in distinctio error ad tenetur magni nesciunt fugit!
                Dolorum voluptates architecto sit vero laudantium animi nihil
                rem, non maxime.
              </p>
              <a href="track-progress.php" class="btn button-orange"
                >Track progress</a
              >
              <a href="DELETE"  class="btn button-green" > DELETE</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
          
            <i class="mt-5 fas fa-user fa-7x text-center"></i>
            <div class="card-body">
              <h5 class="card-title">Luke</h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Veniam, sed. Dolorum et repudiandae laborum sed a voluptatibus
                voluptates nemo officia dolores, hic, explicabo libero veritatis
                corporis aspernatur quaerat eveniet id.
              </p>
              <a href="track-progress.php" class="btn button-orange"
                >Track progress</a >
                <a href="DELETE"  class="btn button-green" > DELETE</a>
                
            </div>
          </div>
        </div>
       <!-- NEW CARD FOR ADDING CLIENTS -->
        <div class="col-md-4">
          <div class="card">
            <!-- <i class="mt-5 fas fa-user fa-7x text-center"></i> -->
            <img src= "images/PlusSymbol.jpg" >
            <div class="card-body" >
              <h5 class="card-title"></h5>
               <!--Button to edit information -->
    <button type="button" class="btn button-orange text-left mt-3" data-toggle="modal" data-target="#editModal">
      Add Client
    </button>
  </div>

  <div class="modal" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Pop-up header -->
        <div class="modal-header">
          <h4 class="modal-title">Create New Account</h4>
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
        </div>

        <div class="modal-body p-0">
          <div class="container w-90">
            <form class="p-3">
              <div class="form-group">
                <label>Username: </label>
                <input type="text" name="inputusername" class="form-control" placeholder="Username" value="" required maxlength="45"/>
              </div>
              <div class="form-group">
                <label>First Name: </label>
                <input type="text" name="firstName" class="form-control" value="" placeholder="First Name" required maxlength="45"/>
              </div>
              <div class="form-group">
                <label>Last Name: </label>
                <input type="text" name="lastName" class="form-control" value="" placeholder="Last Name" required maxlength="45"/>
              </div>
              <div class="form-group">
                <label>Email: </label>
                <input type="email" name="email" class="form-control" value="" placeholder="email@gmail.com" required maxlength="45"/>
              </div>
          <!--    <div class="form-group">
                <label>Phone Number: </label>  
                <input type="text" name="phonenumber" class="form-control" placeholder="---" disabled />
              </div>
          -->
              <div class="container mt-4 p-0 text-left">
                <button class="btn" type="submit">Add Client</button>
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</footer>