<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Table</title>
</head>
<body>
  <div class="container">
    <h1>Data Table</h1>
    <table class="table table-striped">
      <thead>
        <tr>
            <th>Data</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            @foreach($getDataUser as $user)
                <tr>                    
                    <td>Data 1</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('data.update.email') }}" class="btn btn-primary">Update Data</a>
                        <a href="" class="btn btn-danger">Hapus Data</a>
                    </td>
                </tr>
            @endforeach
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS (Optional, only required if you want to use some Bootstrap features) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
