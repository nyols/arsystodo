<?php

namespace App\Http\Livewire\Tdl\Todo;

use Livewire\Component;
use App\Models\Tdl\Todo;

class Lists extends Component
{
    protected $listeners = ['deleteTodo', 'cancelAddTodo', 'refreshlist' => '$refresh'];
    public $allTodo;
    public $completed;
    public $comment;

    public function mount()
    {
        $this->loadTodoList();
    }

    public function render()
    {
        return view('livewire.tdl.todo.lists');
    }

    public function loadTodoList()
    {
        $this->allTodo = Todo::all();
    }

    public function deleteTodo($todoId)
    {
        Todo::find($todoId)->delete();
        $this->loadTodoList();
    }

    public function statusTodo($todoId)
    {
        $todo = Todo::findOrFail($todoId);
        $todo->completed = $this->completed;
        $todo->comment = $this->comment ?? '';
        $todo->save();
        $this->loadTodoList();
    }
}
