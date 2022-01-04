@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{ __('Add a new Book') }}</h3>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-info float-right">
                                <i class="fa fa-arrow-left"></i> Back To Index
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ old('name') }}" required/>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Enter Slug" value="{{ old('slug') }}" required/>
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control @error('category') is-invalid @enderror" required>
                                <option value="">Choose Category</option>
                                @forelse($categories as $category)
                                    <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" rows="10" required>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" id="cover_image" name="cover_image" class="form-control-file @error('cover_image') is-invalid @enderror" required/>
                            @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="book_pdf">Book PDF</label>
                            <input type="file" id="book_pdf" name="book_pdf" class="form-control-file @error('book_pdf') is-invalid @enderror" required/>
                            @error('book_pdf')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @can('isAdmin')
                            <div class="form-group">
                                <label>Status</label><br>
                                <label>
                                    <input type="radio" name="status" value="0" {{ !old('status') ? 'checked' : '' }}> Unpublished
                                </label>
                                <label>
                                    <input type="radio" name="status" value="1" {{ old('status') ? 'checked' : '' }}> Published
                                </label>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        @endcan
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-outline-info float-right">
                                <i class="fa fa-check"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const nameField = $('#name');
        const slugField = $('#slug');
        nameField.on('keyup', function() {
            const slug = $(this).val()
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            slugField.val(slug)
        });
    </script>
@endpush
