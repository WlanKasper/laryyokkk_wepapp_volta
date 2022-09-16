<?php
    static $server_name     = "localhost";
    static $username        = "laryyokkk";
    static $password        = "ulSmirnov2003";
    static $database_name   = "cool_webapp";

    function Open_mysql_conn(){
        session_start();

        try {
            $conn = new mysqli($GLOBALS["server_name"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database_name"]);
            $conn_status = "Connected";
            $_SESSION['conn_status'] = $conn_status;
            return $conn;
        } catch (Throwable $e) {
            $conn_status = "Connect failed";
            $_SESSION['conn_status'] = $conn_status;
            $db_response = $e;
            $_SESSION['db_response'] = $db_response;
        }
    }

    function Close_mysql_conn($conn) {
        if ( $conn != null){
            $conn -> close();
            $conn_status = "Disconected";
            $_SESSION['conn_status'] = $conn_status;
        }
    }
?>