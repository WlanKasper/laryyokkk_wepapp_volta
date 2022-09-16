<?php
    include 'manager_db.php';

    $input_firstname = $_POST["input_firstname"];
    $input_lastname = $_POST["input_lastname"];

    $conn = OpenCon();
    echo "Connected";

    $sql = "INSERT INTO names (firstname_user, lastname_user) VALUES ('$input_firstname', '$input_lastname');";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>