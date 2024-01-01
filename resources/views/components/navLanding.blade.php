 <!-- navbar -->
 <nav class="bg-gray-800 flex items-center justify-center">
    <div class="container flex">
        <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
            <div class="flex items-center space-x-6 capitalize">
                <a href="#">
                    <h2 class="font bold text-2xl text-gray-200">Picup<span class="text-gray-500">Pal</span></h2>
                </a>
                <a href="{{ url('/') }}" class="text-gray-200 hover:text-white transition">Home</a>
                <a href="{{ url('/birjonFront') }}" class="text-gray-200 hover:text-white transition">Product</a>
                <a href="{{url('/birjon')}}" class="text-gray-200 hover:text-white transition">Maps</a>
                <a href="{{ url('/#about') }}" class="text-gray-200 hover:text-white transition">About us</a>
                {{-- <a href="" class="text-gray-200 hover:text-white transition">Contact us</a> --}}
            </div>
            <div class="w-full max-w-xl relative flex mr-4">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fas fa-search"></i> <!-- Ikon search -->
                </span>
                <input type="text" name="search" id="search"
                    class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md hidden md:flex focus:outline-none"
                    placeholder="search">
                <button class="bg-primary border border-primary text-white px-2 py-2 rounded-r-md hover:bg-transparent hover:text-primary transition md:flex hidden">
                    Search
                </button>
            </div>
            {{-- <a href="" class="text-gray-200 hover:text-white transition pr-14">Login</a> --}}
        </div>
    </div>
</nav>
