<?php
    //header("Content-Type: application/json");
    $input = stripslashes($_GET['query']);
    
    $servername = "sysmysql8.auburn.edu";
    $dbname = 'rrp0019db';
    $username = "rrp0019";
    $password = "rrp0019dbpassword";

    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if (preg_match("/select/i", $input)){
        $results = $conn->query($input);
        if ($results){
            $results->setFetchMode(PDO::FETCH_ASSOC);
            $row = $results->fetchAll();
            echo json_encode($row);
        } else {
            echo "Error with SQL Select Statement";
        }
    } elseif(preg_match("/update/i", $input)) {
        $results = $conn->exec($input);
        if ($results){
            echo "{$results} row(s) updated";
        } else {
            echo "Error with SQL Update Statement";
        }
    } elseif(preg_match("/insert/i", $input)) {
        $results = $conn->exec($input);
        if ($results){
            echo "{$results} row(s) inputted";
        } else {
            echo "Error with SQL Insert Statement";
        }
    } elseif(preg_match("/delete/i", $input)) {
        $results = $conn->exec($input);
        if ($results){
            echo "{$results} row(s) deleted";
        } else {
            echo "Error with SQL Delete Statement";
        }
    } elseif(preg_match("/create/i", $input)) {
        $results = $conn->exec($input);
        if ($results){
            echo "{$results} table(s) created";
        } else {
            echo "Error with SQL Create Statement";
        }
    } else {
        echo "Invalid SQL Statement";
    }

    return $conn;
?>