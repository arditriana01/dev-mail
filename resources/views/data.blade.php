
@extends('app')

<div class="container mt-5">
  <div class="mb-4">
      <a href="{{ route('data.index') }}" class="btn btn-secondary">Input Data</a>
      <a href="{{ route('data.show') }}" class="btn btn-primary">Semua Data</a>
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
          @foreach($getDataUser as $user)
              <tr>                    
                  <td>Data 1</td>
                  <td>{{ $user->created_at }}</td>
                  <td>                      
                      <form method="POST" action="{{ route('data.update.email') }}">
                          @csrf
                          <button type="submit" class="btn btn-primary">Update Data</button>
                      </form>
                      <a href="" class="btn btn-danger">Hapus Data</a>
                  </td>
              </tr>
          @endforeach
      </tr>
    </tbody>
  </table>
</div>

