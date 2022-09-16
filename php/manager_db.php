<?php
    function OpenCon() {
        echo "Opening connection";
        $server_name = "localhost";
        $username = "laryyokkk";
        $password = "ulSmirnov2003";
        $database_name="cool_webapp";
        $conn = new mysqli($server_name, $username, $password, $database_name) or die("Connect failed: %s\n". $conn -> error);

        return $conn;
    }

    function CloseCon($conn) {
        echo "Closing connection";
        $conn -> close();
    }
?>