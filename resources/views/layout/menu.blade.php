<div class="list-group list-group-horizontal my-3">
    <a href="{{ route('todo') }}" class="list-group-item list-group-item-action second-text {{ $active == 'todo' ? 'this fw-bold' : ''  }}">
        Today
    </a>
    <a href="{{ route('todolist') }}" class="list-group-item list-group-item-action second-text {{ $active == 'todolist' ? 'this fw-bold' : ''  }}">
        Todo List
    </a>
</div>