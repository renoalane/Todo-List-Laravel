@extends('auth.main')

@section('container')
    <h1 class="text-center mb-2">To-Do List</h1>
    <h2 class="text-center">Register</h2>
    <form action="{{ route('register.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" autofocus id="name" value="{{ old('name') }}">
            @error('name')
            <div class="text-danger">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" autofocus id="email" value="{{ old('email') }}">
            @error('email')
            <div class="text-danger">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
            <div class="text-danger">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            @error('password_confirmation')
            <div class="text-danger">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn button">Register</button>
    </form>
    <div class="mt-3 mx-4">
        <p>Have an account ? <span><a href="{{ route('login') }}" class="link">Login</a></span></p>
    </div>
@endsection