<?php

require "../config/Connection.php";

$connection = new Connection();

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($connection->connect, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nim = $row['nim'];
            $nama = $row['name'];
            $fakultas = $row['fakultas'];
            $prodi = $row['jurusan'];
            $password = $row['password'];
        }
    } else {
        echo 'Error: ' . mysqli_error($connection->connect);
    }
} else {
    echo "Invalid request. Missing nim parameter.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page • MIT Indonesia</title>
    <link rel="icon" href="https://www.harvard.edu/wp-content/uploads/2020/10/cropped-logo-branding-compressed-300x300.png" sizes="192x192" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>EDIT MAHASISWA</h1>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="../img/pp.jpg" class="card-img-top w-25" alt="Foto Profil">
                    </div>
                    <form action="../controller/edit.php?nim=<?php echo $nim; ?>" method="post">
                        <div class="mt-5 w-75 mx-auto">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="prodi" class="col-sm-2 col-form-label">Fakultas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= $fakultas ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $prodi ?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="password" name="password" value="<?= $password ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="admin.php" class="btn btn-secondary btn-block"><- Kembali</a>
                                </div>
                                <div class="col-sm-6">
                                    <input type="submit" class="btn btn-primary" value="Update ->">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </center>
</body>

</html>