<?php
// hämtar data från $_POST och skydda XSS

if(isset($_REQUEST['usr']) || isset($_SESSION['user'])) {
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    }
    else{
        $username = test_input($_REQUEST['usr']);
    }


print("Du försöker se på " .$username . " annons/profil<br><br>");
$conn = create_conn();

//Prepared statement
$sql = "SELECT * FROM users WHERE username = '". $username."'";
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        ?>

<form action="profile.php" method="get">
    Användarnamn:
    <input type="text" name="usr" value="<?php print($row['username']); ?>" required><br>
    Riktigt Namn:
    <input type="text" name="realname" value="<?php print($row['realname']); ?>" required><br>
    Lösenord:
    <input type="text" name="psw" value="<?php print($row['password']); ?>" required><br>
    Email:
    <input type="text" name="email" value="<?php print($row['email']); ?>" required><br>
    zipcode:
    <input type="text" name="zip" value="<?php print($row['zipcode']); ?>" required><br>
    bio:
    <input type="text" name="bio" value="<?php print($row['bio']); ?>" required><br>
    salary:
    <input type="text" name="salary" value="<?php print($row['salary']); ?>" required><br>
    preference:
    
    <input type="number" name="pref" value="<?php print($row['preference']); ?>" required><br>

    <input type="submit" name="save" value="Spara ändringar">
</form>

<?php

$username = test_input($_REQUEST['usr']);
$psw = test_input($_REQUEST['psw']);
$pswhash = password_hash($psw, PASSWORD_DEFAULT);
$realname = test_input($_REQUEST['realname']);
$email = test_input($_REQUEST['email']);
$zip = test_input($_REQUEST['zip']);
$bio = test_input($_REQUEST['bio']);
$salary = test_input($_REQUEST['salary']);
$preference = test_input($_REQUEST['pref']);
    
    if(isset($_REQUEST['save'])){
        $stmt = $conn->prepare("UPDATE users SET username = '$username', realname ='$realname', password='$pswhash', email ='$email', zipcode='$zip', bio='$bio', salary='$salary', preference='$preference' WHERE username = ?");
        $stmt->bind_param("s", $username);
        if ( $stmt->execute() ) {
            print("Användarinofrmationen har nu uppdaterats");
            header("location: profile.php");
        }
        else {  
            print("raderingen lyckades inte");
            }

    }


            if(isset($_REQUEST['usr']) && isset($_REQUEST['remove'])){
                print("<p>Om du vill ta bort annonsen, bekräfta med ditt lösenord lösenord<br>");
                ?>
<form action='profile.php' method="get">
    Lösenord: <input type="password" name="pswd">
    <input type="hidden" name='usr' value="<?php print($username);?>">
    <input type="hidden" name="confirm" value="yes">
    <input type="submit" value="Ta bort!">
</form>
<?php

                $pswd = testinput($_REQUEST['pswd']);
                $pswdhash = password_hash($pswd, PASSWORD_DEFAULT);

                print("<br>" .$pswd);
                print("<br>" .$pswdhash);

            }

            $lösen = test_input($_REQUEST['pswd']);
            $password = $row['password'];
            if(isset($_REQUEST['confirm']) ){
                
                if(password_verify($lösen, $password)){
                    print("removeing user");
                    $username = test_input($_REQUEST['usr']);
                    $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
                    $stmt->bind_param("s", $username);
                    if ( $stmt->execute() ) {
                        print("Användaren har nu tagits bort");
                        header("Refresh:1");
                    }
                    else {  
                        print("raderingen lyckades inte");
                        }
                   
                 }

                 else{
                   print("fel anv eller lös");
                 }

                }

            
            //om användaren bara vill se på sin profil
            else{
               print("<br>")
               ?>
<a href="profile.php?usr=<?php print($row['username']); ?>&remove=yes">Ta bort profil</a>
<?php
            }
        }
}

    else {
    print("Ingen användardata hittad");
    }

    }

else{
print("Logga in för att se din profil");
}

// hämta användarens data