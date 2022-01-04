@extends('layouts.backend')

@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>{{ __('Book') }}</h3>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('books.create') }}" class="btn btn-sm btn-outline-info float-right">
                                <i class="fa fa-plus"></i> Add New Book
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($books as $book)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <th>
                                    <img src="{{ $book->cover_image_url }}" alt="{{ $book->name }}" width="24px">
                                </th>
                                <th>{{ $book->name }}</th>
                                <th>{{ $book->category->name }}</th>
                                <th>{{ $book->createdBy->name }}</th>
                                <th>{{ $book->book_status }}</th>
                                <th>
                                    <a download href="{{ $book->pdf_url }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger delete-confirm" data-action="{{ route('books.destroy', $book->id) }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Book Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('partials.delete-confirm')
@endsection

@push('script')
    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $(".dataTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
    </script>
@endpush
