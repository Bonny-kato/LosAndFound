@extends('dashboard.index')
@section('main-area')
    <section class="p-5">
        <div class="py-10 px-5 space-y-5">
            <p class="font-semibold text-xl">My Items</p>
            <div class="grid grid-cols-3 gap-x-16 gap-y-5 ">

                @forelse($items as $item)
                    <div class=" cursor-pointer border group h-96 flex justify-center items-center relative rounded-xl overflow-hidden">
                        <img src="{{asset('images/categories/'.$item->image_url)}}" alt="">

                        <div class="absolute opacity-0 group-hover:opacity-100 items-center flex justify-center transition ease-in-out inset-0 bg-secondary-blue/50">
                            <div class="space-y-4">
                                <div class="space-y-2 flex flex-col items-center">
                                    <div class=" h-20 w-20 flex ring-4 ring-white/50 justify-center items-center bg-red-500 rounded-full overflow-hidden ">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="text-white font-semibold text-md tracking-wider">{{ $item->name }}</p>

                                        <div class="flex items-center space-x-1 text-white/90 tracking-wider">
                                            <svg class="h-4 w-4 fill-current">
                                                <use href="#map-marker-icon" />
                                            </svg>

                                            <p>{{$item->location}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-center">
                                    <a href="{{route('details', ['lostItem' => $item->id])}}" class="px-4 py-3 text-sm text-secondary-blue tracking-wider rounded-full font-semibold bg-white"> More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="h-96 flex items-center col-span-4 justify-center">
                        <p>No items</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection
