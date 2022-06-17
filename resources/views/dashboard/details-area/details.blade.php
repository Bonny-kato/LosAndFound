@extends('dashboard.index')
@section('main-area')

    <section class="px-10 pt-32 flex justify-center items-center">
        <div class="bg-white  border rounded relative overflow-hidden grid grid-cols-2 w-3/6 h-3/6">
            <div class=" flex justify-center p-2  overflow-hidden my-3 h-full items-center ">
                <img src="{{asset('images/categories/'.$item->image_url)}}" class="object-cover " alt="">
            </div>
            <div class="p-6 text-sm space-y-5">
                <div class="pt-6">
                    <p class="text-2xl font-semibold tracking-wide">Items Details</p>
                </div>

                <div class="space-y-4">
                    <div class="space-y-1">
                        <p class="text-black/60">Posted By: <span class="text-black pl-2">{{$item->user->name}}</span></p>
                        <p class="text-black/60">Lost On: <span class="text-black pl-2">{{$item->last_seen}}</span></p>
                        <p class="text-black/60">Location: <span  class="text-black pl-2"> {{$item->location}}</span></p>
                        <p class="text-black/60">Status: <span  class="text-black capitalize pl-2">{{$item->status}}</span></p>
                        <p class="text-black/60">Phone: <span  class="text-black capitalize pl-2">{{$item->user->phone_number}}</span></p>
                    </div>

                    <div class="space-y-1">
                        <p>Description</p>
                        <p  class="text-sm bg-gray-100 text-black/75 rounded p-2">
                            {{$item->description}}
                        </p>
                    </div>
                </div>

                <div>
                    @if($item->claimed)
                        <button class="bg-red-500/20 text-red-500 hover:bg-secondary-blue/80 tracking-wide  pointer-events-none px-3 py-3 w-full text-sm rounded">Clammed</button>
                        @else
                            <a href="{{route('claim', ['lostItem' => $item->id])}}">
                                <button class="bg-secondary-blue hover:bg-secondary-blue/80 tracking-wide text-white px-3 py-3 w-full text-sm rounded">Claim</button>
                            </a>
                    @endif

                </div>

                <!-- close button -->
                <a href="{{route("dashboard")}}" class="absolute -top-3 right-5 cursor-pointer hover:bg-gray-200 h-8 w-8 flex justify-center ring-black items-center rounded-full">
                    <svg class="h-4 w-4 text-black/70 fill-current">
                        <use href="#close-icon" />
                    </svg>
                </a>

            </div>
        </div>
    </section>
@endsection
