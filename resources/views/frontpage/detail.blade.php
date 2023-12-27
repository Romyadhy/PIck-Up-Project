<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Product</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.2.2/dist/esri-leaflet-vector.js"></script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.css">
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js"></script>

    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Pemanggilan Leaflet Routing Machine -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>

    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <style>
        /* Any additional styles can go here */
        /* Override Leaflet's default size */
        #map {
            width: 600px;
            height: 400px;
        }
    </style>
</head>
<body class="min-h-screen dark:bg-gray-900">
    <section class="mt-4">
        <div class="text-white mx-[5rem] ">
            <a href="{{ url('/landing') }}">
                <i class="fas fa-arrow-left"></i> <!-- Ikon panah kembali -->
            </a>
        </div>
        <div class="">
            <h1 class="font-bold text-center text-5xl text-white">Detail Product</h1>
        </div>
        
        <div class="container px-6 py-16 mx-auto text-center">
            <div class="max-w-lg mx-auto">
                @if($picup)
                    <h1 class="text-3xl font-semibold text-gray-800 dark:text-white lg:text-4xl">{{ $picup->name }}</h1>
                    <p class="mt-6 text-gray-500 dark:text-gray-300">{{ $picup->description }}</p>
                    
                    <p class="mt-3 text-sm text-gray-400 ">Address {{ $picup->address }}</p>
                    <p class="mt-3 text-sm text-gray-400 ">Info Contack {{ $picup->no_tlp }}</p>
                    <p class="mt-3 text-sm text-gray-400 "> {{ $picup->latitude }}</p>
                    <p class="mt-3 text-sm text-gray-400 "> {{ $picup->longitude }}</p>
                    <p class="mt-3 text-sm text-white">Picture</p>
                    <div class="flex justify-center mt-4">
                        <img class="object-cover w-full h-96 rounded-xl lg:w-4/5" src="{{ asset('images/'.$picup->image) }}" alt="imageProduct" />
                    </div>
                @endif
                
            </div>
    
        </div>

        <div class="text-white mb-4 text-center">
            <h2 class="font-semibold">See Location on Map</h2>
        </div>
        <section class="flex item-center justify-center ">
           
            <div id="map" class="max-w-full"></div>
            {{-- <div id="info" class="bg-gray-800 text-white p-4 text-center m-4">
                <h2 class="text-2xl">Price Info</h2>
                <p id="price" class="font-bold"></p>
            </div> --}}
        </section>

        <div class="flex item-center justify-center">
            <button class="px-5 py-2 my-12 text-sm font-medium leading-5 text-center text-white capitalize bg-blue-600 rounded-lg hover:bg-blue-500 lg:mx-0 lg:w-auto focus:outline-none ">
                Get Now!!!
            </button>
        </div>


        

    </section>  


<script>

        
        const map = L.map('map').setView([parseFloat({{ $picup->latitude }}), parseFloat({{ $picup->longitude }})], 12); // Centered around Bali

        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        // Menambahkan marker pada peta pada lokasi yang sesuai
        L.marker([parseFloat({{ $picup->latitude }}), parseFloat({{ $picup->longitude }})]).addTo(map)
    .bindPopup('<b>Picup</b> Car').openPopup();

    
        // L.Routing.control({
        //     waypoints: [
        //         L.latLng(-8.10454492003413,115.2008184367877), // Titik awal
        //         L.latLng(-8.12439942643114,115.1059073618016)  // Titik akhir (dengan longitude yang berbeda)
                
        //     ],
        // }).addTo(map);

        // let startMarker, endMarker;

        // function onMapClick(e) {
        //     if (!startMarker) {
        //         startMarker = L.marker(e.latlng).addTo(map);
        //         startMarker.on('dragend', calculateDistance);
        //     } else if (!endMarker) {
        //         endMarker = L.marker(e.latlng).addTo(map);
        //         endMarker.on('dragend', calculateDistance);
        //         calculateDistance();
        //         // Create route between start and end points
        //         L.Routing.control({
        //             waypoints: [
        //                 startMarker.getLatLng(), // Titik awal
        //                 endMarker.getLatLng()   // Titik akhir
        //             ],
        //         }).addTo(map);
        //     } else {
        //         // Jika sudah ada titik awal dan akhir, ganti titik awal dan hapus rute lama
        //         map.removeControl(map.routingControl);
        //         startMarker.setLatLng(e.latlng);
        //         endMarker = null;
        //     }
        // }
        // function calculateDistance() {
        //     const startPoint = startMarker.getLatLng();
        //     const endPoint = endMarker.getLatLng();

        //     const R = 6371; // Radius of the Earth in kilometers
        //     const latDiff = (endPoint.lat - startPoint.lat) * (Math.PI / 180);
        //     const lonDiff = (endPoint.lng - startPoint.lng) * (Math.PI / 180);
        //     const a =
        //         Math.sin(latDiff / 2) * Math.sin(latDiff / 2) +
        //         Math.cos(startPoint.lat * (Math.PI / 180)) * Math.cos(endPoint.lat * (Math.PI / 180)) *
        //         Math.sin(lonDiff / 2) * Math.sin(lonDiff / 2);
        //     const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        //     const distance = R * c; // Distance in kilometers

        //     // Harga per kilometer
        //     const pricePerKilometer = 10.000; // Ganti dengan harga per kilometer yang diinginkan

        //     // Hitung total harga berdasarkan jarak
        //     const totalPrice = distance * pricePerKilometer;

        //     const priceInfo = document.getElementById('price');
        //     priceInfo.innerHTML = `Total distance: ${distance.toFixed(2)} km<br>Total price: Rp ${totalPrice.toFixed(2)}`;
        // }


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
    
</body>
</html>




