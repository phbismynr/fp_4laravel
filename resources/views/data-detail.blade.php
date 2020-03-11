<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="col-lg-10 mx-auto">
            <div class="card mt-5">
                <div class="card-header text-center">
                  <button class="btn btn-danger float-left" onclick="history.go(-1)">Kembali</button>
                    <h2>Detail Mahasiswa</h2>
                </div>
                <div class="card-body">
                    
                    <table class="table">
                        @if ($dataMhs)
                          <tr>
                            <th style="border:0">Nama</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $dataMhs['nama'] }}</td>
                          </tr>
                          <tr>
                            <th style="border:0">Nim</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $dataMhs['nim'] }}</td>
                          </tr>
                          <tr>
                            <th style="border:0">Kelas</th>
                            <td style="border:0">:</td>
                            <td style="border:0">{{ $dataMhs['kelas'] }}</td>
                          </tr>
                        @else
                            <td colspan="3">Tidak dapat menampilkan detail data</td>
                        @endif
                      </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>