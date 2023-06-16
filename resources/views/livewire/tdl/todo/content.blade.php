<div>
    <table class="table mb-4">
        <tbody>
            <tr>
                <td>
                    <div>
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" id="comment"
                            wire:model="comment"></textarea>
                    </div>
                    <div>
                        <label for="created_date">Created:</label>
                        <input type="text" class="form-control" id="created_date"
                            value="{{ $createdDate }}" disabled>
                    </div>
                    <div>
                        <label for="updated_date">Updated:</label>
                        <input type="text" class="form-control" id="updated_date"
                            value="{{ $updatedDate }}" disabled>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
</div>
