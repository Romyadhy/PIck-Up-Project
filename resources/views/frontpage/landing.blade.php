@extends('layouts.indexFreont')
@section('content')
<title>Home Pages</title>

<header class="bg-gray-200 ">

    <div class="lg:flex">
        <div class="flex items-center justify-center w-full px-6 py-8 lg:h-[32rem] lg:w-1/2">
            <div class="max-w-xl">
                <h2 class="text-3xl font-bold italic text-amber-500  lg:text-4xl">PicupPal</h2>

                <p class="mt-4 text-sm text-black  lg:text-base">
                    Welcome to our pickup car rental service, PickupPal. Practical solutions for hassle-free moving. </p>

                <div class="flex flex-col mt-6 space-y-3 lg:space-y-0 lg:flex-row">
                    <a href="{{ url('/birjonFront') }}" class="block px-5 py-2 text-sm font-medium tracking-wider text-center text-white transition-colors duration-300 transform bg-gray-900 rounded-md hover:bg-gray-700">Explore Product</a>
                    <a href="#about" class="block px-5 py-2 text-sm font-medium tracking-wider text-center text-white transition-colors duration-300 transform bg-amber-500 rounded-md lg:mx-4 hover:bg-amber-600">Learn More ></a>
                </div>
            </div>
        </div>

        <div class="w-full h-64 lg:w-1/2 lg:h-auto my-[5rem]">
            <div class="w-full h-full bg-cover" style="background-image: url(https://images.moneycontrol.com/static-mcnews/2020/12/maruti-suzuki-super-carry-72483_-770x433.jpg?impolicy=website&width=770&height=431)">
                <div class="w-full h-full bg-black opacity-25"></div>
            </div>
        </div>
    </div>
</header>

<section class="bg-white " id="about">
    <div class="container px-6 py-10 mx-auto">
        <div class="text-center mb-[5rem]">
            <h1 class="text-4xl font-semibold ">About <span class="text-amber-500 ">Us</span></h1>
        </div>
        <div class="lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover object-center lg:w-1/2 lg:mx-6 w-full h-96 rounded-lg lg:h-[36rem]" src="https://nitorentcar.com/assets/img/nitorentpickup-6.jpeg" alt="">
            <div class="mt-8 lg:w-1/2 lg:px-6 lg:mt-0">

                <h1 class="text-2xl font-semibold text-gray-800  lg:text-3xl lg:w-96">
                    Confused looking for a vehicle? PickupPal is the solution!
                </h1>

                <p class="max-w-lg mt-6 text-gray-500  ">
                    PickupPal car rental is a service that allows you to rent pickup-type vehicles to move your belongings when you want to move house. This website provides an online platform that makes it easy for you to search, book, and pay for pickup car rental quickly and easily.
                    <br>By using this service, you can rent a pickup car according to your needs and duration of time. Pickup cars are usually equipped with a large enough cargo space, making them suitable for transporting household items during the moving process.
                    <br>These websites can display a wide selection of pickup cars from various service providers, providing information on rental rates, insurance options, and other requirements. In addition, some platforms may also provide scheduling features, order tracking, and reviews from previous users to help you make a more informed decision.
                    <br>With this pickup car rental, you can save time and effort in the moving process, making it more efficient and convenient.
                </p>
                <div class="flex items-center justify-between mt-12 lg:justify-start">
                   
                </div>
            </div>
        </div>
    </div>
</section>
    

@endsection