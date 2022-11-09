<?php
    //header("Content-Type: application/json");
    $input = $_GET['query'];
    
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
            while ($row = $results->fetch()){
                echo json_encode($row);
            }
        } else {
            echo "error";
        }
        //sql that contains select
    } else {
        //sql that does not contain select
    }

    return $conn;

?>