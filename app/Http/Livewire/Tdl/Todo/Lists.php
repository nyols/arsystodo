<?php

namespace App\Http\Livewire\Tdl\Todo;

use Livewire\Component;
use App\Models\Tdl\Todo;

class Lists extends Component
{
    protected $listeners = ['deleteTodo', 'refreshList', 'exitContent'];
    public $allTodo;
    public $completed = false;
    public $comment;
    public $showAddForm = false;
    public $selectedTodo;
    public $checked = false;
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
    }

    public function deleteTodo($todoId)
    {
        Todo::find($todoId)->delete();
        $this->loadTodoList();
    }

    public function statusTodo()
    {
        $todo = Todo::findOrFail($this->selectedTodo);
        $todo->completed = $this->checked ? 1 : 0;
        $todo->comment = $this->comment ?? '';
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
        $todo = Todo::findOrFail($this->openContentId);
        $this->checked = $todo->completed == 1;
        $this->comment = $todo->comment;
    }

    public function exitContent()
    {
        $this->openContentId = null;
        $this->reset(['comment', 'checked']);
    }
}
