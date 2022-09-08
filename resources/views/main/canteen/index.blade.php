@extends('layouts.main')

@section('container')
@include('layouts.header')
<!-- Hero dahsboard home -->
<section class="relative w-full h-80 flex overflow-hidden">
    <img src="{{ asset('storage/' . $canteen->banner) }}" alt="" class="object-cover bg-cover">
    <div class="p-3 absolute bg-blue-800/50 rounded-tr-xl backdrop-blur-sm place-self-end">
        <h1 class="text-4xl text-white font-bold">{{ $canteen->nama_kantin }}</h1>
    </div>
</section>
<!-- Rekomendasi -->
<section class="w-full px-4">
    <h1 class="my-3 text-2xl text-red-500 font-semibold py-2 border-b-2">Rekomendasi</h1>
    <div class="flex flex-wrap gap-4">
        <div class="relative overflow-hidden shadow-md w-36 md:w-72 rounded flex flex-col justify-center">
            <img src="https://source.unsplash.com/random/150x120?food" alt="" class="bg-cover bg-center">
            <div class="p-3">
                <h2 class="text-md font-semibold">Cireng Goreng</h2>
                <h4 class="mb-2">Rp. 45.000</h4>
                <p class="text-sm mb-3">Lorem ipsum dolor sit amet consectetur.</p>
                <a href="{{ auth()->check() ? url('/cart/3892648') : url('/login') }}">
                    <button class="bg-blue-100 hover:bg-blue-500 w-full text-center py-2 rounded-lg" name="cart">
                        <svg class="hover:stroke-white stroke-blue-600 w-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Makanan -->
<section class="w-full px-4">
    <h1 class="my-3 text-2xl text-blue-500 font-semibold py-2 border-b-2">Makanan</h1>
    <div class="flex flex-wrap gap-4">
        <div class="relative overflow-hidden shadow-md w-36 rounded ">
            <img src="https://source.unsplash.com/random/150x120?food" alt="" class="bg-cover bg-center">
            <div class="p-3">
                <h2 class="text-md font-semibold">Cireng Goreng</h2>
                <h4 class="mb-2">Rp. 45.000</h4>
                <p class="text-sm mb-3">Lorem ipsum dolor sit amet consectetur.</p>
                <a href="{{ auth()->check() ? url('/cart/3892648') : url('/login') }}">
                    <button class="bg-blue-100 hover:bg-blue-500 w-full text-center py-2 rounded-lg" name="cart">
                        <svg class="hover:stroke-white stroke-blue-600 w-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Minuman -->
<section class="w-full px-4">
    <h1 class="my-3 text-2xl text-blue-500 font-semibold py-2 border-b-2">Minuman</h1>
    <div class="flex flex-wrap gap-4">
        <div class="relative overflow-hidden shadow-md w-36 rounded ">
            <img src="https://source.unsplash.com/random/150x120?drink" alt="" class="bg-cover bg-center">
            <div class="p-3">
                <h2 class="text-md font-semibold">Cireng Goreng</h2>
                <h4 class="mb-2">Rp. 45.000</h4>
                <p class="text-sm mb-3">Lorem ipsum dolor sit amet consectetur.</p>
                <a href="{{ auth()->check() ? url('/cart/3892648') : url('/login') }}">
                    <button class="bg-blue-100 hover:bg-blue-500 w-full text-center py-2 rounded-lg" name="cart">
                        <svg class="hover:stroke-white stroke-blue-600 w-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                    </button>
                </a>
            </div>
        </div>
        
    </div>
</section>
@include('layouts.footer')
@endsection