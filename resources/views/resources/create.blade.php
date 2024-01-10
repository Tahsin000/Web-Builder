@extends('resources.master')
@section('content')
    @include('Layout.nav')
    <div style="height: 100vh;display: flex; align-items: center; justify-content: center;">
        <div style="width: 900px">

            <h1 class="text-3xl font-bold mb-4 text-center">Create Your <br />Own identity</h1>

            @if (session('success'))
                <p class="text-green-600 text-center">{{ session('success') }}</p>
                <p class="text-center">
                    <a target="_blank" class="text-blue-500 font-bold hover:text-blue-700 no-underline" href="{{ session('created_router') }}">Click ME</a>
                </p>
            @endif
            @error('router')
                <p style="color: red; text-align: center">{{ $message }}</p>
            @enderror

            <form action="{{ route('resources.store') }}" method="post"
                class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
                @csrf

                <div class="mb-4">
                    <label for="router" class="block text-sm font-medium text-gray-600">Router:</label>
                    <input type="text" name="router" id="router" required placeholder="Enter Router | example 'home'"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="html" class="block text-sm font-medium text-gray-600">HTML:</label>
                    <textarea name="html" id="html" required placeholder="Enter HTML | Not using 'body' tag"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <div class="mb-4">
                    <label for="css" class="block text-sm font-medium text-gray-600">CSS:</label>
                    <textarea name="css" id="css" required placeholder="Enter CSS | Not using 'style' tag"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <div class="mb-4">
                    <label for="script" class="block text-sm font-medium text-gray-600">Script:</label>
                    <textarea name="script" id="script" required placeholder="Enter Script | Not using 'script' tag"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Submit
                </button>
            </form>
        </div>

    </div>
@endsection
