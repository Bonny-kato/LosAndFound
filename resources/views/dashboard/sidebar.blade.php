<aside class="h-full space-y-20 w-[240px] p-5  border-gray-300 shadow">
    <div class="text-2xl font-bold "><span class="text-red-500">Lost</span> & <span class="text-secondary-blue">Found</span></div>
    <div class=" space-y-10">

        {{-- <div class="flex items-center space-x-3">
            <div class="h-6 w-6 flex justify-center items-center bg-gradient-to-bl rounded-full from-secondary-blue to-indigo-400">
                <svg class="h-4 text-white fill-current">
                    <use href="#scroll-iconphp" />
                </svg>
            </div>

            <span class="tracking-wide">Home</span>
        </div> --}}

{{--        @auth()--}}

        @if (auth()->user()->account_type == "admin")
        <a href="{{ route("admin-dashboard") }}" class="flex items-center cursor-pointer space-x-3">
            <div class="h-6 w-6 flex justify-center  items-center bg-gradient-to-bl rounded-full from-secondary-blue to-indigo-400">
                <svg class="h-4 text-white fill-current">
                    <use href="#add-icon" />
                </svg>
            </div>

            <span  class="tracking-wide">Lost Items</span>
        </a>
        <a href="{{ route("show-users") }}" class="flex items-center cursor-pointer space-x-3">
            <div class="h-6 w-6 flex justify-center  items-center bg-gradient-to-bl rounded-full from-secondary-blue to-indigo-400">
                <svg class="h-4 text-white fill-current">
                    <use href="#add-icon" />
                </svg>
            </div>

            <span  class="tracking-wide">Users</span>
        </a>
        @else
        <a href="{{ route("dashboard") }}" class="flex items-center cursor-pointer space-x-3">
            <div class="h-6 w-6 flex justify-center  items-center bg-gradient-to-bl rounded-full from-secondary-blue to-indigo-400">
                <svg class="h-4 text-white fill-current">
                    <use href="#add-icon" />
                </svg>
            </div>

            <span  class="tracking-wide">All Items</span>
        </a>
        <a href="{{ route("my-items") }}" class="flex items-center cursor-pointer space-x-3">
            <div class="h-6 w-6 flex justify-center  items-center bg-gradient-to-bl rounded-full from-secondary-blue to-indigo-400">
                <svg class="h-4 text-white fill-current">
                    <use href="#add-icon" />
                </svg>
            </div>

            <span  class="tracking-wide">My Items</span>
        </a>
        @endif
{{--        @endauth--}}

            {{-- @auth
            <a href="{{route('my-items')}}" class="pt-5">
                <div class="flex items-center space-x-3 w-full ">
                    <div>
                        <svg class="h-5 w-5 text-indigo-400 fill-current">
                            <use href="#collection-icon" />
                        </svg>
                    </div>

                    <span class="tracking-wide">My Items</span>
                </div>
            </a>
            @endauth --}}
    </div>
</aside>
