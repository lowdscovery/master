<div>
    <form wire:submit.prevent="create">
        <div class="form-group">
            <label for="col1">Column 1</label>
            <input type="text" id="col1" wire:model="col1" class="form-control">
            @error('col1') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="col2">Column 2</label>
            <input type="text" id="col2" wire:model="col2" class="form-control">
            @error('col2') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="col3">Column 3</label>
            <input type="text" id="col3" wire:model="col3" class="form-control">
            @error('col3') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Average</th>
                <th>Result</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->col1 }}</td>
                <td>{{ $item->col2 }}</td>
                <td>{{ $item->col3 }}</td>
                <td>{{ $item->avg_col }}</td>
                <td>{{ $item->result_col }}</td>
                <td>
                    <button wire:click="edit({{ $item->id }})" class="btn btn-warning">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($dataId)
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="col1">Column 1</label>
            <input type="text" id="col1" wire:model="col1" class="form-control">
            @error('col1') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="col2">Column 2</label>
            <input type="text" id="col2" wire:model="col2" class="form-control">
            @error('col2') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="col3">Column 3</label>
            <input type="text" id="col3" wire:model="col3" class="form-control">
            @error('col3') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @endif
</div>
