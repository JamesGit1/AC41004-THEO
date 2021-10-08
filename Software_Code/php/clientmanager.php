<?php
$login_err = "";
if (isset($_POST['deleteid'])) {
    $clientToRemove = $_POST['deleteid'];

    $query = "DELETE FROM clients WHERE `clientid` = $clientToRemove;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    unset($stmt);

    $clientusername = $_POST['clientusername'];
    echo '<script language="javascript">';
    echo 'alert("Removed ' . $clientusername . ' from your client list")';
    echo '</script>';
}

if(isset($_POST['addClient'])){
    var_dump($_POST['currentclientid']);
}

if (isset($_POST['inputusername'])) {
    $query = "SELECT * FROM account WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $inputUsername, PDO::PARAM_STR);
    $inputUsername = $_POST['inputusername'];
    $stmt->execute();

    $returnedRow = $stmt->fetch();
    if ($returnedRow !== false) {
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
        }
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Username not found")';
        echo '</script>';
    }
    unset($stmt);
}


// Check list of clients user has
$query = "SELECT * FROM clients WHERE physioid = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":id", $userId, PDO::PARAM_STR);
$userId = $_SESSION['userID'];
$stmt->execute();

if ($stmt->rowCount() > 0) {
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
}
