@extends('layouts.indexFreont')
@section('content')
<title>Product Pages</title>

<section>
    <div class="container mx-auto grid md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16 items-center justify-center">
        <div class="text-center md:hidden">
            <button class="text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block md:hidden" type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>

        <section class="col-span-3 m-[1rem]">
            <div class="flex items-center mb-4">
                <select name="sort" id="sort" class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm focus:ring-primary focus:border-primary border-2 rounded-md">
                    <option value="">Default sorting</option>
                    <option value="price-low-to-high">Price low to high</option>
                    <option value="price-high-to-low">Price high to low</option>
                    <option value="latest">Latest product</option>
                </select>
            </div>

            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-2 gap-6 text-center justify-center">
                @foreach ($picups as $picup)
                    <div class=" shadow rounded overflow-hidden group flex flex-col bg-white">
                        <div class="relative">
                            <img src="{{ asset('images/'.$picup->image) }}" alt="product" class="w-full" width="200px" height="200px">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="#" class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition" title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="#" class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition" title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <a href="#">
                                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                    {{ $picup->name }}
                                </h4>
                            </a>
                        </div>
                        <div class="flex items-center justify-center">
                            <a href="{{ route('detil.show', $picup->id) }}" class="block w-full py-1 text-center text-black bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition hover:bg-gray-500">
                                See Detail
                            </a>
                        </div>
                    
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</section>

@endsection
