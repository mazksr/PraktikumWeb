


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{asset('css/profile.css')}}"> -->
    <title>Document</title>
    <script src="{{ asset('script/script.js') }}"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <!-- Add your CSS styling or link to a stylesheet here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .job-details {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        h1, h2, h3 {
            color: #333;
        }

        .details-section {
            margin-top: 20px;
        }

        .details-section label {
            font-weight: bold;
        }

        .details-section p {
            margin-top: 5px;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
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

<div class="job-details">
    <h1>Job Details</h1>

    <div class="details-section">
        <label>Position:</label>
        <h2>{{ $job->posisi }}</h2>
    </div>

    <div class="details-section">
        <label>Location:</label>
        <p>{{ $job->lokasi }}</p>
    </div>

    <div class="details-section">
        <label>Job Type:</label>
        <p>{{ $job->tipe_pekerjaan }}</p>
    </div>

    <div class="details-section">
        <label>Email:</label>
        <p>{{ $job->email }}</p>
    </div>

    <div class="details-section">
        <label>Contact Number:</label>
        <p>{{ $job->nomor_telp }}</p>
    </div>

    <div class="details-section">
        <label>Job Description:</label>
        <p>{{ $job->job_desc }}</p>
    </div>

    <div class="details-section">
        <label>Salary:</label>
        <p>{{ $job->gaji }}</p>
    </div>

    <div class="container formss">
                    <h2>Profile Form</h2>

                    <form method="POST" action="{{ route('submit-cv') }}">
                        @csrf
                      <div>
                            
                          <div class="form-group content">
                              <label for="nama">Link CV: <br></label>
                              <input type="text" name="CV" class="form-control" required>
                          </div>
                          <input type="hidden" name="jobId" class="form-control" value="{{ $job->id }}">

                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
</div>

</body>
</html>

</body>
</html>