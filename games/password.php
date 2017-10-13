<?php


    $string ="bloggs";
    $salt = "gpckkkbjdbgg3779421046511";
    $o_password=$string.$salt;
    echo "<p>Original plus salt : ".$o_password."</p>";
    $e_password =sha1($string.$salt);
    echo "<p>After encryption : ".$e_password."</p>";
    

?>