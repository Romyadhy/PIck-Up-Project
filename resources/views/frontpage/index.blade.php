<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FrontPage Website</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
      <!-- navbar -->
      <nav class="bg-gray-800 flex items-center justify-center">
        <div class="container flex">
            <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
                <div class="flex items-center space-x-6 capitalize">
                    <a href="index.html">
                        <img src="../assets/images/logo.svg" alt="Logo" class="w-32">
                    </a>
                    <a href="../index.html" class="text-gray-200 hover:text-white transition">Home</a>
                    <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
                </div>
                <div class="w-full max-w-xl relative flex">
                    <span class="absolute left-4 top-3 text-lg text-gray-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" name="search" id="search"
                        class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md hidden md:flex focus:outline-none"
                        placeholder="search">
                    <button
                        class="bg-primary border border-primary text-white px-8 py-5 rounded-r-md hover:bg-transparent hover:text-primary transition md:flex hidden">Search</button>
                </div>
                <a href="login.html" class="text-gray-200 hover:text-white transition pr-14">Login</a>
            </div>
        </div>
    </nav>
    <!-- ./navbar -->

    <!-- shop wrapper -->
    <div class="container grid md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16  items-center justify-center">
        <!-- sidebar -->
        <!-- drawer init and toggle -->
        <div class="text-center md:hidden" >
            <button
                class="text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block md:hidden"
                type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                aria-controls="drawer-example">
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>
        <!-- products -->
        <div class="col-span-3 ">
            <div class="flex items-center mb-4">
                <select name="sort" id="sort"
                    class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option value="">Default sorting</option>
                    <option value="price-low-to-high">Price low to high</option>
                    <option value="price-high-to-low">Price high to low</option>
                    <option value="latest">Latest product</option>
                </select>

                <div class="flex gap-2 ml-auto">
                    <div
                        class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fa-solid fa-grip-vertical"></i>
                    </div>
                    <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-2 gap-6">
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Ryoumy
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">RP.150.000</p>
                            <p class="text-sm text-gray-400 line-through">RP.200.000</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star">1</i></span>
                                <span><i class="fa-solid fa-star">2</i></span>
                                <span><i class="fa-solid fa-star">3</i></span>
                                <span><i class="fa-solid fa-star">4</i></span>
                                <span><i class="fa-solid fa-star">5</i></span>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-black bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                </div>

                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Ryoumy
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">RP.150.000</p>
                            <p class="text-sm text-gray-400 line-through">RP.200.000</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star">1</i></span>
                                <span><i class="fa-solid fa-star">2</i></span>
                                <span><i class="fa-solid fa-star">3</i></span>
                                <span><i class="fa-solid fa-star">4</i></span>
                                <span><i class="fa-solid fa-star">5</i></span>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-black bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                </div>

                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Ryoumy
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">RP.150.000</p>
                            <p class="text-sm text-gray-400 line-through">RP.200.000</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star">1</i></span>
                                <span><i class="fa-solid fa-star">2</i></span>
                                <span><i class="fa-solid fa-star">3</i></span>
                                <span><i class="fa-solid fa-star">4</i></span>
                                <span><i class="fa-solid fa-star">5</i></span>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-black bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                </div>

                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Ryoumy
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">RP.150.000</p>
                            <p class="text-sm text-gray-400 line-through">RP.200.000</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star">1</i></span>
                                <span><i class="fa-solid fa-star">2</i></span>
                                <span><i class="fa-solid fa-star">3</i></span>
                                <span><i class="fa-solid fa-star">4</i></span>
                                <span><i class="fa-solid fa-star">5</i></span>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-black bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                </div>
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Ryoumy
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">RP.150.000</p>
                            <p class="text-sm text-gray-400 line-through">RP.200.000</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star">1</i></span>
                                <span><i class="fa-solid fa-star">2</i></span>
                                <span><i class="fa-solid fa-star">3</i></span>
                                <span><i class="fa-solid fa-star">4</i></span>
                                <span><i class="fa-solid fa-star">5</i></span>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-black bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                </div>
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                            Ryoumy
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">RP.150.000</p>
                            <p class="text-sm text-gray-400 line-through">RP.200.000</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star">1</i></span>
                                <span><i class="fa-solid fa-star">2</i></span>
                                <span><i class="fa-solid fa-star">3</i></span>
                                <span><i class="fa-solid fa-star">4</i></span>
                                <span><i class="fa-solid fa-star">5</i></span>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-black bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                </div>
            </div>
        </div>
        <!-- ./products -->
    </div>
    <!-- ./shop wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>