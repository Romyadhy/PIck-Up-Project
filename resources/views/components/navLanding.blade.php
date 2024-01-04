<!-- navbar -->
<nav class="bg-white flex items-center justify-center opacity-95 border-b-2 ">
    <div class="container flex">
        <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
            <div class="flex items-center space-x-6 capitalize">
                <a href="#" class="font-extrabold">
                    <h2 class="font bold text-2xl text-amber-500">PICKUP
                        <span class="text-amber-400 font-bold">PAL</span>
                    </h2>
                </a>
                <a href="{{ url('/') }}" class="text-neutral-800 hover:text-amber-400 transition">Home</a>
                <a href="{{ url('/birjonFront') }}" class="text-neutral-800 hover:text-amber-400 transition">Product</a>
                <a href="{{url('/birjon')}}" class="text-neutral-800 hover:text-amber-400 transition">Maps</a>
                <a href="{{ url('/#about') }}" class="text-neutral-800 hover:text-amber-400 transition">About us</a>
            </div>
        </div>
    </div>
</nav>