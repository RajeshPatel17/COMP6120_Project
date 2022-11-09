<?php
    //header("Content-Type: application/json");
    $input = $_GET['query'];
    if (empty($input)){
        echo "String is empty";
    } else {
        echo $input;
    }
    
    $servername = "sysmysql8.auburn.edu";
    $username = "rrp0019";
    $password = "rrp0019dbpassword";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (preg_match("/select/i", $input)){
        $results = mysqli_query($conn, $input);
        $row  = mysqli_fetch_array($results);
        echo $results;
        mysqli_close($conn);
        //sql that contains select
    } else {
        //sql that does not contain select
    }





    return $conn;

?>