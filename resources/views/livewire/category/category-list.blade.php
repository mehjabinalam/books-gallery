<div class="row justify-content-center" xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:livewire="">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Category') }}</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <livewire:category.create-category />
                    <div class="col-md-12">
                        <hr class="bg-info">
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + $categories->firstItem() }}</td>
                                    <td>
                                        @if ($updateMode && $selected_id == $category->id)
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" wire:model="name" name="name" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($updateMode && $selected_id == $category->id)
                                            <button class="btn btn-sm btn-outline-info" type="button" wire:click="update">
                                                <i class="fa fa-check"></i> Update
                                            </button>
                                            <button type="button" wire:click="resetRequest()" class="btn btn-sm btn-outline-danger">
                                                <i class="fa fa-times"></i> Cancel
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-outline-info" type="button" wire:click="selectCategory('{{ $category->id }}', '{{ $category->name }}', true)">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" wire:click="selectCategory({{ $category->id }})" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#confirmModal">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="3">No data found</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="float-right">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Delete Confirm</h5>
                        <button wire:click.prevent="resetRequest()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click.prevent="resetRequest()" class="btn btn-sm btn-outline-info close-btn" data-dismiss="modal">
                            <i class="fa fa-times"></i> No
                        </button>
                        <button type="button" wire:click.prevent="destroy()" class="btn btn-sm btn-outline-danger close-modal" data-dismiss="modal">
                            <i class="fa fa-check"></i> Yes
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
