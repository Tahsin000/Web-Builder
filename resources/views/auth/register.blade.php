@extends('Layout.app')
@section('auth_content')

<div class="flex justify-center items-center h-screen bg-gray-100 ">
    <div class="bg-white p-8 rounded-3xl shadow-md w-full sm:w-96">
        <h2 class="text-2xl font-bold mb-4">Register</h2>

        <!-- Display Errors -->
        @if (Session::has('errors'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md">
                <strong>Error!</strong> Please fix the following issues:
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Laravel Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ old('name') }}" required autofocus>
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md"
                    value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 p-2 w-full border rounded-md" required>
            </div>

            <!-- Register Button -->
            <div>
                <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded-full hover:bg-green-600 transition duration-300 cursor-pointer">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
