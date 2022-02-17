@extends('auth.main')

@section('container')
  <h1 class="text-center">Login</h1>
  <form action="/login" method="POST" class="m-4">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" autofocus>
      @error('email')
      <div class="invalid-feedback">
          {{-- message error --}}
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control">
      @error('password')
      <div class="invalid-feedback">
          {{-- message error --}}
          {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn button">Login</button>
  </form>
    <div class="mt-3 mx-4">
        <p>Don't have an account ? <span><a href="{{ route('register') }}">Register</a></span></p>
    </div>
@endsection