<!DOCTYPE html>
<html>
<head>
    <title>Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Upload File</h2>
        <form action="/upload" method="post" enctype="multipart/form-data">
            <div class="mb-3">
            <label for="fileInput" class="form-label">Pilih file untuk diunggah:</label>
            <input type="file" class="form-control" id="fileInput" name="fileInput">
        </div>
        <button type="submit" class="btn btn-primary">Unggah</button>
        </form>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
