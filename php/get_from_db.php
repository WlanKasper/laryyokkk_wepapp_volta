<?php
    include 'manager_db.php';

    $input_firstname = $_GET["input_firstname"];
    $input_lastname = $_GET["input_lastname"];

    $conn = OpenCon();
    echo "Connected";

    $sql = "SELECT id_user, firstname_user, lastname_user FROM names WHERE firstname_user='$input_firstname' AND lastname_user='$input_lastname';";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id_user"]. " - Name: " . $row["firstname_user"]. " " . $row["lastname_user"]. "<br>";
      }
    } else {
      echo "0 results";
    }
?>