@extends('layouts.indexFreont')
@section('content')
<title>Product Pages</title>

<section class="bg-white ">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl text-center">All Information Pick Up</h1>

        <div class="grid grid-cols-1 gap-8 ml-16 my-8 md:mt-16 md:grid-cols-2">
        @foreach ($pic as $item)        
        <div class="lg:flex">
            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('images/'.$item->image) }}" alt="">

            <div class="flex flex-col justify-between py-6 lg:mx-6">
                <h1  class="text-xl font-semibold text-gray-800   ">
                    {{ $item->name}}
                </h1>
                <h1  class="text-sm font-semibold text-gray-800   ">
                    Cataegoty: {{ $item->category->name}}
                </h1>
                <span class="text-sm text-gray-500 ">Time: {{ $item->start_time }}-{{ $item->end_time }} </span>

                <a href="{{ route('detilpro.show', $item->id) }}" class="border-2 text-center bg-gray-700  py-2 hover:bg-gray-500 hover:duration-300 text-white rounded-xl">
                    <div class="cursor-pointer">See Detail</div>
                </a>
                
               
            </div>
           
        </div>
            @endforeach

           
        </div>
    </div>
</section>

@endsection
