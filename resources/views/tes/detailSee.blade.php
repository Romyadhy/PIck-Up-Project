@extends('layouts.indexFreont')
@section('content')
<title>Detail Product</title>

<section>
   

    <section class="mt-4">
        <div class=" mx-[5rem] ">
            <a href="{{ url('/birjonFront') }}">
                <i class="fas fa-arrow-left"></i> <!-- Ikon panah kembali -->
            </a>
        </div>
        <div class="">
            <h1 class="font-bold text-center text-5xl">Detail Product</h1>
        </div>
        
        <div class="container px-6 py-16 mx-auto text-center">
            <div class="max-w-lg mx-auto">
                @if($pick)
                    <h1 class="text-3xl font-semibold text-gray-800 lg:text-4xl">{{ $pick->name }}</h1>
                    <p class="mt-6 text-gray-900">{{ $pick->description }}</p>
                    
                    <p class="mt-3 flex items-center text-sm text-gray-800">
                        <i class="fas fa-map-marker-alt mr-2"></i> Address: {{ $pick->address }}
                    </p>
                    
                    <p class="mt-3 flex items-center text-sm text-gray-800">
                        <i class="fas fa-phone-alt mr-2"></i> Info Contact: {{ $pick->no_tlp }}
                    </p>
                    
                    <p class="mt-3 flex items-center text-sm text-gray-800">
                        <i class="fas fa-map-pin mr-2"></i> Latitude: {{ $pick->latitude }}
                    </p>
                    
                    <p class="mt-3 flex items-center text-sm text-gray-800">
                        <i class="fas fa-map-pin mr-2"></i> Longitude: {{ $pick->longitude }}
                    </p>
                    
                    <p class="mt-3 flex items-center text-sm text-gray-800">
                        <i class="fas fa-tag mr-2"></i> Category: {{ $pick->category->name }}
                    </p>
                    
                    <p class="mt-3 text-sm text-white"><i class="fas fa-image mr-2"></i> Picture</p>
                    
                    <div class="flex justify-center mt-4">
                        <img class="object-cover w-1/2 h-96 rounded-xl lg:w-full" src="{{ asset('images/'.$pick->image) }}" alt="imageProduct" />
                    </div>
                @endif
            </div>
        </div>
        

        <div class="text-white mb-4 text-center">
            <h2 class="font-semibold">See Location on Map</h2>
        </div>
        <section class="flex item-center justify-center ">
            <div id="map" class="max-w-full "></div>
            <div id="info" class="bg-white p-2 mx-4">
                <h2 class="text-2xl font-bold">Price Info</h2>
                <p id="price" class="font-bold"></p>
                <p id="startEndInfo" class="text-sm"></p>
                <p id="routeInfo" class="text-sm"></p>
            </div>
            
        </section>

        <div class="flex items-center justify-center my-4">
            <button class="px-5 py-2  text-sm font-medium leading-5 text-center text-black capitalize bg-white rounded-lg hover:bg-slate-200 lg:mx-0 lg:w-auto focus:outline-none " onclick="fullScreen()">See in Fullscreen</button>
        </div>

        <div class="flex item-center justify-center">
            {{-- <button class="px-5 py-2 my-12 text-sm font-medium leading-5 text-center text-white capitalize bg-gray-600 rounded-lg hover:bg-gray-500 lg:mx-0 lg:w-auto focus:outline-none ">
                Get Now!!!
            </button> --}}

             <!-- Contoh tampilan di blade -->
    @if (Auth::check())
    <a href="{{ route('get.now') }}">Get Now</a>
    @else
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
    <a href="{{ url('/birjonAdmin') }}">Admin Login</a>
    @endif
        </div>



        

    </section>  
