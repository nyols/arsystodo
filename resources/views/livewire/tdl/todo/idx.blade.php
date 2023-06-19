<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <hr>

    @if ($addEnable)
        @livewire('tdl.todo.add')
    @else
    <div class="text-left">
        <x-adminlte-button wire:click="addTodo" label="Add Todo" theme="success" icon="fas fa-plus" />
    </div>
    @endif

    <!-- Daftar Todo -->

    @if ($editEnable)
        @livewire('tdl.todo.edit', ['todoId' => $todoId])
    @else
        <div class="mt-4">
            @livewire('tdl.todo.lists')
        </div>
    @endif
</div>
