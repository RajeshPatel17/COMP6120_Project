<?php
    function connect(){
        $input = $_GET['SQL Input'];
        $servername = "sysmysql8.auburn.edu";
        $username = "rrp0019";
        $password = "rrp0019DBPass6120";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
?>