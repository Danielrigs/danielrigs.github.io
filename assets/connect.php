<?php
    $srv="localhost";
    $usrnm="root";
    $pwd="";
    $db="RockWebshop";

    $conn=mysqli_connect($srv,$usrnm,$pwd,$db);

    if(!$conn){
        die("failed to connect:" . mysqli_connect_error());
    }
    
?>