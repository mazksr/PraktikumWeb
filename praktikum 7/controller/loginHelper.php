<?php

require "./config/Connection.php";

class LoginHelper extends Connection {
    public $data;

    public function __construct($mahasiswa) {
        parent::__construct();

        $nim = $mahasiswa['nim'];
        $password = $mahasiswa['password'];

        $query = "SELECT * FROM mahasiswa WHERE nim = '$nim' AND password = '$password'";
        $result = mysqli_query($this->connect, $query);

        if ($nim == "admin" && $password == "admin") {
            header("Location: ./dashboard/admin.php");
            exit;
        } else {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                
                if ($password == $row['password']) {
                    session_start();
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['nim'] = $row['nim'];
                    $_SESSION['fakultas'] = $row['fakultas'];
                    $_SESSION['prodi'] = $row['jurusan'];
                    $_SESSION['status'] = 'terlogin';
    
                    header("Location: ./dashboard/page.php");
                } else {
                    echo "<script> alert('NIM atau Password salah') </script>";
                }
                return;
            }
        }
    }
}

?>