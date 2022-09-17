<?php
    include './manager_db.php';
    $conn = Open_mysql_conn();
    
    $input_firstname = $_POST["input_firstname"];
    $input_lastname = $_POST["input_lastname"];

    $sql = "INSERT INTO names (firstname_user, lastname_user) VALUES ('$input_firstname', '$input_lastname');";

    if ($conn != null && $conn->query($sql) === TRUE) {
        $_SESSION['db_response'] = "New record created successfully";
    } else {
        $_SESSION['db_response'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: {$_SERVER["HTTP_REFERER"]}");
    Close_mysql_conn($conn);
?>