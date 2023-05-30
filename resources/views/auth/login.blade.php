<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements"></script>
<link href="/dist/tailwind.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<div class="min-h-screen bg-purple-800 flex justify-start items-center">
    <div class="h-screen py-12 px-16 bg-white z-20 w-100 flex flex-col justify-center"> <!-- Updated class: flex flex-col justify-center and increased px-12 to px-16, width set to 70% -->
        <div>
            <h1 class="text-3xl font-bold text-left mb-14 cursor-pointer">Hulajnogi!</h1>

            <h1 class="text-4xl font-bold text-left mb-4 cursor-pointer">Welcome back</h1>
            <p class="w-80 text-start text-sm mb-8 font-semibold text-gray-700 tracking-wide cursor-pointer">New to Hulajnogi? <a href="#" class="text-purple-800 font-bold">Create an account.</a></p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="space-y-4">
            <label for="email" class="block
             text-sm font-bold text-gray-700 tracking-wide mb-1">Email</label>
            <input id="email" type="text" placeholder="Email Addres" class=" form-control @error('email') is-invalid @enderror block text-sm py-3 px-4 rounded-lg w-full border outline-none" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <label for="password" class="block text-sm font-bold text-gray-700 tracking-wide mb-1">Password</label>
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror block text-sm py-3 px-4 rounded-lg w-full border outline-none" name="password" required autocomplete="current-password"/>

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>                    <label for="remember" class="text-sm font-bold text-gray-700">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-sm font-bold  text-purple-800" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="text-center mt-6 space-y-2">
            <button type="submit" class="w-full">
            <a class="relative inline-flex items-center justify-center w-full p-4 px-5 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out rounded-full shadow-xl group hover:ring-1 hover:ring-purple-500">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-600 via-purple-600 to-pink-700"></span>
                <span class="absolute bottom-20 right-5 block w-80 h-80 mb-10 mr-30 transition duration-500 origin-bottom-left transform rotate-45 translate-x-0 bg-pink-500 rounded-full opacity-30 group-hover:rotate-90 group-hover:scale-125 ease"></span>
                <span class="relative text-white"> {{ __('Login') }}</span>
            </a>
            </button>



            <button class="py-2 w-full text-xl text-black bg-white border border-black rounded-2xl">Register</button>
        </div>
        </form>
    </div>
    <div id="default-carousel" class="h-auto max-h-screen relative w-full border-8 border-white overflow-y-hidden" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-screen overflow-hidden">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/unsplash1.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/unsplash2.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/unsplash6.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/unsplash4.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/unsplash5.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
    </div>


</div>
