<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>

<body>
    @extends('customer.header.header')
    @section('content')
        <div>
            <div class="px-4 sm:px-6 lg:px-48">
                <div class="w-full shadow-md border p-6">
                    <p class="text-lg uppercase font-semibold text-gray-500">Kategori</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
                        <div class="border p-3 text-center cursor-pointer hover:scale-105 transition-all bg-gray-100">
                            <div class="mb-2">
                                <img src="{{ asset('img/dress.svg') }}" alt="dress" class="w-16 h-auto mx-auto">
                            </div>
                            <caption>Pakaian Wanita</caption>
                        </div>
                        <div class="border p-3 text-center cursor-pointer hover:scale-105 transition-all bg-gray-100">
                            <div class="mb-2">
                                <img src="{{ asset('img/tshirt.svg') }}" alt="tshirt" class="w-28 h-auto mx-auto">
                            </div>
                            <caption>Pakaian Pria</caption>
                        </div>
                        <div class="border p-3 text-center cursor-pointer hover:scale-105 transition-all bg-gray-100">
                            <div class="mb-2">
                                <img src="{{ asset('img/laptop.svg') }}" alt="laptop" class="w-28 h-auto mx-auto">
                            </div>
                            <caption>Elektronik</caption>
                        </div>
                        <div class="border p-3 text-center cursor-pointer hover:scale-105 transition-all bg-gray-100">
                            <div class="mb-2">
                                <img src="{{ asset('img/fw.svg') }}" alt="fw" class="w-28 h-auto mx-auto">
                            </div>
                            <caption>Kecantikan</caption>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full bg-white border mt-5 shadow-md p-6">
                <!-- Grid Container -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <div
                            class="w-full h-[260px] p-3 rounded-md border hover:border-2 hover:border-green-300 cursor-pointer bg-gray-100">
                            <!-- Pastikan asset path gambar benar -->
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-32 object-cover">
                            <p class="mt-2 text-center">{{ $product->name }}</p>
                            <p class="font-semibold text-lg opacity-80 text-center">Rp
                                {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
