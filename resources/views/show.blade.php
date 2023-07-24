
@extends('app')

<div class="container mt-5">
  <div class="mb-4">
      <a href="{{ route('data.index') }}" class="btn btn-secondary">Input Data</a>
      <a href="{{ route('data.data') }}" class="btn btn-secondary">Data per Upload</a>
  </div>

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

      </tr>
    </tbody>
  </table>
</div>

