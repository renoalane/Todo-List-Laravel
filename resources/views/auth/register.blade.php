@extends('auth.main')

@section('container')
    <h1 class="text-center">Register</h1>
    <form action="{{ route('register.store') }}" method="POST" class="m-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" autofocus id="name">
            @error('name')
            <div class="invalid-feedback">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" autofocus id="email">
            @error('email')
            <div class="invalid-feedback">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
            <div class="invalid-feedback">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input type="password" name="password-confirmation" class="form-control" id="password_confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{-- message error --}}
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn button">Register</button>
    </form>
    <div class="mt-3 mx-4">
        <p>Have an account ? <span><a href="{{ route('login') }}">Login</a></span></p>
    </div>
@endsection