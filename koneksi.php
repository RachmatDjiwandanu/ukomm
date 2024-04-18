<?php
    $conn = mysqli_connect("localhost", "root", "", "db_ukom");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>