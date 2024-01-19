<nav class="bg-blue-500 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-2xl font-bold">
            Web Builder
        </div>

        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ url('user-resources') }}" class=" no-underline hover:no-underline text-white hover:text-gray-300">Your Site</a>
                    <a href="{{ url('create') }}"
                    class=" no-underline hover:no-underline text-white hover:text-gray-300 px-3">New Site</a>
                    <a href="{{ url('logout') }}"
                        class=" no-underline hover:no-underline bg-white text-blue-500 hover:bg-gray-200 py-2 px-4 rounded-full transition duration-300">LogOut</a>
                @else
                    <a href="{{ route('login') }}" class=" no-underline hover:no-underline text-white hover:text-gray-300">Login</a>
                    <a href="{{ route('register') }}"
                        class=" no-underline hover:no-underline bg-white text-blue-500 hover:bg-gray-200 py-2 px-4 rounded-full transition duration-300">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
