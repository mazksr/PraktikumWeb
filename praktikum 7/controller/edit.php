<?php

require "../config/Connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_GET['nim'];
    $newNama = $_POST['nama'];
    $newNIM = $_POST['nim'];
    $newFakultas = $_POST['fakultas'];
    $newProdi = $_POST['prodi'];
    $newPassword = $_POST['password'];

    if ($newNIM !== 'admin') {
        $connection = new Connection();

        if ($connection->connect) {
            $query = "UPDATE mahasiswa SET name = '$newNama', nim = '$newNIM', fakultas = '$newFakultas', jurusan = '$newProdi', password = '$newPassword' WHERE nim = '$nim'";

            if (mysqli_query($connection->connect, $query)) {
                header("Location: ../dashboard/admin.php");
            } else {
                echo "Error updating record: " . mysqli_error($connection->connect);
            }
            mysqli_close($connection->connect);
        } else {
            echo "Error connecting to the database: " . mysqli_connect_error();
        }
    } else {
        echo "<script> alert('Jingan') </script>";
    }
} else {
    echo "Invalid request. Missing nim parameter.";
}

?>