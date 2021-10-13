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

if (isset($_POST['addClient'])) {

    $query = "INSERT INTO account (`firstname`, `lastname`, `email`, `code`) VALUES (:firstname, :lastname, :email, :code)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":code", $code);

    $firstname = $_POST['inputforename'];
    $lastname = $_POST['inputsurname'];
    $email = $_POST['inputemail'];
    $code = rand(10001, 99999); // Probably should check if number is on database

    $stmt->execute();

    $query = "SELECT `id` FROM account WHERE `code` = :code;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":code", $code);
    $stmt->execute();

    $returnedRow = $stmt->fetch();

    $query = "INSERT INTO clients (`physioid`, `clientid`) VALUES (:physioid, :clientid);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":physioid", $id);
    $stmt->bindParam(":clientid", $returnedRow[0]);
    $id = (int)$_SESSION['userID'];
    $stmt->execute();   

    echo '<script language="javascript">';
    echo 'alert("Client added. Please share the following code with them: ' . $code . '" )';
    echo '</script>';

    // $query = "SELECT * FROM account WHERE username = :username";
    // $stmt = $pdo->prepare($query);
    // $stmt->bindParam(":username", $inputUsername, PDO::PARAM_STR);
    // $inputUsername = $_POST['inputusername'];
    // $stmt->execute();

    // $returnedRow = $stmt->fetch();
    // if ($returnedRow !== false) {
    //     $clientID = (int)$returnedRow[0];

    //     if ($inputUsername == $_SESSION['username']) {
    //         echo '<script language="javascript">';
    //         echo 'alert("Username belongs to physiotherapist; cannot add")';
    //         echo '</script>';
    //     } else {
    //         if (isset($clientID)) {
    //             $query = "SELECT * FROM clients WHERE clientid = :clientID";
    //             $stmt = $pdo->prepare($query);
    //             $stmt->bindParam(":clientID", $clientID);
    //             $stmt->execute();

    //             if ($stmt->rowCount() == 1) {
    //                 echo '<script language="javascript">';
    //                 echo 'alert("Username already assigned physiotherapist")';
    //                 echo '</script>';
    //             } else {
    //                 $query = "INSERT INTO clients (`physioid`, `clientid`) VALUES (:physioid, :clientid);";
    //                 $stmt = $pdo->prepare($query);
    //                 $stmt->bindParam(":physioid", $id);
    //                 $stmt->bindParam(":clientid", $clientID);
    //                 $id = (int)$_SESSION['userID'];
    //                 $stmt->execute();

    //                 $code = rand(10001, 99999);
    //                 $query2 = "UPDATE account SET code = $code WHERE id = 2";
    //                 $stmt2 = $pdo->prepare($query2);
    //                 // $stmt2->bindParam(":code", $code);
    //                 // $stmt2->bindParam(":username", $_SESSION['username'])
    //                 $stmt2->execute();

    //                 echo '<script language="javascript">';
    //                 echo 'alert("Client added. Please share the following code with them: ' . $code . '" )';
    //                 echo '</script>';
    //             }
    //         }
    //     }
    // } else {
    //     echo '<script language="javascript">';
    //     echo 'alert("Username not found")';
    //     echo '</script>';
    // }
    // unset($stmt);
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
