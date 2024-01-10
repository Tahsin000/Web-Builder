@extends('resources.master')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    @include('Layout.nav')
    {{-- @include('Layout.nav') --}}
    <div class="p-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="modal fade " id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black lg:text-red-500 font-bold" id="deleteModalLabel  text-3xl">Confirm
                            Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body font-bold">
                        Are you sure you want to delete this resource?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-gray text-black"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger font-red-600 text-black"
                            id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title">Data table</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>router</th>
                                    <th>HTML</th>
                                    <th>CSS</th>
                                    <th>Script</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userResources as $userResource)
                                    <tr>
                                        <td>{{ $userResource->router }}</td>
                                        <td>{{ $userResource->html }}</td>
                                        <td>{{ $userResource->css }}</td>
                                        <td>{{ $userResource->script }}</td>
                                        <td>{{ $userResource->updated_at }}</td>
                                        <td class="flex gap-2">
                                            <a target="_blank"
                                                href="{{ env('APP_URL') . 'publish/' . $userResource->router }}"
                                                class="btn btn-outline-primary btn-sm">Live</a>
                                            <a class="btn btn-outline-primary btn-sm"
                                                href="{{ route('resources.edit', ['id' => $userResource->id]) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Edit</a>
                                            <form method="POST"
                                                action="{{ route('resources.destroy', $userResource->id) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-outline-primary btn-sm delete-resource"
                                                    type="submit" class="text-red-500">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@section('script')
    <script src="{{ asset('js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function($) {
            'use strict';
            $(function() {
                $('#order-listing').DataTable({
                    "aLengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],
                    "iDisplayLength": 10,
                    "language": {
                        search: ""
                    }
                });
                $('#order-listing').each(function() {
                    var datatable = $(this);
                    // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                    var search_input = datatable.closest('.dataTables_wrapper').find(
                        'div[id$=_filter] input');
                    search_input.attr('placeholder', 'Search');
                    search_input.removeClass('form-control-sm');
                    // LENGTH - Inline-Form control
                    var length_sel = datatable.closest('.dataTables_wrapper').find(
                        'div[id$=_length] select');
                    length_sel.removeClass('form-control-sm');
                });
            });
        })(jQuery);
    </script>
@endsection
@endsection
