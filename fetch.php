<?php

if (isset($_REQUEST['salary'])) {
   
    // koppla oss till databasen
    $conn = create_conn();
    // Skapa SQL kommando
    $sql = "SELECT * FROM users ORDER BY users.salary DESC";
    fetchAndWrite($sql);
    // Kör sql kommando
    $result = $conn->query($sql);

}

else if (!isset($_REQUEST['salary'])) {

    // koppla oss till databasen
    $conn = create_conn();
    // Skapa SQL kommando
    $sql = "SELECT * FROM users";
    fetchAndWrite($sql);

}


function fetchAndWrite($sql) {

    // Kopplar till databasen
    $conn = create_conn();

    if ($result = $conn->query($sql)) {
        //skapa en while loop för att hämta varje rad
        while ($row = $result->fetch_assoc()) {
            $prefArr = array('Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla');
            $prefGet = $row['preference'];
            //skriv ut endast ett värde (en kolumn en rad -- en cell)
            print("<p class='ad'>");
            print("Användare i databasen: " . $row['realname'] . "<br>");
            print("Personens lön: " . $row['salary'] . "<br>");
            $prefArr = ['Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla'];
            print("Preferens: " . $prefArr[$prefGet] . "<br>");
            print("<a href='./profile.php?user=".$row['username']."'>Kommentera!</a></p>");
        }

    } else {
        print("något gick fel, senaste felet:" . $conn->error);
    }

}
