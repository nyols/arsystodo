<div>
    <b>
        <h1>To-Do List</h1>
    </b>
    <hr>

    @if ($openContentId)
        @livewire('tdl.todo.content', ['todoId' => $openContentId])
    @else
        @foreach ($allTodo as $todo)
            <table class="table mb-4">
                <tbody>
                    <tr>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value=""
                                        wire:model="completed"
                                        wire:click="$emitUp('statusTodo', {{ $todo->id }})">
                                    {{ $todo->todotext }}
                                    <button wire:click="selectTodo({{ $todo->id }})" class="btn btn-primary">Open</button>
                                    <button wire:click="$emitUp('editTodo', {{ $todo->id }})" class="btn btn-success">Edit</button>
                                    <button wire:click="$emitUp('deleteTodo', {{ $todo->id }})" class="btn btn-danger">Delete</button>
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
        @endforeach
    @endif
</div>
