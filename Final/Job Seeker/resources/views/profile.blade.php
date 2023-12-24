<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/profile.css')}}">
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
<div style='background-color: #f0f0f0; '>
<div class="container">
    <div class="row">
        <!-- Left Content -->
        <div class="col-md-3">
            <div class="">
                <div class="card-body">
                  <div class="container formss">
                    <h2>Profile Form</h2>

                    <form method="POST" action="{{ route('profiles.store') }}">
                        @csrf
                        @if($user)
                      <div>
                          <div class="form-group content">
                              <label for="nama">Nama: <br></label>
                              <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                          </div>

                          <div class="form-group content">
                              <label for="nomor_telp">Nomor Telepon: <br></label>
                              <input type="text" name="nomor_telp" class="form-control" value="{{ $user->nomor_telp }}" required>
                          </div>

                          <div class="form-group content">
                              <label for="umur">Umur: <br></label>
                              <input type="number" name="umur" class="form-control" value="{{ $user->umur }}" required>
                          </div>

                          <div class="form-group content">
                              <label for="gender">Gender:</label>
                              <select name="gender" class="form-control" required>
                                  <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                  <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                              </select>
                          </div>

                          <div class="form-group content">
                              <label for="desc_self">Deskripsi Diri: <br></label>
                              <textarea name="desc_self" class="form-control" rows="3" required>{{ $user->desc_self }}</textarea>
                          </div>

                          <div class="form-group content">
                              <label for="skill">Skill: <br></label>
                              <textarea name="skill" class="form-control" rows="3" required>{{ $user->skill }}</textarea>
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        @else
                        <div>
                          <div class="form-group content">
                              <label for="nama">Nama: <br></label>
                              <input type="text" name="nama" class="form-control" value="" required>
                          </div>

                          <div class="form-group content">
                              <label for="nomor_telp">Nomor Telepon: <br></label>
                              <input type="text" name="nomor_telp" class="form-control" value="" required>
                          </div>

                          <div class="form-group content">
                              <label for="umur">Umur: <br></label>
                              <input type="number" name="umur" class="form-control" value="" required>
                          </div>

                          <div class="form-group content">
                              <label for="gender">Gender:</label>
                              <select name="gender" class="form-control" required>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                              </select>
                          </div>

                          <div class="form-group content">
                              <label for="desc_self">Deskripsi Diri: <br></label>
                              <textarea name="desc_self" class="form-control" rows="3" required></textarea>
                          </div>

                          <div class="form-group content">
                              <label for="skill">Skill: <br></label>
                              <textarea name="skill" class="form-control" rows="3" required></textarea>
                          </div>

                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        @endif
                    </form>
                </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                  <div class="formss">
                    <h2 style="transform: translate(0px, -70px);">Profile</h2>
                      @if($user)
                      <table class="table" style="height: 450px">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user->nama }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ $user->nomor_telp }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td>{{ $user->umur }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi Diri</th>
                            <td>{{ $user->desc_self }}</td>
                        </tr>
                        <tr>
                            <th>Skill</th>
                            <td>{{ $user->skill }}</td>
                        </tr>
                    </table>
                    @else
                      <p>No data available.</p>
                    @endif
                  </div>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="col-md-3">
            <div class="">
                <div class="card-body formss">
                  <h2 style="transform: translate(0px, -70px);">Pekerjaan</h2>
                    @if($applied)
                      <table class="table" style="height: 450px">
                          <tr>
                              <th>Posisi</th>
                              <td>{{ $job->posisi }}</td>
                          </tr>
                          <tr>
                              <th>Nama</th>
                              <td>{{ $applied->nama }}</td>
                          </tr>
                          <tr>
                              <th>Status</th>
                              <td>{{ $applied->status }}</td>
                          </tr>
                      </table>
                    @else
                        <p>No data available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>