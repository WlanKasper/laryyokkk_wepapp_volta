<?php
    include './manager_db.php';
    $conn = Open_mysql_conn();

    session_start();

    $input_firstname = $_GET["input_firstname"];
    $input_lastname = $_GET["input_lastname"];

    $sql = "SELECT id_user, firstname_user, lastname_user FROM names WHERE firstname_user='$input_firstname' AND lastname_user='$input_lastname';";
    $result = $conn->query($sql);
    
    if ($conn != null && $result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $db_response = "id: " . $row["id_user"]. " - Name: " . $row["firstname_user"]. " " . $row["lastname_user"];
        $_SESSION['db_response'] = $db_response;
      }
    } else {
        $db_response = "0 results";
        $_SESSION['db_response'] = $db_response;
    }


    header("Location: {$_SERVER["HTTP_REFERER"]}");
    Close_mysql_conn($conn);
?>