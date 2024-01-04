@extends('layouts.indexAdmin')
@section('content')
<title>Admin Pages</title>

 <section class="min-h-screen bg-gray-900 flex flex-col md:flex-row">

    <!-- Sidebar -->
    <aside class="bg-gray-800 text-gray-300 w-1/5  min-h-screen">
        <div class="py-4 px-6">
            <h2 class="text-xl font-semibold">Dashboard</h2>
        </div>
        <div class="px-6 py-6 flex flex-col">
            <a href="{{ url('birjonAdmin') }}" class="my-4 text-gray-400 hover:text-gray-600 duration-300">Product</a>
            <a href="{{ url('/birjonAdminCategory') }}" class="my-4 text-gray-400 hover:text-gray-600 duration-300">Categoty</a>
        </div>
    </aside>

    

    <main class="flex-1 mt-[-1rem]">
       {{-- Alert Start --}}
        @if(session('success'))
        <div id="successAlert" class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 my-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button id="closeButton" onclick="closeAlert()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652a.5.5 0 0 1 0 .707L10.707 10l3.64 3.641a.5.5 0 0 1-.707.707L10 10.707l-3.641 3.64a.5.5 0 0 1-.707-.707L9.293 10 5.652 6.359a.5.5 0 0 1 .707-.707L10 9.293l3.641-3.64a.5.5 0 0 1 .707 0z"/>
                </svg>
            </button>
        </div>
        @endif


        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 5.652a.5.5 0 0 1 0 .707L10.707 10l3.64 3.641a.5.5 0 0 1-.707.707L10 10.707l-3.641 3.64a.5.5 0 0 1-.707-.707L9.293 10 5.652 6.359a.5.5 0 0 1 .707-.707L10 9.293l3.641-3.64a.5.5 0 0 1 .707 0z"/>
                    </svg>
                </span>
            </div>
        @endif
    {{-- Alert End --}}
    <!-- Start block -->
    
        {{-- Cateogory Tables --}}
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12 pt-20">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex-1 flex items-center space-x-2">
                        <h5>
                            <span class="text-white">All Category</span>
                        </h5>
                        <button type="button" class="group" data-tooltip-target="results-tooltip">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">More info</span>
                        </button>
                        <div id="results-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Showing 1-100 of 436 results
                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" placeholder="Search for products" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="javascript:void(0);" onclick="openModal('createCategorytModal')" type="button" id="createProductButton" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add product
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-center">
                                <th scope="col" class="p-4">No</th>
                                <th scope="col" class="p-4">Nama Category</th>
                                <th scope="col" class="p-4">Price Category/KM</th>
                                <th scope="col" class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $counter = 1; 
                            @endphp

                            
                            @foreach ($category as $item)
                                
                            
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 text-center">
        
                                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class=" mr-3">
                                        {{ $counter }}
                                    </div>
                                </td>
                               
                                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex text-center mr-3">
                                        {{ $item->name }}
                                    </div>
                                </td>

                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->price_per_km }}
                                </td>

                               
                               

                                
                                
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white hover:red-500">
                                    <div class="flex items-center space-x-4 ">
                                        <a  onclick="openModal('editCategorytModal')" type="button" data-drawer-target="drawer-update-product" data-drawer-show="drawer-update-product" aria-controls="drawer-update-product" class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-
                                        300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800  cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                            Edit
                                        </a>
                                        {{-- @foreach($pick as $pic)
                                        @endforeach
                                            <a href="{{ route('birjonAdmin.edit', $pic->id) }}">Edit</a> --}}
                                        

                                        <form action="{{ route('birjonAdminCategory.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you ready to delete this data')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                Delete
                                            </button>
                                        </form>
                                        
                                    </div>
                                </td>
                                @php $counter++; @endphp
                            </tr>   
                            @endforeach
                        </tbody>
                       
                    </table>
                    {{ $category->links() }}
                       
                </div>
                {{-- <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                </nav> --}}
            </div>
        </div>
    </main>
</section>

<section class="">
    <!-- Modal Create -->
    <div id="createCategorytModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900 bg-opacity-50 ">
        <div class="flex items-center justify-center">
            <div class="bg-white w-2/3 p-8 rounded shadow-lg ">
                <!-- Tombol untuk menutup modal -->
                <button onclick="closeModal('createCategorytModal')" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
    
                <!-- Form Create -->
                <section class="">
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
                </section>
                <div class="flex items-center justify-center mt-4">
                    <button onclick="closeModal('createCategorytModal')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="">
    <!-- Modal Create -->
    <div id="editCategorytModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900 bg-opacity-50 ">
        <div class="flex items-center justify-center">
            <div class="bg-white w-2/3 p-8 rounded shadow-lg ">
                <!-- Tombol untuk menutup modal -->
                <button onclick="closeModal('editCategorytModal')" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
    
                <!-- Form Create -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-4">Edit Data</h1>
    
                    <form action="{{ route('birjonAdminCategory.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
    
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-input w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                        </div>
    
                        <div class="mb-4">
                            <label for="price_per_km" class="block text-gray-700 font-bold mb-2">Price per Kilometer</label>
                            <textarea name="price_per_km" id="price_per_km" class="form-textarea w-full border-2 border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" rows="4">{{ $item->price_per_km }}</textarea>
                        </div>
    
            
                        <div class="flex item-center justify-center">
                            <button type="submit" class="bg-gray-800 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button onclick="closeModal('editCategorytModal')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Close
                    </button>
                </div>
                
            </div>
        </div>
    </div>

</section>

<script>
    function closeAlert() {
        const alert = document.getElementById('successAlert');
        alert.style.display = 'none';
    }

    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
    }
</script>
@endsection