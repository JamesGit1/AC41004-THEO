<html lang="en">
<?php 
session_start();
include("header.php");
?>
<title>Home</title>
    <style>
      body {
        background-image: url('https://www.theohealth.com/wp-content/uploads/2021/02/theo-Promo-grid.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
      }
      label {
          font : white;
          color : white;
      }
     h1{
         color : white;
     }
     input[type='file'] {

  
  color : white;
}
    </style>
  </head>
  <body>
  

<h1>Select Sensor Readings</h1>

<h3>Select a file for Sensor 1</h3>
<form  enctype="multipart/form-data" action="FormAction2.php" method="post">
  <label for="file1">Select a file:</label>
  <input type="file1" id="file1" name="file1"><br><br>
  <input type="submit" value="Submit">
</form>



<h3>Select a file for Sensor 2</h3>
<form action="/action_page.php">
  <label for="myfile">Select a file:</label>
  <input type="file2" id="file2" name="file2"><br><br>
  
</form>

<h3>Select a file for Sensor 3</h3>
<form action="action_page.php">
  <label for="myfile">Select a file:</label>
  <input type="file3" id="file3" name="file2"><br><br>
  
</form>

<h3>Select a file for Sensor 4</h3>
<form action="action_page.php">
  <label for="myfile">Select a file:</label>
  <input type="file" id="sensor4" name="sensor4"><br><br>
  <input type="submit" value="Submit">
</form>


</body>
</html>