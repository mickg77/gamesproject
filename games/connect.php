<?php

    $servername= "localhost";
    $username="mickg77";
    $password="";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=gamesdb",$username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "Connected Successfully";
    
    }
    
    catch(PDOException $e) {
        echo "Connection Failed" .$e->getMessage();
    }
    
 
    
    
?>