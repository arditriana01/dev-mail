<!DOCTYPE html>
<html>
<head>
    <title>Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <a href="{{ route('data.data') }}" class="btn btn-secondary">Lihat Data</a>
        </div>

        <h2>Form Upload File</h2>
        <form action="{{ route('data.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Pilih file untuk diunggah:</label>
                <input type="file" class="form-control" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Unggah</button>
        </form>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
