<div class="container">
Registrera dig här:<br>
<form class="reqform" action="index.php" method="get">
<ul class="registerlist">
            <br>
                <li><label>Användarnamn</label><br><input type="text" name="usr"/></li>
                <li><label>Namn</label><br><input type="text" name="realname"/></li><br>
                <li><label>Lösenord</label><br><input type="text" name="psw"/></li>
                <li><label>Repetera lösenordet</label><br><input type="text" name="pwrepeat"/></li><br>
                <li><label>Email</label><br><input type="text" name="email"/></li>
                <li><label>Postnummer</label><br><input type="text" name="zip"/></li><br>
                <label>Bio</label><br>
                <textarea name="bio" rows="5" cols="40" name=bio></textarea><br>
                <li><label>Årslön</label> <input type="text" name="salary"/></li><br>
                <li><label>Preferens</label><br>
                <input type="radio" name="preference" value="1" id="male"/><label for="male" class="butlabel">Man</label><br>
                <input type="radio" name="preference" value="2" id="female"/><label for="female" class="butlabel">Kvinna</label><br>
                <input type="radio" name="preference" value="3" id="other"/><label for="other" class="butlabel">Annan</label><br>
                <input type="radio" name="preference" value="4" id="bothof"/><label for="bothof" class="butlabel">Båda</label><br>
                <input type="radio" name="preference" value="5" id="allof"/><label for="allof" class="butlabel">Alla</label></li><br><br>
                <input type="submit" name="submit" value="Slutför registreringen" id="registerbutton"><br>
            </ul>

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
$preference = test_input($_REQUEST['preference']);

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
    print("");
}



?>