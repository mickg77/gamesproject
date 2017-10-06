<?php
    
    $servername="localhost";
    $username="mickg77";
    $password="";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=gamesdb",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "Congratulations, you have connected";
    }
    catch(PDOException $e) {
        //hopefully never needed
        echo "Error connecting".$e->getMessage();
    }
    
?>