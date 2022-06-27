<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Page</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link href="{{asset('image/logo.svg')}}" rel="shortcut icon" type="image/png" sizes="20x20"/>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<section x-data="initAlpine" class="h-screen bg-primary-blue/5 flex justify-center items-center ">
    <div class="w-4/5 h-[90] bg-white shadow grid grid-cols-2 gap-20 rounded-lg overflow-hidden">
        {{-- Login Form --}}
        <template x-if="showLoginForm">
            <div class="p-24 space-y-10  ">
                <div class="space-y-2">
                    <p class="font-bold text-3xl">Login</p>
                    <p class="capitalize text-black/50 text-sm">see your growth and get consultation</p>
                </div>

                <form method="post" action="{{route('login-into-account')}}" class="space-y-5">
                    @csrf
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label for="email" class="">Email</label>
                            <input id="email" name="email" type="text" placeholder="eg: mail@black.com"
                                   class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="">Password</label>
                            <input name="password" id="password" type="password" placeholder="Min.8 character"
                                   class="w-full outline-none focus:ring-0 text-sm py-3 focus:border-black/10 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                        </div>
                        <div class="flex justify-between hidden text-xs items-center">
                            <div class="flex items-center space-x-2">
                                <input id="remember" type="checkbox" class="h-3 w-3 outline-none">
                                <label for="remember" class=" font-semibold">Remember me</label>
                            </div>
                            <a href="#" class="font-semibold text-secondary-blue hover:underline">Forget Password?</a>
                        </div>

                        <div class="pt-5">
                            <button type="submit" class=" text-sm py-3 w-full text-white text-center bg-secondary-blue rounded-full">
                                Login
                            </button>
                        </div>

                        <div class="text-xs ´ font-semibold tracking-wide">
                            <p>Not yet registered? <span @@click="showLoginForm=false; showRegisterForm=true" class="cursor-pointer text-secondary-blue">Create an Account</span></p>
                        </div>
                    </div>
                </form>
            </div>
        </template>

        {{-- Registration Form --}}
        <template x-if="showRegisterForm">
            <div class="p-24 space-y-10  ">
                <div class="space-y-2">
                    <p class="font-bold text-3xl">Register Account</p>
                    <p class="capitalize text-black/50 text-sm">see your growth and get consultation</p>
                </div>

                <div class="space-y-5">
                    <div class="space-y-4">
                        <form action="{{route('register-account')}}" method="post" class="space-y-4">
                            @csrf
                            <div class="">
                                <label for="email" class="">Full Name</label>
                                <input id="email" name="full_name" type="text" placeholder="eg: Gladdy Mataka"
                                       class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="">Phone Number</label>
                                <input id="email" name="phone_number" type="text" placeholder="eg: 0759144442"
                                       class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="">Email</label>
                                <input id="email" name="email" type="text" placeholder="eg: mail@black.com"
                                       class="w-full focus:border-black/10 focus:ring-0 outline-none text-sm py-3 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                            </div>

                            <div class="space-y-2">
                                <label for="password" class="">Password</label>
                                <input id="password" name="password" type="password" placeholder="Min.8 character"
                                       class="w-full outline-none focus:ring-0 text-sm py-3 focus:border-black/10 placeholder-gray-400/50 rounded-full border-[1px] border-black/10 outline-none" required>
                            </div>
                            <div class="flex justify-between text-xs hidden items-center">
                                <div class="flex items-center space-x-2">
                                    <input id="remember" type="checkbox" class="h-3 w-3 outline-none">
                                    <label for="remember" class=" font-semibold">Remember me</label>
                                </div>
                                <a href="#" class="font-semibold text-secondary-blue hover:underline">Forget Password?</a>
                            </div>

                            <div>

                                <button type="submit"
                                    class=" text-sm py-3 w-full text-white text-center bg-secondary-blue rounded-full">
                                    Register
                                </button>
                            </div>
                        </form>

                        <div class="text-xs font-semibold tracking-wide">
                            <p>Do you have an Account? <span @@click="showLoginForm=true; showRegisterForm=false" class="text-secondary-blue">Login</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div class="relative"
             style="background-image: url('https://news.uchicago.edu/sites/default/files/images/video-poster/2022-06/convocation-22-mortarboards.jpg')">
            <div class="absolute flex  justify-between flex-col inset-0 bg-secondary-blue/95 p-5">
                <div>
                    <img src="{{asset('image/Credit.svg')}}" alt="" class="h-[200px] ">
                </div>
                <div class="flex justify-end">
                    <img src="{{asset('image/search2.svg')}}" alt="" class="scale-75 h-[200px]">
                </div>
            </div>

            <div class="absolute inset-0 flex justify-center items-center">
                <div class="space-y-3">
                    <p class="text-4xl capitalize font-bold text-white">lost & found</p>
                    <p class="capitalize tracking-wide text-white/60">we bring you what you lost </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initAlpine(){
            return {
                showLoginForm: true,
                showRegisterForm: false,
            }
        }
    </script>

</section>
</body>
</html>
