@extends('layout.main')

@section('container')
    <div class="list-today my-3">
        @if (session()->has('success'))
            <h1>Success</h1>
        @endif
        <form class="d-flex" action="{{ route('todo.update', $todo->id) }}" method="post">
            @csrf
            @method('put')
                <input class="form-control me-2" type="text" name="name" aria-label="Name" value="{{ $todo->name }}"/>
            <button type="submit" class="btn btn-sm button px-3">Update</button>
        </form>
        <a href="{{ route('todo') }}" class="btn btn-sm button my-3">Back</a>
    </div>
@endsection