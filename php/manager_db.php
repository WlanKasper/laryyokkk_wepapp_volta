<?php
    static $server_name     = "localhost";
    static $username        = "laryyokkk";
    static $password        = "ulSmirnov2003";
    static $database_name   = "cool_webapp";

    function Open_mysql_conn() {
        session_start();

        try {
            $conn = new mysqli($GLOBALS["server_name"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database_name"]);
            $_SESSION['conn_status'] = "Connected";
            return $conn;
        } catch (Throwable $e) {
            $_SESSION['conn_status'] = "Connect failed";
            $_SESSION['db_response'] = $e;
        }
    }

    function Close_mysql_conn($conn) {
        if ( $conn != null){
            $conn -> close();
            $_SESSION['conn_status'] ="Disconected";
        }
    }

    function Get_all_tables_names() {
        $pdo = new PDO('mysql:host=localhost;dbname=cool_webapp', 'root', '');
        $query = 'SHOW tables FROM ' . $GLOBALS["database_name"] . ';';

        $statement = $pdo->prepare($query);
        $statement->execute();
        $tables = $statement->fetchAll(PDO::FETCH_NUM);

        $resp = array();
        foreach($tables as $table){
            $resp[] = $table[0];
        }
        return implode("; ", $resp);
    }
?>