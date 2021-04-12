<?php
print("Uppgift 1 i projekt 2 - great success!");

$conn = create_conn();
$sql = "SELECT * FROM users";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

print("<br>Användare 1: " . $row['realname'] );
print("<br>Användarnamn: " . $row['username'] );