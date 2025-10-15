@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="mt-4 d-flex flex-row flex-wrap gap-2">
                        <a href="{{ route('users.index') }}" class="btn btn-primary" style="width: fit-content;">List User</a>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary" style="width: fit-content;">List Course</a>
                        <a href="{{ route('user-courses.index') }}" class="btn btn-primary" style="width: fit-content;">List User Course</a>
                        @if(Auth::user() && Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-warning" style="width: fit-content;">Halaman Admin</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
