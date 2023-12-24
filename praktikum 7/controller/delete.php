<?php

require "../config/Connection.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $connection = new Connection();

    if ($connection->connect) {
        $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";

        if (mysqli_query($connection->connect, $query)) {
            header("Location: ../dashboard/admin.php");
        } else {
            echo "Error deleting record: " . mysqli_error($connection->connect);
        }
        mysqli_close($connection->connect);
    } else {
        echo "Error connecting to the database: " . mysqli_connect_error();
    }
} else {
    echo "Invalid request. Missing nim parameter.";
}
?>
