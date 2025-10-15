@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{ isset($course) ? 'Edit' : 'Tambah' }} Course</h2>
    <form action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}" method="POST">
        @csrf
        @if(isset($course)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Course Name</label>
            <input type="text" name="course_name" class="form-control" value="{{ old('course_name', $course->course_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mentor</label>
            <select name="mentor_id" class="form-select">
                <option value="">-- Pilih Mentor --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('mentor_id', $course->mentor_id ?? '') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Mentor Name</label>
            <input type="text" name="mentor_name" class="form-control" value="{{ old('mentor_name', $course->mentor_name ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Mentor Degree</label>
            <input type="text" name="mentor_degree" class="form-control" value="{{ old('mentor_degree', $course->mentor_degree ?? '') }}">
        </div>
        <div class="mb-2 d-flex gap-2 align-items-center">
            <a href="{{ url()->previous() }}" class="btn btn-link p-0 d-flex align-items-center text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                </svg>
                Kembali
            </a>
            <button type="submit" class="btn btn-success">{{ isset($course) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>
@endsection
