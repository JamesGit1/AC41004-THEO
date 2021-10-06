<!DOCTYPE html>
<html lang="en">

<head>
<title>Information & Technology</title>
</head>

<?php
# Access session.
session_start() ;

# Redirect if not logged in.
//if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
//$page_title = 'User Account' ;

//include('includes/head_store.php');

# Open database connection.
require ( 'php/conn.php' ) ;

# Retrieve items from 'shop products' database table.
$q = "SELECT * FROM `21ac4d09`.`testathlete` " ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
  # Display body section.
  echo '<table><tr>
		<div class="container">
	    <div class="row">';
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
	echo '
	
	  <div class="col-lg-4 col-md-6 mb-4">
	   <div class="card h-100">
	    <a href="#"><img class="card-img-top" src='. $row['username'].'></a>
	     <div class="card-body">
  <h4 class="card-title"><a href="item.php?id='.$row['username'].'">'. $row['username'] . '</a></h4>
	      <h5>&pound'. $row['item_price'] . '</h5>
	      <p class="card-text">'. $row['username'] . '</p>
	     </div>
          <div class="card-footer text-center"">
		   <strong><a href="added.php?id='.$row['username'].'">Add To Cart</a></strong></td>
		  </div>
	   </div>
	  </div>
		 ';
  }
  echo '</div>
	    </div>';
  # Close database connection.
  mysqli_close( $link ) ; 
}
# Or display message.
else { echo '<p>There are currently no items in this shop.</p>' ; }

?>
</div>
<!DOCTYPE html>
<html lang="en">

  <!-- Start your project here-->
  <!-- Material form login -->
<body>

  <!-- Footer -->
  <?php
  include('includes/footer.php');
  ?>
  
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>