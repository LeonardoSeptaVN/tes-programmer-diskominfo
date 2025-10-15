@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Courses</h1>
    <div class="mb-2 d-flex gap-2 align-items-center">
        <!-- Tombol Kembali -->
        <a href="{{ url()->previous() }}" class="btn btn-link p-0 d-flex align-items-center text-dark">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
            </svg>
            Kembali
        </a>

        <!-- Tombol Tambah Course -->
        <a href="{{ route('courses.create') }}" class="btn btn-outline-primary d-flex align-items-center mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus me-1" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            Tambah Course
        </a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr><th>ID</th><th>Course Name</th><th>Mentor</th><th>Degree</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        @foreach($courses as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->course_name }}</td>
                <td>{{ $c->mentor_name }}</td>
                <td>{{ $c->mentor_degree }}</td>
                <td>
                    <a href="{{ route('courses.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('courses.destroy', $c) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $courses->links() }}
</div>
@endsection
