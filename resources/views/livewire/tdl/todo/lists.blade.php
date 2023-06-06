<div>
    <b>
        <h1>To-Do List</h1>
    </b>
    <hr>

    @foreach ($allTodo as $todo)
    <table class="table mb-4">
        <tbody>
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value=""
                                wire:model="completed" wire:click="$emitUp('statusTodo', {{ $todo->id }})">
                            {{ $todo->todotext }}
                        </label>
                    </div>
                    <div>
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment"
                            wire:model="comment">{{ $todo->comment }}</textarea>
                    </div>
                    <div>
                        <label for="created_date">Created:</label>
                        <input type="text" class="form-control" id="created_date"
                            value="{{ $todo->created_at }}" disabled>
                    </div>
                    <div>
                        <label for="updated_date">Updated:</label>
                        <input type="text" class="form-control" id="updated_date"
                            value="{{ $todo->updated_at }}" disabled>
                    </div>
                    <div>
                        <button wire:click="$emitUp('editTodo', {{ $todo->id }})" type="submit"
                            class="btn btn-danger">Update</button>
                        <button wire:click="$emitUp('deleteTodo', {{ $todo->id }})" type="submit"
                            class="btn btn-success ms-1">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    @endforeach
</div>
