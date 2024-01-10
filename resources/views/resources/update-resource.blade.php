@extends('Layout.app')

@section('css_content')
@endsection

@section('auth_content')

    {{-- @include('Layout.nav') --}}
    <div class="container mx-auto p-5">
        <h1>Edit Resource</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('resources.update', ['id' => $resource->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="router" class="block text-sm font-medium text-gray-600">Router:</label>
                <input type="text" id="router" name="router" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-300" value="{{ $resource->router }}" >
            </div>
    
            <div class="mb-4">
                <label for="html" class="block text-sm font-medium text-gray-600">HTML:</label>
                <textarea id="html" name="html" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-300">{{ $resource->html }}</textarea>
            </div>
            <div class="mb-4">
                <label for="css" class="block text-sm font-medium text-gray-600">CSS:</label>
                <textarea id="css" name="css" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-300">{{ $resource->css }}</textarea>
            </div>

            <div class="mb-4">
                <label for="script" class="block text-sm font-medium text-gray-600">Script:</label>
                <textarea id="script" name="script" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-300">{{ $resource->script }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">Update Resource</button>
        </form>
    </div>
@section('script_content')
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
