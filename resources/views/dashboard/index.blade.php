<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link href="{{asset('image/logo.svg')}}" rel="shortcut icon" type="image/png" sizes="20x20"/>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
@include('_partials.svg-icons')
<section x-data="initAlpine" class="h-screen flex overflow-hidden relative">
    @include('dashboard.sidebar')

    <div class="main-area h-full overflow-y-auto">
        @include('dashboard.main-area.header')

        @yield('main-area')
    </div>


    <template x-if="openModal">
       <div  class="absolute inset-0  bg-black/40 flex justify-center items-center top-0 z-50">

           <!-- Details View -->
           <template x-if="openDetails">
               <div class="bg-white rounded-md  relative overflow-hidden grid grid-cols-2 w-3/6 h-3/6">
                   <div class=" flex justify-center p-2  overflow-hidden my-3 h-full items-center ">
                       <img :src="baseURL+selectedItem.image_url" class="object-cover " alt="">
                   </div>
                   <div class="p-6 text-sm space-y-5">
                       <div class="pt-6">
                           <p class="text-2xl font-semibold tracking-wide">Items Details</p>
                       </div>

                       <div class="space-y-4">
                           <div class="space-y-1">
                               <p class="text-black/60">Owner: <span class="text-black">Bonny Kato</span></p>
                               <p class="text-black/60">Lost On: <span class="text-black">12 March 2022</span></p>
                               <p class="text-black/60">Location: <span x-text="selectedItem.location" class="text-black"></span></p>
                               <p class="text-black/60">Status: <span x-text="selectedItem.status" class="text-black capitalize"></span></p>
                           </div>

                           <div class="space-y-1">
                               <p>Description</p>
                               <p x-text="selectedItem.description" class="text-sm bg-gray-100 text-black/75 rounded p-2">

                               </p>
                           </div>
                       </div>

                       <div>
                           <button class="bg-secondary-blue hover:bg-secondary-blue/80 tracking-wide text-white px-3 py-3 w-full text-sm rounded">Claim</button>
{{--                           <button class="bg-red-500/20 text-red-500 hover:bg-secondary-blue/80 tracking-wide  pointer-events-none px-3 py-3 w-full text-sm rounded">Clammed</button>--}}
                       </div>

                       <!-- close button -->
                       <div @@click="openModal=false; openDetails=false;clearDetails() " class="absolute -top-3 right-5 cursor-pointer hover:bg-gray-200 h-8 w-8 flex justify-center ring-black items-center rounded-full">
                           <svg class="h-4 w-4 text-black/70 fill-current">
                               <use href="#close-icon" />
                           </svg>
                       </div>

                   </div>
               </div>
           </template>

           <!-- upload lost item form -->
           <template x-if="openForm">
               <div class="bg-white relative rounded-md relative overflow-hidden  w-3/6 h-[70%]">
                   <form class="grid h-full grid-cols-2" action="{{route('upload-lost-item')}}" enctype="multipart/form-data" method="post">
                       @csrf
                       <div class=" h-full">
                           <label class="">
                               <input onchange="previewImage(event)" type="file" name="image" id="selected_item_image" class="hidden" required>
                               <div class=" h-full flex cursor-pointer group justify-center items-center relative w-full">
                                   <img id="image-previewer" src="https://i.pinimg.com/564x/35/09/52/35095299bd61414b41caec316ee7f761.jpg" class="object-cover" alt="">
                                   <div class="absolute  group-hover:flex hidden bg-gradient-to-r from-secondary-blue/50 to-transparent pointer-events-none  inset-0  justify-center items-center">
                                       <div>
                                           <button class="bg-secondary-blue px-4 py-3 text-sm rounded-full text-white ">Upload Image</button>
                                       </div>
                                   </div>
                               </div>
                           </label>
                       </div>
                       <div class="p-12">
                       <p class="text-xl font-semibold ">Upload Lost Items</p>
                       <div  class="space-y-4 mt-10">
                           <div class="space-y-2">
                               <label>
                                   <input name="name" type="text" placeholder="Items Name" class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                               </label>
                           </div>
                           <div class="space-y-2">
                               <label>
                                   <input id="last_seen" name="last_seen" type="date" placeholder="Last Seen" class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                               </label>
                           </div>
                           <div class="space-y-2">
                               <label>
                                   <input id="location" type="text" name="location" placeholder="Location " class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                               </label>
                           </div>
                           <div class="space-y-2">
                               <label>
                                   <select name="status" id="" class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                                       <option  selected disabled value="">Choose Status</option>
                                       <option value="found">Found</option>
                                       <option value="lost">Lost</option>
                                   </select>
                               </label>
                           </div>
                           <div class="space-y-2">
                               <label for="description">
                                   <textarea style="resize:none" placeholder="Description" name="description" id="description" cols="30" rows="4" class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm  placeholder-gray-400/50 rounded-lg border-[1px] border-black/10 outline-none" required></textarea>
                               </label>
                           </div>
                           <div class="space-y-2">
                               <button onclick="validateForm()" class="text-sm py-3 w-full text-white text-center bg-secondary-blue rounded-full">Upload</button>
                           </div>
                   </div>
                   </form>

                   <div @@click="openModal=false; openForm=false"
                        class="absolute top-2 right-5 cursor-pointer hover:bg-gray-200 h-8 w-8 flex justify-center ring-black items-center rounded-full">
                       <svg class="h-4 w-4 text-black/70 fill-current">
                           <use href="#close-icon" />
                       </svg>
                   </div>
               </div>
           </template>


       </div>
   </template>

    <script>
        function previewImage (e){
           const image = document.getElementById('image-previewer');
            image.src = URL.createObjectURL(e.target.files[0]);
            URL.revokeObjectURL(image.src)
        }


        function initAlpine(){
            return {
                openModal: false,
                openDetails: false,
                openForm: false,
                selectedItem: "",
                baseURL:"http://localhost:8000/images/categories/",
                {{--lostItems: {!! json_encode($items, JSON_HEX_TAG) !!},--}}
                {{--getDetails(itemId){--}}
                {{--    this.selectedItem  = this.lostItems.filter(item => item.id===itemId)[0];--}}
                {{--},--}}
                {{--clearDetails(){--}}
                {{--    this.selectedItem = "";--}}
                {{--}--}}
            }
        }

        function validateForm() {
            const selectedImage = document.getElementById("selected_item_image");
            if (selectedImage == null || selectedImage == "" || selectedImage.files.length == 0) {
                alert("Please select an image to continue...");
            }
        }
    </script>
</section>
</body>
</html>
