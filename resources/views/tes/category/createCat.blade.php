@extends('layouts.indexAdmin')
@section('content')
<title>Create Pages</title>
<section class="min-h-screen bg-gray-900">
    <div class=" mx-[5rem] cursor-pointer ">
        <a href="{{ url('/birjonAdminCategory') }}">
            <i class="fas fa-arrow-left text-white hover:text-slate-400"></i> <!-- Ikon panah kembali -->
        </a>
    </div>
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold mb-4">Create Data Category</h1>

                <form action="{{ route('birjonAdminCategory.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" class="form-input w-full border-2 border-slate-300">
                    </div>

                    <div class="mb-4">
                        <label for="price_per_km" class="block text-gray-700 font-bold mb-2">Price per Kilometer</label>
                        <textarea name="price_per_km" id="price_per_km" class="form-textarea w-full border-2 border-slate-300" rows="4"></textarea>
                    </div>

                    <div class="flex item-center justify-center">
                        <button type="submit" class="bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                             Submit
                        </button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection

