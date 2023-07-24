@extends('app')

<div class="container mt-5">
    <div class="mb-4">
        <a href="{{ route('data.data') }}" class="btn btn-secondary">Data per Upload</a>
        <a href="{{ route('data.show') }}" class="btn btn-primary">Semua Data</a>
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
