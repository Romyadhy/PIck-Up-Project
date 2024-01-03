@extends('layouts.indexFreont')
@section('content')
<title>Home Pages</title>

<header class="bg-white ">
    {{-- <nav x-data="{ isOpen: false }" class="px-6 py-4 shadow">
        <div class="lg:items-center lg:justify-between lg:flex">
            <div class="flex items-center justify-between">
                <a href="#" class="mx-auto ">
                    <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                </a>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>
                
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white shadow-md lg:bg-transparent lg:dark:bg-transparent lg:shadow-none dark:bg-gray-900 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                <a href="#" class="block px-3 py-2 text-gray-600 rounded-lg dark:text-gray-200 hover:bg-gray-100 lg:mx-2">Home</a>
                <a href="#" class="block px-3 py-2 text-gray-600 rounded-lg dark:text-gray-200 hover:bg-gray-100 lg:mx-2">About</a>
                <a href="#" class="block px-3 py-2 text-gray-600 rounded-lg dark:text-gray-200 hover:bg-gray-100 lg:mx-2">Contact</a>
            </div>
        </div>
    </nav> --}}

    <div class="lg:flex">
        <div class="flex items-center justify-center w-full px-6 py-8 lg:h-[32rem] lg:w-1/2">
            <div class="max-w-xl">
                <h2 class="text-3xl font-semibold text-gray-800  lg:text-4xl">Picup<span class="text-gray-600 ">Pal</span></h2>

                <p class="mt-4 text-sm text-gray-500  lg:text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi, quibusdam rem tempora voluptates.</p>

                <div class="flex flex-col mt-6 space-y-3 lg:space-y-0 lg:flex-row">
                    <a href="{{ url('/birjonFront') }}" class="block px-5 py-2 text-sm font-medium tracking-wider text-center text-white transition-colors duration-300 transform bg-gray-900 rounded-md hover:bg-gray-700">Explore Product</a>
                    <a href="#about" class="block px-5 py-2 text-sm font-medium tracking-wider text-center text-gray-700 transition-colors duration-300 transform bg-gray-200 rounded-md lg:mx-4 hover:bg-gray-300">Learn More</a>
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
            <h1 class="text-4xl font-semibold ">About <span class="text-gray-600 ">Us</span></h1>
        </div>
        <div class="lg:-mx-6 lg:flex lg:items-center">
           
            <img class="object-cover object-center lg:w-1/2 lg:mx-6 w-full h-96 rounded-lg lg:h-[36rem]" src="https://nitorentcar.com/assets/img/nitorentpickup-6.jpeg" alt="">

            <div class="mt-8 lg:w-1/2 lg:px-6 lg:mt-0">
                <p class="text-5xl font-semibold text-gray-500 ">“</p>

                <h1 class="text-2xl font-semibold text-gray-800  lg:text-3xl lg:w-96">
                    Ｗｅｌｃｏｍｅ ｔｏ ＰｉｃｕｐＰａｌ
                </h1>

                <p class="max-w-lg mt-6 text-gray-500  ">
                    “ We are Typically Providing for pickups for moving houses, sudden trips, or delivering small goods. ”
                </p>

                {{-- <h3 class="mt-6 text-lg font-medium text-blue-500">Mia Brown</h3>
                <p class="text-gray-600 ">Marketing Manager at Stech</p> --}}

                <div class="flex items-center justify-between mt-12 lg:justify-start">
                   
                </div>
            </div>

            
        </div>
        
        {{-- Contack Us Section --}}
        <section class="bg-white py-20" id="contact">
            <div class="container mx-auto flex flex-col items-center">
                <h1 class="text-4xl font-semibold mb-8">Contact <span class="text-blue-600">Us</span></h1>
        
                <div class="lg:w-1/2">
                    <section class="ftco-section contact-section">
                        <div class="container">
                            <div class="row d-flex mb-5 contact-info">
                                <div class="col-md-4">
                                    <div class="row mb-5">
                                        <div class="col-md-12">
                                            <div class="border-2 w-100 p-4 rounded mb-2 d-flex">
                                                <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                                <span class="icon-map-o"></span>
                                                <p class="ml-2">Bali, Buleleng jln Udayana </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="border-2 w-100 p-4 rounded mb-2 d-flex">
                                                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                                <span class="icon-mobile-phone"></span>
                                                <p class="ml-2"><a href="tel://082146684989">+ 082146684989</a></p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="border-2 w-100 p-4 rounded mb-2 d-flex">
                                                <a href="mailto:undiksha@gmail.com" class="icon"> <i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                                <p> <a href="mailto:undiksha@gmail.com">undiksha@gmail.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        
                    <div class="">
                        <form action="#" class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-2xl font-semibold mb-6 text-center">Send Message</h2>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-600 font-semibold mb-2">Your Name</label>
                                <input type="text" id="name" name="name" class="w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-gray-500" placeholder="Your Name">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-600 font-semibold mb-2">Your Email</label>
                                <input type="email" id="email" name="email" class="w-full border-2  border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-gray-500" placeholder="Your Email">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-gray-600 font-semibold mb-2">Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="w-full border-2  border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-gray-500" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="bg-gray-500 border-2  text-white font-semibold py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Send</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>

        

          
        </div>
    </div>
</section>

@endsection