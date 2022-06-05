<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>Data Pekerjaan
    </title>
  </head>
  <body id="home">
        <div class="max-h-full pb-24 my-auto bg-white dark:bg-gray-800">
    <div class="text-center p-10">
        <h1 class="font-bold text-5xl dark:text-white">Data Pekerjaan</h1>
    </div>
    <div class="col-md-7">
        <form method="POST" action="/search">
            @csrf
            <div class="search-box">
                <button class="btn"><i class="fa fa-search btn-search"></i></button>
                <input type="text" name="search" class="search-box" placeholder="Cari">
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <form method="POST" action="/searchGroup">
            @csrf
            <div class="search-box">
                <button class="btn"><i class="fa fa-search btn-search"></i></button>
                <input type="text" name="place" class="search-box" placeholder="Place">
                <input type="text" name="position" class="search-box" placeholder="Position">
            </div>
        </form>
    </div>

    <table class="table">
    <thead>
        <tr>
    <th scope="col">Nama Lengkap</th>
    <th scope="col">Nomor Telepon</th>
    <th scope="col">Domisili</th>
    <th scope="col">Posisi</th>
    <th scope="col">Tempat Kerja</th>
    <th scope="col">Gaji</th>
    </tr>
  </thead>
    @foreach($unique as $data)
    <tbody>
    <tr>
      <th scope="row">{{$data->namaLengkap}}</th>
      <td>{{$data->nomorTelp}}</td>
      <td>{{$data->domisili}}</td>
      <td>{{$data->posisi}}</td>
      <td>{{$data->tempatKerja}}</td>
      <td>{{$data->gaji}}</td>
    </tr>
    </tbody>
    @endforeach
    </table>
</div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
