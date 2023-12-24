<php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Job Seeker</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <script src="{{ asset('script/script.js') }}"></script>
        <style>
        body {
            background-image: 'public\\img\\bg.jpg'; /* Replace with the actual path to your image */
            background-size: cover; /* Adjust as needed (cover, contain, etc.) */
            background-position: center center; /* Adjust as needed */
            background-repeat: no-repeat;
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            box-sizing: border-box;
        }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/home">Job Seeker</a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item active">
                            <a class="nav-link" href="/app">CMS Panel<span class="sr-only"></span></a>
                        </li>
                    </ul>
                    <form class="d-flex">
                    @guest
                        <button onclick="return login()" class="btn btn-outline-light" type="submit">
                            Login
                        </button>
                        <div style="padding-left: 5px;">
                            <button onclick="return register()" class="btn btn-outline-light" type="submit">
                                Register
                            </button>
                        </div>
                    @else
                        <button onclick="return viewProfile()" class="btn btn-outline-light" type="submit">
                            <img src="{{ asset('img/profile.png') }}" alt="profile" height="40" width="40">
                        </button>
                    @endguest
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        
        <!-- Table Jobs -->
     
        <div class="jobs-table">
        <input type="search" class="form-control rounded" id="search" name="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </span>
        <table class="table table-striped table-responsive">
            <thead>
                <th>Posisi</th>
                <th>Lokasi</th>
                <th>Tipe Pekerjaan</th>
                <th>Gaji (Rp.)</th>
                <th>Link</th>
            </thead>
            <tbody id="table-body">
                @foreach($jobs as $job)
                    <tr class="table-row">
                        <td>{{ $job->posisi }}</td>
                        <td>{{ $job->lokasi }}</td>
                        <td>{{ $job->tipe_pekerjaan }}</td>
                        <td>{{ number_format($job->gaji) }}</td>
                        <td><a href="/apply/{{ $job->id }}">Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function () {
                $("#search").on("input", function () {
                    var value = $(this).val().toLowerCase();
                    $(".table-row").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
    </body>
</html>
