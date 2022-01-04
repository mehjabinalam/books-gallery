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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($wishlists as $wishlist)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <th>
                                    <img src="{{ $wishlist->book->cover_image_url }}" alt="{{ $wishlist->book->name }}" width="24px">
                                </th>
                                <th>
                                    <a target="_blank" href="{{ route('book-details', $wishlist->book->slug) }}">{{ $wishlist->book->name }}</a>
                                </th>
                                <th>{{ $wishlist->book->category->name }}</th>
                                <th>
                                    <button type="button" class="btn btn-sm btn-outline-danger delete-confirm" data-action="{{ route('wishlist.remove', $wishlist->book_id) }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Wishlist Found</td>
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
