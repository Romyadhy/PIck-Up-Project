
@extends('layouts.indexFreont')
@section('content')
<title>Maps Product</title>

<style>
    /* Gaya untuk info box */
    .leaflet-routing-container {
        background-color: white; /* Latar belakang putih */
        border: 1px solid #ccc; /* Border abu-abu */
        padding: 10px; /* Padding untuk konten */
    }

    /* Gaya untuk petunjuk rute */
    .leaflet-routing-instructions {
        background-color: white; /* Latar belakang putih */
        border: 1px solid #ccc; /* Border abu-abu */
        padding: 5px; /* Padding untuk konten */
    }

    /* Gaya untuk tombol fullscreen */
    .fullscreen-button {
        border: 2px solid #000;
        padding: 10px 20px;
        background-color: #fff;
        color: #000;
        cursor: pointer;
        border-radius: 5px;
    }

</style>

<section class="bg-gray-100">

    <section  class="text-center">
        <div class="font-bold text-4xl my-4 mb-8">
            <h1>Maps Picup Pal</h1>
        </div>
    </section>

    <!-- Map container -->
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
        <button class="border-2 item-center font-semibold py-2 px-2 rounded-lg  " onclick="fullScreen()">See Fullscreen</button>
    </div>

    <section>
        
    </section>

    

<script>

        
        const map = L.map('map').setView([-8.409518, 115.188919], 10); // Centered around Bali

        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);
        // SCALE
        L.control.scale().addTo(map);
        // FULLSCREEN
        var mapId = document.getElementById('map');
        function fullScreen(){
            mapId.requestFullscreen();
        }
        //Search
        
        // Panggil data koordinat dari database
        $.getJSON('/globe', function(data) {
                console.log(data);

                data.forEach(coordinate => {
                const marker = L.marker([parseFloat(coordinate.latitude), parseFloat(coordinate.longitude)]).addTo(map)
                
                marker.bindPopup(`
                <b>${coordinate.name}</b>
                <br><img src="/images/${coordinate.image}" width="200" height="200">
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


    
        });

        

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

                    const pricePerKilometer = 10; // Ganti dengan harga per kilometer yang diinginkan

                    const distance = route.summary.totalDistance / 1000; // Jarak dalam kilometer
                    const totalPrice = distance * pricePerKilometer;

                    

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

        // Memasang event listener untuk menangkap klik pengguna pada map
        map.on('click', onMapClick);
        // var geocoder = L.Control.geocoder({
        //     defaultMarkGeocode: false
        //     })
        //     .on('markgeocode', function(e) {
        //         var bbox = e.geocode.bbox;
        //         var poly = L.polygon([
        //         bbox.getSouthEast(),
        //         bbox.getNorthEast(),
        //         bbox.getNorthWest(),
        //         bbox.getSouthWest()
        //         ]).addTo(map);
        //         map.fitBounds(poly.getBounds());
        //     })
        //     .addTo(map);











    

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
        //         map.removeLayer(endMarker);
        //         calculateDistance();
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
        //     const pricePerKilometer = 10; // Ganti dengan harga per kilometer yang diinginkan

        //     // Hitung total harga berdasarkan jarak
        //     const totalPrice = distance * pricePerKilometer;

        //     // const routeInfo = document.getElementById('routeInfo');
        //     // routeInfo.innerHTML = `Start Point: ${startPoint}<br>End Point: ${endPoint}`;

        //     const priceInfo = document.getElementById('price');
        //     priceInfo.innerHTML = `Total distance: ${distance.toFixed(2)} km<br>Total price: Rp ${totalPrice.toFixed(2)}`;

        //         // Event listener untuk menghapus marker saat di-click
        //     startMarker.on('click', function() {
        //         map.removeLayer(startMarker);
        //         startMarker = null;
        //         calculateDistance();
        //     });

        //     endMarker.on('click', function() {
        //         map.removeLayer(endMarker);
        //         endMarker = null;
        //         calculateDistance();
        //     });

        // }

        // // Memasang event listener untuk menangkap klik pengguna
        // map.on('click', onMapClick);


      

        //     let startMarker, endMarker;

        // function onMapClick(e) {
        //     if (!startMarker) {
        //         startMarker = L.marker(e.latlng).addTo(map);
        //         startMarker.on('dragend', calculateRoute);
        //     } else if (!endMarker) {
        //         endMarker = L.marker(e.latlng).addTo(map);
        //         endMarker.on('dragend', calculateRoute);
        //         calculateRoute();
        //     } else {
        //         map.removeControl(map.routingControl);
        //         startMarker.setLatLng(e.latlng);
        //         endMarker = null;
        //     }
        // }

        // function calculateRoute() {
        //     if (startMarker && endMarker) {
        //         const waypoints = [
        //             startMarker.getLatLng(), // Titik awal
        //             endMarker.getLatLng()   // Titik akhir
        //         ];

        //         // Hapus rute sebelumnya jika ada
        //         if (map.routingControl) {
        //             map.removeControl(map.routingControl);
        //         }

        //         // Membuat objek Routing Control dengan waypoints yang telah ditentukan
        //         map.routingControl = L.Routing.control({
        //             waypoints: waypoints,
        //             routeWhileDragging: true // Memperbarui rute saat marker digeser
        //         }).addTo(map);

        //         // Event listener untuk menangkap rute yang dipilih
        //         map.on('routeselected', function (e) {
        //             const route = e.route;
        //             const summary = route.summary;

        //             const pricePerKilometer = 10000; // Ganti dengan harga per kilometer yang diinginkan

        //             const distance = summary.totalDistance / 1000; // Jarak dalam kilometer
        //             const totalPrice = distance * pricePerKilometer;

        //             // Tampilkan informasi harga
        //             const priceInfo = document.getElementById('price');
        //             priceInfo.innerHTML = `Total distance: ${distance.toFixed(2)} km<br>Total price: Rp ${totalPrice.toFixed(2)}`;

        //             // Informasi rute (nama jalan, durasi, dsb.) tersedia di 'route'
        //             const instructions = route.instructions;
        //             // Lakukan sesuatu dengan informasi rute yang diperoleh
        //         });
        //     }
        // }

        // // Memasang event listener untuk menangkap klik pengguna pada map
        // map.on('click', onMapClick);



            // const marker = L.marker([-8.409518, 115.188919]).addTo(map) // Bali coordinates
            // .bindPopup('<b>Picup</b>Car').openPopup();


        // function onMapClick(e) {
        //     L.popup()
        //         .setLatLng(e.latlng)
        //         .setContent(`You clicked the map at ${e.latlng.toString()}`)
        //         .openOn(map);
        // } map.on('click', onMapClick);

        //ICON MARKER
        // var picupIcon = L.icon({
        //     iconUrl: 'https://img.icons8.com/?size=160&id=65480&format=png',

        //     iconSize:     [90, 90], // size of the icon
        //     iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        //     shadowAnchor: [4, 62],  // the same for the shadow
        //     popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        // });

        // L.marker([-8.409518, 115.188919], {icon: picupIcon}).addTo(map);


        // Penggunaan Tiles itu untuk mengubah layers dari mapsnya, seperti dibawah ini.
            // Streart
        

        //Hybrid
        // googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // });

            //Satelit
        // L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(map);

        //Terrain
        // L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(map);

        // Hybrid: s,h;
        // Satellite: s;
        // Streets: m;
        // Terrain: p;


</script>


</section>

@endsection
