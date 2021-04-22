<?php include "header.php" ?>


<?php

$username = test_input($_REQUEST['usr']);

$conn = create_conn();

//Prepared statement
$sql = "SELECT * FROM users WHERE username = '". $username."'";
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

?>

<article>
    
    <?php
    if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){

        print("<p>Användarnamn: " .$row['username']);
        print("<p>Riktigt namn: " .$row['realname']);
        print("<p>Postnummer : " .$row['zipcode']);
        print("<p>Profil BIO : " .$row['bio']);
        print("<p>Preferens : " .$row['preference']);

    }

}
    
    
    ?>
</article>




<?php include "footer.php" ?>