<?php
// Get id of user for session
$userId = $_SESSION['userID'];

// If we updating details
if(isset($_POST['updatePersonal'])){
    $query = "UPDATE account SET `weight` = :weight, `height` = :height, `age` = :age WHERE `id` = $userId;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":weight", $weight);
    $stmt->bindParam(":height", $height);
    $stmt->bindParam(":age", $age);

    $weight = $_POST['inputWeight'];
    $height = $_POST['inputHeight'];
    $age = $_POST['inputAge'];

    $stmt->execute();

    echo '<script language="javascript">';
    echo 'alert("Details updated :)")';
    echo '</script>';
}

if(isset($_POST['currentclientid'])){
    $_SESSION['currentclientid'] = $_POST['currentclientid']; // set current client to session varible incase we loose post value on page refresh or redirect
    $userId = $_POST['currentclientid']; // If we're looking for a clients details set the userID to the clients instead of the physios
}
else if(isset($_SESSION['currentclientid'])){
    $userId = $_SESSION['currentclientid'];
}

// Get details of this user
$query = "SELECT * FROM account WHERE id = $userId";
$stmt = $pdo->prepare($query);
$stmt->execute();

$userdetails = $stmt->fetch();

// Get all details on comments from table
$query = "SELECT * FROM comment WHERE accountid = $userId";
$stmt = $pdo->prepare($query);
$stmt->execute();       

if ($stmt->rowCount() > 0) {
    $returnedRows = $stmt->fetchAll();
}
else{
    $returnedRows = false;
}
?>