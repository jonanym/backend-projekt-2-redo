Registrera dig här:<br>
<form action="index.php" method="post">
Användarnamn:<input type="text" name="usr"><br>
Lösenord<input type="password" name="psw"><br>
Riktigt Namn:<input type="text" name="fullname"><br>
<input type="submit" value="Registrera dig">
</form>


<?php

$usr = test_input($request['usr']);
$psw = test_input($request['psw']);
$fullname = test_input($request['fullname']);
print("Du försöker registrera dig som: " . $fullname);

$conn = create_conn();
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$sql = ("INSERT INTO users (realname, email) VALUES (?, ?)");
$statement->bind_param("ss", $username, $email);




