<?php
    //connection to the database
    try{
        $database = new PDO("mysql:host=sql104.epizy.com;dbname=epiz_25866289_nsls","epiz_25866289","lntdCHLBKf7");
    }
    catch(PDOException $error){
        echo "Failed to connect to the database";
    }
        
?>