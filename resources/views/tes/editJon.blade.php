@extends('layouts.indexAdmin')
@section('content')
<title>Edit Page</title>
<section class="min-h-screen bg-gray-900">
    <div class=" mx-[5rem] cursor-pointer ">
        <a href="{{ url('/birjonAdmin') }}">
            <i class="fas fa-arrow-left text-white hover:text-slate-400"></i> <!-- Ikon panah kembali -->
        </a>
    </div>
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold mb-4">Edit Data</h1>

                <form action="{{ route('birjonAdmin.update', $pick->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ $pick->name }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                        <textarea name="description" id="description" class="form-textarea w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" rows="4">{{ $pick->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                        <input type="text" name="address" id="address" value="{{ $pick->address }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="no_tlp" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                        <input type="text" name="no_tlp" id="no_tlp" value="{{ $pick->no_tlp }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="start_time" class="block text-gray-700 font-bold mb-2">Start Time Work</label>
                        <input type="time" name="start_time" id="start_time" value="{{ $pick->start_time }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-gray-700 font-bold mb-2">End Time Work</label>
                        <input type="time" name="end_time" id="end_time" value="{{ $pick->end_time }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 font-bold mb-2">Category</label>
                        <select name="category_id" id="category_id" class="form-select w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $pick->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="map" style="height: 500px;"></div>

                    <div class="mb-4">
                        <label for="latitude" class="block text-gray-700 font-bold mb-2">Latitude</label>
                        <input type="text" name="latitude" id="latitude" value="{{ $pick->latitude }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="longitude" class="block text-gray-700 font-bold mb-2">Longitude</label>
                        <input type="text" name="longitude" id="longitude" value="{{ $pick->longitude }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>

                    {{-- <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
                        <input type="file" name="image" id="image" value="{{ asset('images/'.$pick->image) }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div> --}}

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Current Image</label>
                        <img src="{{ asset('images/'.$pick->image) }}" alt="Current Image" class="h-40 w-40 object-cover">
                    </div>
                    
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">New Image</label>
                        <input type="file" name="image" id="image" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    </div>
                    
                    <div class="flex item-center justify-center">
                        <button type="submit" class="bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    // Inisialisasi peta dengan view di Bali
    var map = L.map('map').setView([-8.409518, 115.188919], 10);

    // Tambahkan peta tile (misal: OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Tambahkan marker pada lokasi lama (old value)
    var oldLatitude = parseFloat("{{ $pick->latitude }}");
    var oldLongitude = parseFloat("{{ $pick->longitude }}");
    
    var marker = L.marker([oldLatitude, oldLongitude]).addTo(map);

    // var marker = L.marker([0, 0]).addTo(map);
    // map.on('click', function(e) {
    //     marker.setLatLng(e.latlng); // Set marker di titik yang diklik
    //     // Isi input latitude dan longitude di form dengan nilai baru
    //     document.getElementById('latitude').value = e.latlng.lat;
    //     document.getElementById('longitude').value = e.latlng.lng;
    // });

     // Hapus marker saat mengklik peta
     map.on('click', function(e) {
        if (marker) {
            map.removeLayer(marker); // Hapus marker lama
        }

        // Tambahkan marker baru di lokasi yang diklik pengguna
        marker = L.marker(e.latlng).addTo(map);
        
        // Isi input latitude dan longitude di form dengan nilai baru
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
    });
</script>


@endsection
