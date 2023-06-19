<?php

namespace App\Http\Livewire\Tdl\Todo;

use Livewire\Component;
use App\Models\Tdl\Todo;

class Lists extends Component
{
    protected $listeners = ['deleteTodo', 'refreshList', 'exitContent'];
    public $allTodo;
    public $completed = [];
    public $showAddForm = false;
    public $selectedTodo;
    public $openContentId;

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

        // Initialize the completed array with default values
        $this->completed = $this->allTodo->pluck('completed', 'id')->toArray();
    }

    public function deleteTodo($todoId)
    {
        Todo::find($todoId)->delete();
        $this->loadTodoList();
    }

    public function statusTodo($todoId)
    {
        $todo = Todo::findOrFail($todoId);
        $todo->completed = $this->completed[$todoId] ? 1 : 0;
        $todo->save();
        $this->loadTodoList();
    }

    public function refreshList()
    {
        $this->loadTodoList();
    }

    public function cancelAddTodo()
    {
        $this->showAddForm = false;
    }

    public function openAddForm()
    {
        $this->showAddForm = true;
    }

    public function selectTodo($todoId)
    {
        $this->openContentId = $todoId;
        $this->completed[$todoId] = Todo::findOrFail($todoId)->completed == 1;
    }

    public function exitContent()
    {
        $this->openContentId = null;
        $this->reset(['completed']);
    }
}