</section>
{{-- <script>

    const map = L.map('map').setView([parseFloat({{ $pick->latitude }}), parseFloat({{ $pick->longitude }})], 12); // Centered around Bali

    L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    // Menambahkan marker pada peta pada lokasi yang sesuai
    L.marker([parseFloat({{ $pick->latitude }}), parseFloat({{ $pick->longitude }})]).addTo(map)
    .bindPopup('<b>Picup</b> Car').openPopup();

    // Tambahkan kontrol layer
    const streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 50,
        attribution: '&copy; OpenStreetMap contributors'
    });

    const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 50,
        attribution: 'Tiles © Esri — Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });

    const terrainLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 50,
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
            // // FULLSCREEN
            
            var mapId = document.getElementById('map');
            function fullScreen(){
                mapId.requestFullscreen();
            }

  
    

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


        


            // map.addControl(new clearButton());
            
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

            

    







</script> --}}


<script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

<script>

        
    const map = L.map('map').setView([parseFloat({{ $pick->latitude }}), parseFloat({{ $pick->longitude }})], 12); // Centered around Bali

    L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    // Menambahkan marker pada peta pada lokasi yang sesuai
    L.marker([parseFloat({{ $pick->latitude }}), parseFloat({{ $pick->longitude }})]).addTo(map)
.bindPopup('<b>Picup</b> Car').openPopup();

    // Tambahkan kontrol layer
    const streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 50,
                attribution: '&copy; OpenStreetMap contributors'
            });

            const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 50,
                attribution: 'Tiles © Esri — Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            });

            const terrainLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                maxZoom: 50,
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
            
            const pricePerKm = parseFloat('{{ $pick->category->price_per_km }}'); // Ambil nilai price_per_km
            console.log("Price per kilometer: {{ $pick->category->price_per_km }}");

            if (!isNaN(pricePerKm)) {
                const distance = route.summary.totalDistance / 1000; // Jarak dalam kilometer
                const totalPrice = distance * pricePerKm;

                // Tampilkan informasi harga
                const priceInfo = document.getElementById('price');
                priceInfo.innerHTML = `Total distance: ${distance.toFixed(2)} km<br>Total price: Rp ${totalPrice.toFixed(2)}`;
            } else {
                // Tindakan yang diambil jika nilai pricePerKm tidak valid (misalnya, tampilkan pesan kesalahan)
                console.error('Nilai price_per_km tidak valid');
                const priceInfo = document.getElementById('price');
                priceInfo.innerHTML = 'Harga tidak tersedia';
            }
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

    // Memasang event listener untuk menangkap klik pengguna pada map
    map.on('click', onMapClick);























//     {{-- 
// <form>
//     <label for="messageSelect">Pilih Pesan:</label>
//     <select id="messageSelect" name="messageSelect">
//         <option value="pesan1">Pesan 1</option>
//         <option value="pesan2">Pesan 2</option>
//         <option value="pesan3">Pesan 3</option>
//     </select>
//     <br><br>
//     <button onclick="redirectToWhatsApp()">Pesan via WhatsApp</button>
// </form>

// <script>
//     function redirectToWhatsApp() {
//         var selectedMessage = document.getElementById('messageSelect').value;
//         var phoneNumber = '6283115942123'; // Ganti dengan nomor telepon yang valid

//         var messageText = '';

//         // Tentukan pesan yang sesuai berdasarkan pilihan select box
//         switch (selectedMessage) {
//             case 'pesan1':
//                 messageText = 'Pesan untuk pilihan 1';
//                 break;
//             case 'pesan2':
//                 messageText = 'Pesan untuk pilihan 2';
//                 break;
//             case 'pesan3':
//                 messageText = 'Pesan untuk pilihan 3';
//                 break;
//             default:
//                 messageText = 'Pesan default jika tidak ada pilihan yang dipilih';
//         }

//         // Encode pesan ke dalam URI dan buat URL WhatsApp
//         var encodedMessage = encodeURIComponent(messageText);
//         var whatsappURL = 'https://api.whatsapp.com/send?phone=' + phoneNumber + '&text=' + encodedMessage;

//         // Redirect ke URL WhatsApp
//         window.open(whatsappURL, '_blank');
//     }
//
   


</script>

@endsection