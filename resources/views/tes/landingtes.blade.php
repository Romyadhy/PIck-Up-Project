@extends('layouts.indexFreont')
@section('content')

    <title>testes</title>

    <style>
        /* Any additional styles can go here */
        /* Override Leaflet's default size */
        #map {
            width: 900px;
            height: 400px;
        }

        /* Gaya untuk info box */
    .leaflet-routing-container {
        background-color: white; /* Latar belakang putih */
        border: 1px solid #ccc; /* Border abu-abu */
        padding: 10px; /* Padding untuk konten */
    }

    </style>

</head>
<section class="min-h-screen">
    
    <div class="flex items-center justify-center my-4">
        <label for="category" class="mr-2">Choose a Category:</label>
        <select id="category" onchange="updatePrice()">
            <option value="">Select Category</option>
            @foreach($tes as $category)
            
                <option value="{{ $category->id }}" data-price="{{ $category->price_per_km }}">{{ $category->name }}</option>
            @endforeach
        </select>

    </div>
    

    <section class="flex item-center justify-center my-12">
        <div id="map" class="max-w-full "></div>
        <div id="info" class="bg-white p-2 mx-4">
            <h2 class="text-2xl font-bold">Price Info</h2>
            <p id="price" class="font-bold"></p>
            <p id="startEndInfo" class="text-sm"></p>
            <p id="routeInfo" class="text-sm"></p>
        </div>
        {{-- <div id="markerBox" class=" absolute top-[20rem] right-8 bg-white p-4 shadow-md">
        <div id="markerIcon" class="cursor-move">
            <i class="fas fa-map-marker-alt"></i>
        </div> --}}
    </div>
    </section>

    <!-- Tambahkan box untuk drag marker -->

    <div class="flex items-center justify-center my-4">
        <button class="px-5 py-2  text-sm font-medium leading-5 text-center text-black capitalize bg-white rounded-lg hover:bg-slate-200 lg:mx-0 lg:w-auto focus:outline-none " onclick="fullScreen()">See in Fullscreen</button>
    </div>

    
    

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script> --}}


    <script>

            const map = L.map('map').setView([-8.409518, 115.188919], 10); // Centered around Bali

            L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(map);

            // Tambahkan kontrol layer
            const streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            });

            const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 17,
                attribution: 'Tiles © Esri — Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            });

            const terrainLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                maxZoom: 17,
                attribution: 'Map data: &copy; OpenTopoMap contributors'
            });

            // Daftar layer-layer yang ingin ditampilkan pada kontrol layers
            const baseLayers = {
                "Street": streetLayer,
                "Satellite": satelliteLayer,
                "Terrain": terrainLayer
            };

            // Tambahkan kontrol layers ke peta
            L.control.layers(baseLayers).addTo(map);







            // SCALE
            L.control.scale().addTo(map);
            // FULLSCREEN
            var mapId = document.getElementById('map');
            function fullScreen(){
                mapId.requestFullscreen();
            }
            
            

            // Panggil data koordinat dari database
            $.getJSON('/tesCoor', function(data) {
                    console.log(data);

                    data.forEach(coordinate => {
                    const marker = L.marker([parseFloat(coordinate.latitude), parseFloat(coordinate.longitude)]).addTo(map)
                    
                    marker.bindPopup(`
                    <b>${coordinate.name}</b>
                    <br><b>${coordinate.address}</b>
                    <br><a href="{{ url('/landing') }}">See Details</a>`
                    
                    , {
                    maxWidth: 200  // Atur maxWidth sesuai kebutuhan Anda
                    }).openPopup();
                
                });

                const searchControl = L.Control.geocoder({
                    defaultMarkGeocode: false,
                    geocoder: L.Control.Geocoder.nominatim(),
                    placeholder: 'Search...', // Teks placeholder untuk pencarian
                    collapsed: true, // Apakah kotak pencarian diperkecil secara default
                    position: 'topright', // Atur posisi tombol pencarian
                    showResultIcons: true, // Tampilkan ikon hasil pencarian
                    defaultMarkGeocode: false, // Nonaktifkan marka default
                }).addTo(map);

            // Tambahkan ikon Font Awesome ke dalam kotak pencarian
            const searchIcon = L.DomUtil.create('div', 'leaflet-routing-icon leaflet-bar-part leaflet-bar-part-top-and-bottom fas fa-search');
            searchControl.getContainer().firstChild.appendChild(searchIcon);


            



             //Tes tt
        let startMarker, endMarker, routingControl;

            function onMapClick(e) {
                if (!startMarker) {
                    startMarker = L.marker(e.latlng).addTo(map);
                    startMarker.on('dragend', calculateRoute);
                } else if (!endMarker) {
                    endMarker = L.marker(e.latlng).addTo(map);
                    endMarker.on('dragend', calculateRoute);
                    calculateRoute();
                } else {
                    map.removeControl(routingControl);
                    startMarker.setLatLng(e.latlng);
                    endMarker = null;
                }
            }

            function calculateRoute() {
                if (startMarker && endMarker) {
                    const waypoints = [
                        startMarker.getLatLng(), // Titik awal
                        endMarker.getLatLng()   // Titik akhir
                    ];

                    // Hapus rute sebelumnya jika ada
                    if (routingControl) {
                        map.removeControl(routingControl);
                    }

                    // Membuat objek Routing Control dengan waypoints yang telah ditentukan
                    routingControl = L.Routing.control({
                        waypoints: waypoints,
                        routeWhileDragging: true // Memperbarui rute saat marker digeser
                    }).addTo(map);

                    // Ambil koordinat titik awal dan akhir
                    const startPoint = startMarker.getLatLng();
                    const endPoint = endMarker.getLatLng();

                    // Tambahkan informasi titik awal dan akhir ke dalam info box
                    const startEndInfo = document.getElementById('startEndInfo');
                    startEndInfo.innerHTML = `Start Point: Lat ${startPoint.lat}, Lng ${startPoint.lng}<br>End Point: Lat ${endPoint.lat}, Lng ${endPoint.lng}`;

                    

                    // Event listener untuk menangkap rute yang dipilih
                    routingControl.on('routesfound', function (e) {
                        const routes = e.routes;
                        const route = routes[0]; // Mengambil rute pertama (dalam kasus satu rute)

                        // const pricePerKilometer = 10; // Ganti dengan harga per kilometer yang diinginkan
                        const categoryDropdown = document.getElementById('category');
                        const selectedCategory = categoryDropdown.options[categoryDropdown.selectedIndex];
                        const pricePerKm = parseFloat(selectedCategory.getAttribute('data-price'));


                        const distance = route.summary.totalDistance / 1000; // Jarak dalam kilometer
                        const totalPrice = distance * pricePerKm;

                        

                        // Tampilkan informasi harga
                        const priceInfo = document.getElementById('price');
                        priceInfo.innerHTML = `Total distance: ${distance.toFixed(2)} km<br>Total price: Rp ${totalPrice.toFixed(2)}`;
                    });
                    // Menghapus marker jika sudah ada sebelumnya
                    if (startMarker) {
                        map.removeLayer(startMarker);
                        startMarker = null;
                    }
                    if (endMarker) {
                        map.removeLayer(endMarker);
                        endMarker = null;
                    }
                }
            }

            map.on('click', onMapClick);




});


    </script>
    

</section>
@endsection