<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'terlogin') {
    echo '<script>alert("YOU SHALL NOT BE HERE");</script>';
    header("Location: ../controller/logout.php");
    exit;
}

$nama = $_SESSION['name'];
$nim = $_SESSION['nim'];
$fakultas = $_SESSION['fakultas'];
$prodi = $_SESSION['prodi'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page • MIT Indonesia</title>
    <link rel="icon" href="/themes/mit/assets/favicon/favicon.ico" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>MAHASISWA MIT</h1>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="../img/pp.jpg" class="card-img-top w-25" alt="Foto Profil">
                    </div>
                    <div class="mt-5 w-75 mx-auto">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="prodi" class="col-sm-2 col-form-label">Fakultas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= $fakultas ?>" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $prodi ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <br>

    <?php
    require "../config/Connection.php";

    $connection = new Connection();

    $query = "SELECT * FROM mahasiswa WHERE nim != 'admin'";
    $result = mysqli_query($connection->connect, $query);
    ?>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['nim'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['fakultas'] . '</td>';
                        echo '<td>' . $row['jurusan'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo 'Error: ' . mysqli_error($connection->connect);
                }

                mysqli_close($connection->connect);
                ?>
            </tbody>
        </table>
        <div class="container col-4 text-center">
            <a href="../controller/logout.php"><button class="btn btn-danger">Log out</button></a>
        </div>
    </div>
</body>

</html>