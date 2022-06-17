<aside class="h-full space-y-20 w-[240px] p-5  border-gray-300 shadow">
    <di class="text-2xl font-bold ">Lost & <span class="text-secondary-blue">Found</span></di>
    <div class=" space-y-10">
        @auth()
        <div @@click="openModal=true; openForm=true" class="flex items-center cursor-pointer space-x-3">
            <div class="h-6 w-6 flex justify-center  items-center bg-gradient-to-bl rounded-full from-secondary-blue to-indigo-400">
                <svg class="h-4 text-white fill-current">
                    <use href="#add-icon" />
                </svg>
            </div>

            <span  class="tracking-wide">Add Items</span>
        </div>
        @endauth

        <div class="flex items-center space-x-3">
            <div class="h-6 w-6 flex justify-center items-center bg-gradient-to-bl rounded-full from-secondary-blue to-indigo-400">
                <svg class="h-4 text-white fill-current">
                    <use href="#scroll-iconphp" />
                </svg>
            </div>

            <span class="tracking-wide">Explore</span>
        </div>

            @auth
        <div class="flex items-center space-x-3 w-full ">
            <div>
                <svg class="h-5 w-5 text-indigo-400 fill-current">
                    <use href="#collection-icon" />
                </svg>
            </div>

            <span class="tracking-wide">My Items</span>
        </div>
            @endauth
    </div>
</aside>
