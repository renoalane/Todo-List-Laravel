@extends('layout.main')

@section('container')
    <div class="list-today my-3">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form class="d-flex" action="{{ route('todo.store') }}" method="post">
            @csrf
                <input class="form-control me-2" type="text" name="name" placeholder="Create a new to-do for today" aria-label="Name" />
            <button type="submit" class="btn btn-sm button px-3">Create</button>
        </form>
        <table class="mt-4 table">
            <tbody>
                @forelse ($todos as $todo)
                <tr>
                    <th scope="col" class="p-0">
                        <a href="{{ route('todo.completed', $todo->id) }}"><i class=" {{ $todo->completed === 0 ? 'bi bi-app' : 'bi-check-square' }} fs-3"></i></a>
                    </th>
                    <td onclick="location.href='{{ route('todo.edit', $todo->id) }}'" class="todo">
                        <p href="#" class="fs5 pb-0 {{ $todo->completed === 1 ? 'text-decoration-line-through' : '' }}">{{ $todo->name }}</p>
                    </td>
                    <td class="text-end py-0">
                    <button class="btn btn-sm btn-danger btnDelete" data-bs-toggle='modal' data-id= "{{ $todo->id }}" data-bs-target='#deleteModal'><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Nothing to do today</td> 
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

         {{-- POp Up Delete noted --}}
         <div class="modal fade" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Delete This Todo ?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="" class="formDelete" method="post">
                            @csrf
                            @method('delete')
    
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        // Event Listener button delete
        $(".btnDelete").on("click", function(){
            const todo = $(this)[0].dataset.id;
            $(".formDelete").attr('action', '/todos/'+todo);
            const form = document.querySelector('.formDelete');
            console.log(form);
        });
        </script>
@endsection