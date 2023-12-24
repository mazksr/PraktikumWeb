<?php 

require "controller/loginHelper.php";

if(isset($_POST['submit'])) {
    $login = new LoginHelper($_POST);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page • MIT Indonesia</title>
    <link rel="icon" href="/themes/mit/assets/favicon/favicon.ico" sizes="32x32">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>Login Page</h1> <br>
        <form action="" method="post">
            <div class="container">
                <div class="mb-3">
                    <label for="nim" class="form-label" style="text-align: left; display: block;">NIM :</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Input your NIM" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="text-align: left; display: block;">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Input your password" required>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-start">
                        <a href="register.php" class="btn btn-link">Belum punya akun?</a>
                        </div>
                        <div class="col text-end">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>