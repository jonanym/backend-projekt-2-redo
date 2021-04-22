Logga in:<br>

<form action="index.php" method="get">
Användarnamn:<input type="text" name="usr"><br>
Lösenord<input type="password" name="lösen"><br>
<input type="submit" name ="login" value="Logga in">
</form>



<?php

$username = test_input($_REQUEST['usr']);
$lösen = test_input($_REQUEST['lösen']);


$conn = create_conn();

//Prepared statement
$sql = "SELECT * FROM users WHERE username = '". $username."'";
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $password = $row['password'];
        $användare = $row['username'];
        $pswhash = password_hash($lösen, PASSWORD_DEFAULT);
    } 

 if(isset($_REQUEST['usr']) && isset($_REQUEST['lösen'])){

    if(password_verify($lösen, $password)){
       print("Du du har loggats in");
      $_SESSION['user'] = $username;
      header('Location: ./index.php');
    }
    else{
      print("fel anv eller lös");
    }

    }

}

    else {
    print("Ingen användardata hittad");
    }