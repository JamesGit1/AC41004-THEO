<?php
if(isset($_POST["updateDetails"])){
    if($_POST["inputpassword1"] == $_POST["inputpassword2"]){
        $query = "UPDATE account SET `username` = :username, `password` = :password, `firstname` = :firstname, `lastname` = :lastname, `email` = :email WHERE `id` = :userID;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $inputusername);
        $stmt->bindParam(":password", $inputpassword);
        $stmt->bindParam(":firstname", $inputfirstname);
        $stmt->bindParam(":lastname", $inputlastname);
        $stmt->bindParam(":email", $inputemail);
        $stmt->bindParam(":userID", $userID);
    
        // Get all necessary info
        $inputusername = $_POST['inputusername'];
        $inputpassword = hash('sha256', $_POST['inputpassword1']);
        $inputfirstname = $_POST['inputfirstname'];
        $inputlastname = $_POST['inputlastname'];
        $inputemail = $_POST['inputemail'];
        $userID = $_SESSION['userID'];
    
        $stmt->execute();
    
        echo '<script language="javascript">';
        echo 'alert("Details updated :)")';
        echo '</script>';

        //Update session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $inputusername;
        $_SESSION['firstname'] = $inputfirstname;
        $_SESSION['lastname'] = $inputlastname;
        $_SESSION['email'] = $inputemail;
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Passwords must match please re-enter")';
        echo '</script>';
    }
}
?>