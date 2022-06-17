<header class="py-4 shadow flex bg-white sticky top-0 z-50 items-center px-5 justify-between">
    <div></div>

    <!-- Search Box -->
    <div class="w-[300px] flex items-center h-10 rounded-full px-3 space-x-1 bg-black/5 overflow-hidden">
        <svg class="h-5 w-5 text-black/50">
            <use href="#search-icon" />
        </svg>
        <input placeholder="Search items" type="text" class="w-full px-1  tracking-wide text-sm outline-none bg-transparent border-none focus:ring-0 h-full">
    </div>


    <div class="flex items-center space-x-2 relative">
        @auth
            <div class="h-8 w-8 rounded-full overflow-hidden flex justify-center items-center">
                <img src="https://i.pinimg.com/474x/56/ce/5c/56ce5cf1623e3ee5d53ca85d156fcc98.jpg" alt="">
            </div>
        @endauth
        <p>
            @if(auth()->user())
                {{auth()->user()->name}}
            @else
                <span>Unknown</span>
                @endif
        </p>


        <div class="absolute top-full p-2  bg-white border w-[150px] right-0 shadow">
            @auth
            <a href="{{route('logout')}}" class="w-full ">
                <div class="py-1 pl-3 hover:bg-black/5">Logout</div>
            </a>
            @endauth

            @guest
                    <a href="{{route('login')}}" class="w-full ">
                        <div class="py-1 pl-3 hover:bg-black/5">Login</div>
                    </a>
            @endguest
        </div>


    </div>
</header>
