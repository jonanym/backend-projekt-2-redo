<?php

if(isset($_REQUEST['stage'])){
    $conn = create_conn();
    
    $sql = "SELECT * FROM users";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary1']) && $_REQUEST['pref'] == 'hidden') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users ORDER BY users.salary DESC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}



elseif(isset($_REQUEST['salary2']) && $_REQUEST['pref'] == 'hidden'){
    $conn = create_conn();
    
    $sql = "SELECT * FROM users ORDER BY users.salary ASC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);

}

elseif (isset($_REQUEST['salary1']) && $_REQUEST['pref'] == 'male') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='1' ORDER BY users.salary DESC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary1']) && $_REQUEST['pref'] == 'female') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='2' ORDER BY users.salary DESC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary1']) && $_REQUEST['pref'] == 'else') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='3' ORDER BY users.salary DESC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary1']) && $_REQUEST['pref'] == 'both') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='4' ORDER BY users.salary DESC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary1']) && $_REQUEST['pref'] == 'all') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='5' ORDER BY users.salary DESC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary2']) && $_REQUEST['pref'] == 'male') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='1' ORDER BY users.salary ASC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary2']) && $_REQUEST['pref'] == 'female') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='2' ORDER BY users.salary ASC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}

elseif (isset($_REQUEST['salary2']) && $_REQUEST['pref'] == 'else') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='3' ORDER BY users.salary ASC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}
elseif (isset($_REQUEST['salary2']) && $_REQUEST['pref'] == 'both') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='4' ORDER BY users.salary ASC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}
elseif (isset($_REQUEST['salary2']) && $_REQUEST['pref'] == 'all') {
   
    $conn = create_conn();
    
    $sql = "SELECT * FROM users WHERE users.preference='5' ORDER BY users.salary ASC";
    HämtaOchSkriv($sql);
   
    $result = $conn->query($sql);
}



elseif(isset($_REQUEST['pref']) && ($_REQUEST['pref'] == 'male')){
    $conn = create_conn();
    $sql = "SELECT * FROM users WHERE users.preference='1'";
    HämtaOchSkriv($sql);
    $result = $conn->query($sql);
}

elseif(isset($_REQUEST['pref']) && ($_REQUEST['pref'] == 'female')){
    $conn = create_conn();
    $sql = "SELECT * FROM users WHERE users.preference='2'";
    HämtaOchSkriv($sql);
    $result = $conn->query($sql);
}

elseif(isset($_REQUEST['pref']) && ($_REQUEST['pref'] == 'else')){
    $conn = create_conn();
    $sql = "SELECT * FROM users WHERE users.preference='3'";
    HämtaOchSkriv($sql);
    $result = $conn->query($sql);
}

elseif(isset($_REQUEST['pref']) && ($_REQUEST['pref'] == 'both')){
    $conn = create_conn();
    $sql = "SELECT * FROM users WHERE users.preference='4'";
    HämtaOchSkriv($sql);
    $result = $conn->query($sql);
}

elseif(isset($_REQUEST['pref']) && ($_REQUEST['pref'] == 'all')){
    $conn = create_conn();
    $sql = "SELECT * FROM users WHERE users.preference='5'";
    HämtaOchSkriv($sql);
    $result = $conn->query($sql);
}




function HämtaOchSkriv($sql) {

    $conn = create_conn();

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            //$prefArr = array('Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla');
            $prefGet = $row['preference'];

            print("<p class='ad'>");
            print("Användare: " . $row['realname'] . "<br>");
            print("Personens lön: " . $row['salary'] . "<br>");
            $prefArr = ['','Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla'];
            print("Preferens: " . $prefArr[$prefGet] );
            
            print("<br><a href=annonsview.php?usr=" .$row['username']. ">Visa Profil</a></p>");
        }

    } else {
        print("något gick fel, senaste felet:" . $conn->error);
    }

}
