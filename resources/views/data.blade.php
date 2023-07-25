@extends('app')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <a href="{{ route('data.index') }}" class="btn btn-secondary">Input Data</a>        
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('successGenerete'))
                <div class="alert alert-success">
                    {{ session('successGenerete') }}
                </div>
            @endif
                        
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
                                <button type="submit" class="btn btn-primary">Generate Email</button>
                            </form>
                            @if($user->status == 1)                                
                                <a href="{{ route('data.export') }}" class="btn btn-success">Export Data</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
