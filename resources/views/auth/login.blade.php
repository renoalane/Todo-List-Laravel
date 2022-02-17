@extends('auth.main')

@section('container')
  <h1 class="text-center mb-2">To-Do List</h1>
  <h2 class="text-center">Login</h2>
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('failedLogin'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('failedLogin') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form action="/login" method="POST" class="m-4">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" autofocus >
      @error('email')
      <div class="text-danger">
          {{-- message error --}}
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control">
      @error('password')
      <div class="text-danger">
          {{-- message error --}}
          {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn button">Login</button>
  </form>
    <div class="mt-3 mx-4">
        <p>Don't have an account ? <span><a href="{{ route('register') }}" class="link">Register</a></span></p>
    </div>
@endsection