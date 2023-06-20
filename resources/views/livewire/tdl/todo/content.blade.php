<div>
    <form wire:submit.prevent="saveComment">
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea wire:model="comment" id="comment" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="created_date">Created:</label>
            <input type="text" wire:model="createdDate" id="created_date" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="updated_date">Updated:</label>
            <input type="text" wire:model="updatedDate" id="updated_date" class="form-control" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button wire:click="exitContent" class="btn btn-secondary">Back to List</button>
    </form>
</div>
