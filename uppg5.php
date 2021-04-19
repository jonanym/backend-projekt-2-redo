<?php
// hämtar data från $_POST och skydda XSS

if(isset($_REQUEST['usr'])) {
$username = test_input($_REQUEST['usr']);
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

<form action="index.php" method="get">
Användarnamn:
<input type="text" name="usr" value="<?php print($row['username']); ?>" required><br>
Riktigt Namn:
<input type="text" name="realname" value="<?php print($row['realname']); ?>" required><br>
Lösenord:
<input type="password" name="psw" value="<?php print($row['password']); ?>" required><br>
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

<input type="submit" name="submit"  value="Spara ändringar">
</form>

<?php
    


            if(isset($_REQUEST['usr']) && isset($_REQUEST['remove'])){
                print("<p>Du försöker ta bort din annons, skriv in ditt lösenord<br>");
                ?>
                <form action='profile.php' method="get">
                    Lösenord: <input type="password" name="psw">
                    <input type="hidden" name='user' value="<?php print($username);?>">
                    <input type="hidden" name="confirm" value="yes">
                    <input type="submit" value="Ta bort!">
                </form>
                <?php
            }

            elseif (isset($_REQUEST['confirm'])){
                print("removeing user");
            }
            //om användaren bara vill se på sin profil
            else{
                print("<p>Användare : " .$row['realname'] . "</p>");
               ?> 
               <a href ="profile.php?usr=<?php print($row['username']); ?>&remove=yes">Ta bort profil</a>
               <?php
            }
        }
}

    else {
    print("Ingen användardata hittad");
    }

    }

else{
print("Error: Missing \$_GET data");
}

// hämta användarens data