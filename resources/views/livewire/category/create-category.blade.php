<div class="col-md-12" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" id="category" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" wire:model="name" name="name" required>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <button wire:click="store()" type="submit" class="btn btn-sm btn-outline-info float-right">
            <i class="fa fa-check"></i> Submit
        </button>
    </div>
</div>
