<nav class="sticky top-0 flex justify-between items-center px-10 py-5 
            bg-black/50 backdrop-blur-md shadow-lg w-full z-50">

    <a href="/" class="text-2xl font-bold text-blue-400">
        EasyColoc
    </a>

    <div class="space-x-6 flex items-center text-gray-200">

        @auth
            <a href="{{ url('/dashboard') }}" 
               class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 
                      transition duration-300">
               Dashboard
            </a>

            <a href="{{ route('profile.edit') }}" 
               class="hover:text-blue-400 transition duration-300">
               Profil
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" 
                        class="hover:text-red-400 transition duration-300 text-sm">
                    Logout
                </button>
            </form>

        @else
            <a href="{{ route('login') }}" 
               class="hover:text-blue-400 transition duration-300">
               Login
            </a>

            <a href="{{ route('register') }}" 
               class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 
                      transition duration-300">
               Register
            </a>
        @endauth

    </div>
</nav>