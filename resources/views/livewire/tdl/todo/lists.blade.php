<div>
    <b>
        <style>
            .todo-list-title {
                font-family: 'Arial', sans-serif;
                font-size: 64px;
                font-weight: bold;
                color: #333;
                text-align: center;
                text-decoration: underline;
            }
        </style>

        <h1 class="todo-list-title">To-Do List</h1>
    </b>
    <hr>

    @if ($openContentId)
        @livewire('tdl.todo.content', ['todoId' => $openContentId])
    @else
        @foreach ($allTodo as $todo)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value=""
                            wire:model="completed.{{ $todo->id }}"
                            wire:click="statusTodo({{ $todo->id }})">
                        <label class="form-check-label">
                            {{ $todo->todotext }}
                        </label>
                    </div>
                    <div class="text-right mt-3">
                        <x-adminlte-button wire:click="selectTodo({{ $todo->id }})" label="Open" theme="primary"
                            icon="far fa-eye" class="mr-2" />
                        <x-adminlte-button wire:click="$emitUp('editTodo', {{ $todo->id }})" label="Edit"
                            theme="success" icon="far fa-edit" class="mr-2" />
                        <x-adminlte-button wire:click="$emitUp('deleteTodo', {{ $todo->id }})" label="Delete"
                            theme="danger" icon="far fa-trash-alt" />
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
