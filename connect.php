<?php
    
    $servername="localhost";
    $username="mickg77";
    $password="";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=demo",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        //hopefully never needed
        echo "Error connecting".$e->getMessage();
    }
    
?>