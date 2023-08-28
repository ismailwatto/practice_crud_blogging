@extends('layout.master')
<title>user/index</title>
@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center mt-1">
        <div class="container">
            <h1 class="text-center mb-3" style="color: black">User List</h1>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status ? 'Active' : 'Deactivated' }}</td>
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <td>
                                    @if ($user->status)
                                        <form action="{{ route('deactivateUser', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger">Deactivate</button>
                                        </form>
                                    @endif
                                </td>
                            @endif
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <td>
                                    <form action="{{ route('activateUser', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Activate</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                <!-- Other content in the blade file... -->

            </table>
        </div>
    </div>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap JS (optional, if you need it for other features) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
