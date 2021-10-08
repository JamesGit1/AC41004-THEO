<?php
if (isset($_POST['currentclientid'])) {
    $_SESSION['currentclientid'] = $_POST['currentclientid']; // set current client to session varible incase we loose post value on page refresh or redirect
    $userId = $_POST['currentclientid']; // If we're looking for a clients details set the userID to the clients instead of the physios
} else if (isset($_SESSION['currentclientid'])) {
    $userId = $_SESSION['currentclientid'];
}

if (isset($_POST['commentSubmit'])) {
    $query = "INSERT INTO comment (`accountid`, `commentfullname`, `comment`) VALUES (:clientid, :physiofullname, :comment);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":clientid", $userId);
    $stmt->bindParam(":physiofullname", $fullname);
    $stmt->bindParam(":comment", $comment);

    $fullname = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $comment = $_POST['inputComment'];

    $stmt->execute();

    echo '<script language="javascript">';
    echo 'alert("Thanks ' . $_SESSION['firstname'] . ', your comment has submitted")';
    echo '</script>';

    header('Location: ./progress-overview.php');
}
