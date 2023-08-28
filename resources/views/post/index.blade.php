@extends('layout.master')
<title>post/index</title>
@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center mt-1">
        <div class="container">
            <h1 class="text-center mb-3" style="color: black">Posts List</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Views</th>
                        <th>Image</th>
                        <th>User Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->views }}</td>
                            <td>
                                <img src="{{ asset('storage/app/' . $post->image) }}" alt="Post Image" style="max-width: 100px; max-height: 50px;">
                            </td>
                            <td>{{ $post->user_name }}</td>
                            <td>
                                <a href="#" onclick="confirmDelete('{{ route('posts.destroy', $post->id) }}')"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
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

    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this post?')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
