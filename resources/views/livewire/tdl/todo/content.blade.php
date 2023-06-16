<div>
    <form wire:submit.prevent="saveComment">
        <div>
            <label for="comment">Comment:</label>
            <textarea wire:model="comment" id="comment"></textarea>
        </div>
        <div>
            <label for="created_date">Created:</label>
            <input type="text" wire:model="createdDate" id="created_date" disabled>
        </div>
        <div>
            <label for="updated_date">Updated:</label>
            <input type="text" wire:model="updatedDate" id="updated_date" disabled>
        </div>
        <button type="submit">Submit</button>
        <button wire:click="exitContent">Back to List</button>
    </form>
</div>
