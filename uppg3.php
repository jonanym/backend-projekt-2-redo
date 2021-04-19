<?php
print("Uppgift 3 i Projekt 2");

$conn = create_conn();
$sql = "SELECT * FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        print("<p>Användare : " .$row['realname']);
        print("<br><a href=profile.php?usr=" .$row['username']. ">Visa Profil</a></p>");
    }
}

else {
    print("Ingen användardata hittad");
}

//header('Refresh:0; url=index.php');