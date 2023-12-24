@extends('layouts.indexAdmin')
@section('content')
<title>Admin Pages</title>
<section class="min-h-screen bg-gray-900">
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8 ">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold mb-4">Create and Edit Data</h1>

                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" class="form-input w-full border-2 border-slate-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea name="description" id="description" class="form-textarea w-full border-2 border-slate-300" rows="4" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                        <input type="text" name="address" id="address" class="form-input w-full border-2 border-slate-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="no_tlp" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                        <input type="text" name="no_tlp" id="no_tlp" class="form-input w-full border-2 border-slate-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="latitude" class="block text-gray-700 font-bold mb-2">Latitude</label>
                        <input type="text" name="latitude" id="latitude" class="form-input w-full border-2 border-slate-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="longitude" class="block text-gray-700 font-bold mb-2">Longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-input w-full border-2 border-slate-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        <input type="file" name="image" id="image" class="form-input w-full border-2 border-slate-300" required>
                    </div>
                    <div class="flex item-center justify-center">
                        <button type="submit" class="bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Submit</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

