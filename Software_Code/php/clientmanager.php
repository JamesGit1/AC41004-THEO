<?php
$login_err = "";

if (isset($_POST['addClient'])) {
    $query = "SELECT * FROM account WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $inputUsername, PDO::PARAM_STR);
    $inputUsername = $_POST['inputusername'];
    $stmt->execute();

    $returnedRow = $stmt->fetch();
    $clientID = (int)$returnedRow[0];

    if (isset($clientID)) {
        $query = "SELECT * FROM clients WHERE clientid = :clientID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":clientID", $clientID);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            echo '<script language="javascript">';
            echo 'alert("Username already assigned physiotherapist")';
            echo '</script>';
        } else {
            $query = "INSERT INTO clients (`physioid`, `clientid`) VALUES (:physioid, :clientid);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":physioid", $id);
            $stmt->bindParam(":clientid", $clientID);
            $id = (int)$_SESSION['userID'];
            $stmt->execute();
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Username not found")';
        echo '</script>';
    }
    unset($stmt);
}


// Logs in and checks user details to log in
$query = "SELECT * FROM clients WHERE physioid = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":id", $userId, PDO::PARAM_STR);
$userId = $_SESSION['userID'];
$stmt->execute();

$returnedRows = $stmt->fetchAll();

$query = "SELECT * FROM account WHERE";
$i = 0;

foreach ($returnedRows as $row) {
    if ($i == 0) {
        $query .= " id = " . $row[2];
    } else {
        $query .= " OR id = " . $row[2];
    }
    $i++;
}

$stmt = $pdo->prepare($query);
$stmt->execute();

$returnedRows = $stmt->fetchAll();
