@extends('Layout.app')
@section('auth_content')
    <div class="flex justify-center items-center h-screen bg-gray-100 ">
        <div class="bg-white rounded-3xl shadow-md w-full sm:w-96 p-12">
            <h2 class="text-2xl font-bold mb-4">Login</h2>

            @if ($errors->any())
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
            <form className="w-full" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md"
                        value="{{ old('email') }}" required autofocus>

                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md"
                        required>

                </div>

                <!-- Remember Me -->
                {{-- <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-600">Remember me</label>
            </div> --}}

                <!-- Login Button -->
                <div className=" mb-4">
                    <button type="submit"
                        class="cursor-pointer bg-blue-500 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">
                        Login
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
