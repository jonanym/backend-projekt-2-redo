<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function Lösenord($length = 10)
  {
    $characters = '0123ABCDabcd';
    //$charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++){
      $randomString .=$characters[rand(0,12)];
    }
    return $randomString;
  }


  ?>