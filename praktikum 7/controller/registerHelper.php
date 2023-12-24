<?php

require "./config/Connection.php";

class RegisterHelper extends Connection {
    public function __construct($mahasiswa) {
        parent::__construct();

        $nama = $mahasiswa['nama'];
        $nim = $mahasiswa['nim'];
        $fakultas = $mahasiswa['fakultas'];
        $jurusan = $mahasiswa['jurusan'];
        $password = $mahasiswa['password'];

        $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
        $result = mysqli_query($this->connect, $query);

        if ($nim == "admin") {
            echo "<script> alert('Try to become an admin?') </script>";
            return;
        } else if (mysqli_num_rows($result) > 0) {
            echo "<script> alert('You already have an account, Contact admin if you never make any account') </script>";
            return;
        } else {
            $query = "INSERT INTO mahasiswa VALUES('$nim', '$nama', '$fakultas', '$jurusan', '$password')";
            mysqli_query($this->connect, $query);

            header('Location: login.php');
        }
    }
}

?>