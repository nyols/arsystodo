<?php

namespace App\Http\Livewire\Tdl\Todo;

use Livewire\Component;
use App\Models\Tdl\Todo;

class Content extends Component
{
    public $todoId;
    public $comment;
    public $createdDate;
    public $updatedDate;

    protected $listeners = ['refreshContent', 'exitContent'];

    public function mount($todoId)
    {
        $this->todoId = $todoId;
        $this->loadTodo();
    }

    public function render()
    {
        return view('livewire.tdl.todo.content');
    }

    public function loadTodo()
    {
        $todo = Todo::findOrFail($this->todoId);
        $this->comment = $todo->comment;
        $this->createdDate = $todo->created_at;
        $this->updatedDate = $todo->updated_at;
    }

    public function saveComment()
    {
        $todo = Todo::findOrFail($this->todoId);
        $todo->comment = $this->comment;
        $todo->save();

        $this->emit('refreshContent');
    }

    public function exitContent()
    {
        $this->emit('exitContent');
    }

    public function refreshContent()
    {
        $this->loadTodo();
    }
}
