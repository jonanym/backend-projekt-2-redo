Registrera dig här:<br>
<form action="index.php" method="get">
Användarnamn:<input type="text" name="usr" required><br>
Riktigt Namn:<input type="text" name="realname" required><br>
Lösenord<input type="password" name="psw" required><br>
Email:<input type="text" name="email" required><br>
zipcode:<input type="text" name="zip" required><br>
bio:<input type="text" name="bio" required><br>
salary:<input type="text" name="salary" required><br>
preference:<input type="number" name="pref" required><br>

<input type="submit" name="submit" value="Registrera dig">
</form>


<?php

if (isset($_REQUEST['submit']))
$username = test_input($_REQUEST['usr']);
$psw = test_input($_REQUEST['psw']);
$pswhash = password_hash($psw, PASSWORD_DEFAULT);
$realname = test_input($_REQUEST['realname']);
$email = test_input($_REQUEST['email']);
$zip = test_input($_REQUEST['zip']);
$bio = test_input($_REQUEST['bio']);
$salary = test_input($_REQUEST['salary']);
$preference = test_input($_REQUEST['pref']);

if (isset($_REQUEST['usr']) && isset($_REQUEST['psw'])) {
    print("Du försöker registrera dig som: " . $realname);

    $conn = create_conn();
    $stmt = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssisii", $username, $realname, $pswhash, $email, $zip, $bio, $salary, $preference);

    if ( $stmt->execute() ) {
        $_SESSION['user'] = $username;
        echo("Du har registrerats!");
        header('Refresh:1; url=https://cgi.arcada.fi/~nymajona/backend/backend-projekt-2-redo/profile.php?usr='.$username);
        //print("\ndu har registrerats!");
        //header('Refresh:2; url=index.php');
        //header('Location: index.php');
    }
    else {  
        print("Regirstreringen lyckades inte!");
        }
}

else{
    print("Du försöker registrera dig");
}



?>