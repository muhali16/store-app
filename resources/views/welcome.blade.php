@extends('layouts.main')

@section('container')
@include('layouts.header')

{{-- Wallet Modal Box --}}
<section id="modal" class="w-full inset-0 items-start justify-center p-6 absolute bg-black/50 backdrop-blur hidden z-[99999] pt-24">
    <div class="max-w-md p-7 bg-blue-700 rounded-lg shadow-md w-full relative transition ease-in-out duration-200">
        <button id="close-modal" class="absolute right-6 top-6 bg-blue-500 p-1 rounded hover:opacity-80 z-50" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <h1 class="text-2xl font-bold mb-8 text-white">Buat Wallet</h1>
        <div class="flex flex-col w-full">
            <form action="/wallet" method="POST" class="grid grid-cols gap-4 w-full">
                @csrf
                <input type="text" name="wallet_name" class="text-gray-700 rounded-md border-none bg-blue-200 @error('wallet_name') ring-2 ring-red-600 @enderror py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Wallet Name" value="{{ old('wallet_name') }}">
                @error('wallet_name')
                <span class="mb-3 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </span>
                @enderror
                <input type="text" name="no_hp" class="text-gray-700 rounded-md border-none bg-blue-200 py-1 px-3 w-full @error('no_hp') ring-2 ring-red-600 @enderror focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Phone Number" value="{{ old('no_hp') }}">
                @error('no_hp')
                <span class="mb-3 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </span>
                @enderror
                <h2 class="text-white text-base font-semibold mt-4">Address</h2>
                <input type="text" name="jalan" class="text-gray-700 rounded-md @error('jalan') ring-2 ring-red-600 @enderror border-none bg-blue-200 py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Street" value="{{ old('jalan') }}">
                @error('jalan')
                <span class="mb-3 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </span>
                @enderror
                <input type="text" name="kota" class="text-gray-700 @error('kota') ring-2 ring-red-600 @enderror rounded-md border-none bg-blue-200 py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="City" value="{{ old('kota') }}">
                @error('kota')
                <span class="mb-3 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </span>
                @enderror
                <input type="text" name="provinsi" class="text-gray-700 @error('provinsi') ring-2 ring-red-600 @enderror rounded-md border-none bg-blue-200 py-1 px-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Province" value="{{ old('provinsi') }}">
                @error('provinsi')
                <span class="mb-3 text-sm text-red-600 font-semibold">
                    {{ $message }}
                </span>
                @enderror
                <button type="submit" name="buat" class="text-white text-semibold text-lg bg-blue-400 rounded-md py-1 w-24 hover:cursor-pointer hover:opacity-80">Buat</button>
            </form>
        </div>
    </div>
</section>

<article>
    <!-- Swiper -->
    <div class="swiper mySwiper w-full md:h-80">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="../image/banners/1.jpg" alt="banner1" class="bg-cover wf-full"></div>
            <div class="swiper-slide"><img src="../image/banners/2.jpg" alt="banner2" srcset=""></div>
            <div class="swiper-slide"><img src="../image/banners/3.jpg" alt="banner3" srcset=""></div>
            <div class="swiper-slide"><img src="../image/banners/4.jpg" alt="banner4" srcset=""></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</article>

<main class="md:px-6">
@if (session('success-wallet'))
    <div class="w-full bg-green-300 border border-green-700 text-green-900 text-lg rounded-md my-4 p-3">
        {{ session('success-wallet') }}
    </div>
@endif
@error ('no_hp')
    <div class="w-full bg-red-300 border border-red-700 text-red-900 text-lg rounded-md my-4 p-3">
        {{ $message }}
    </div>
@enderror
<section id="profile" class="w-full p-4 mb-4" name="Profile">
    <div class="bg-blue-200 p-5 rounded-lg shadow-lg border-t-4 border-blue-600">
        <figure class="flex flex-row space-x-4 items-center">
            <img class="rounded-full border-4 border-blue-700 outline-4 outline-white" src="../image/users/user.jpg" alt="Muhammad Ali Mustaqim" width="120" height="120">
            <figcaption class="flex flex-col justify-start">
                @auth
                @if (auth()->user()->wallet->user_id ?? 0 == auth()->user()->id)
                    <h2 class="text-base font-semibold">Saldo</h2>
                    <h1 class="text-2xl font-bold mb-2">@currency(auth()->user()->wallet->saldo ?? 0)</h1>
                    <p class="text-sm"><span class="font-bold">Name</span>   {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                    <p class="text-sm"><span class="font-bold">HP</span>   {{ auth()->user()->wallet->no_hp }}</p>
                @else
                    <h1 class="text-xl text-blue-700 font-semibold">Belum ada dompetnya nih!</h1>
                    <h2 class="text-sm text-blue-700 font-semibold">Buka dompet yuk. <button id="modal-button" class="px-3 bg-blue-600 text-white hover:scale-110 transition ease-in-out duration-200">Wallet</button></h2>
                    <p class="text-lg"><span class="font-bold">Name</span>   {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
                @endif
                @endauth
                @guest
                    <h1 class="md:text-3xl text-xl text-red-600 font-bold mb-3">Ups! Belum login nih.</h1>
                    <h2 class="md:text-xl text-md text-red-500 mb-2"><a href="/login" class="text-blue-500">Login</a> dulu yuk.</h2>
                    <h2 class="md:text-xl text-md text-red-500">Atau belum punya akun? <a href="/signup" class="text-blue-500">Buat akun</a> dulu.</h2>
                @endguest
            </figcaption>
        </figure>
    </div>
</section>
<section id="menu" class="w-full px-4" name="menu">
    <h1 class="text-4xl font-bold text-blue-900 pb-3 border-b-2 mb-3">Beli apa ya?</h1>
    <div class="p-4 rounded-lg border-2 shadow-md grid grid-cols-2 items-center justify-center gap-5 md:flex md:flex-wrap md:justify-center">
        <div class="overflow-hidden w-36 h-36 relative rounded-lg">
            <div class="absolute bg-orange-600 text-white font-bold px-4 py-1 rounded-br-lg">
                Food
            </div>
            <img class="bg-cover bg-center transition ease-in-out duration-200 w-full hover:scale-125" src="../image/products/food.jpg" alt="Food">
        </div>
        <div class="overflow-hidden w-36 h-36 relative rounded-lg">
            <div class="absolute bg-orange-600 text-white font-bold px-4 py-1 rounded-br-lg">
                Drink
            </div>
            <img class="bg-cover bg-center transition ease-in-out duration-200 w-full hover:scale-125" src="../image/products/drink.jpg" alt="drink">
        </div>
        <div class="overflow-hidden w-36 h-36 relative rounded-lg">
            <div class="absolute bg-orange-600 text-white font-bold px-4 py-1 rounded-br-lg">
                Popcorn
            </div>
            <img class="bg-cover bg-center transition ease-in-out duration-200 w-full h-full hover:scale-125" src="../image/products/snack2.jpg" alt="Popcorn">
        </div>
        <div class="overflow-hidden w-36 h-36 relative rounded-lg">
            <div class="absolute bg-orange-600 text-white font-bold px-4 py-1 rounded-br-lg">
                Snack
            </div>
            <img class="bg-cover bg-center transition ease-in-out duration-200 w-full hover:scale-125" src="../image/products/snack.jpg" alt="snack">
        </div>
        <div class="overflow-hidden w-36 h-36 relative rounded-lg">
            <div class="absolute bg-orange-600 text-white font-bold px-4 py-1 rounded-br-lg">
                Fruit
            </div>
            <img class="bg-cover bg-center transition ease-in-out duration-200 w-full h-full hover:scale-125" src="../image/products/snack3.jpg" alt="Fruit">
        </div>
        <div class="overflow-hidden w-36 h-36 relative rounded-lg">
            <div class="absolute bg-orange-600 text-white font-bold px-4 py-1 rounded-br-lg">
                Cake
            </div>
            <img class="bg-cover bg-center transition ease-in-out duration-200 w-full h-full hover:scale-125" src="../image/products/cake.jpg" alt="Cake">
        </div>
    </div>
</section>
<section id="canteen" class="p-4 mt-4 w-full">
    <h1 class="text-4xl font-bold text-blue-900 pb-3 border-b-2 mb-3">Kantin</h1>
    <div class="flex flex-wrap p-5 md:grid md:grid-cols-2 lg:grid-cols-4 md:justify-center">
        <div class="border bg-blue-900 rounded-lg w-full overflow-hidden relative mb-5 md:w-72">
            <img class="bg-cover bg-center" src="../image/canteen/banner.jpg" alt="Canteen Photo">
            <div class="p-5">
                <h2 class="text-xl text-gray-100 font-bold mb-2">Kantin Bu Darmi</h2>
                <p class="text-sm text-gray-300 font-semibold mb-3">Blok A No.3, Kantin Fakultas Ilmu Komputer, Universitas Indonesia</p>
                <h3 class="text-base text-blue-400 hover:text-blue-500 w-fit"><a href="#">Kunjungi Kantin</a></h3>
            </div>
        </div>
        <div class="border rounded-lg w-full overflow-hidden relative mb-5 md:w-72">
            <img class="bg-cover bg-center" src="../image/canteen/banner.jpg" alt="Canteen Photo">
            <div class="p-5">
                <h2 class="text-xl text-gray-700 font-bold mb-2">Kantin Bu Darmi</h2>
                <p class="text-sm text-gray-500 font-semibold mb-3">Blok A No.3, Kantin Fakultas Ilmu Komputer, Universitas Indonesia</p>
                <h3 class="text-base text-blue-600 hover:text-blue-800"><a href="#">Kunjungi Kantin</a></h3>
            </div>
        </div>
        <div class="border rounded-lg w-full overflow-hidden relative mb-5 md:w-72">
            <img class="bg-cover bg-center" src="../image/canteen/banner.jpg" alt="Canteen Photo">
            <div class="p-5">
                <h2 class="text-xl text-gray-700 font-bold mb-2">Kantin Bu Darmi</h2>
                <p class="text-sm text-gray-500 font-semibold mb-3">Blok A No.3, Kantin Fakultas Ilmu Komputer, Universitas Indonesia</p>
                <h3 class="text-base text-blue-600 hover:text-blue-800"><a href="#">Kunjungi Kantin</a></h3>
            </div>
        </div>
        <div class="border rounded-lg w-full overflow-hidden relative mb-5 md:w-72">
            <img class="bg-cover bg-center" src="../image/canteen/banner.jpg" alt="Canteen Photo">
            <div class="p-5">
                <h2 class="text-xl text-gray-700 font-bold mb-2">Kantin Bu Darmi</h2>
                <p class="text-sm text-gray-500 font-semibold mb-3">Blok A No.3, Kantin Fakultas Ilmu Komputer, Universitas Indonesia</p>
                <h3 class="text-base text-blue-600 hover:text-blue-800"><a href="#">Kunjungi Kantin</a></h3>
            </div>
        </div>
        <div class="border rounded-lg w-full overflow-hidden relative mb-5 md:w-72">
            <img class="bg-cover bg-center" src="../image/canteen/banner.jpg" alt="Canteen Photo">
            <div class="p-5">
                <h2 class="text-xl text-gray-700 font-bold mb-2">Kantin Bu Darmi</h2>
                <p class="text-sm text-gray-500 font-semibold mb-3">Blok A No.3, Kantin Fakultas Ilmu Komputer, Universitas Indonesia</p>
                <h3 class="text-base text-blue-600 hover:text-blue-800"><a href="#">Kunjungi Kantin</a></h3>
            </div>
        </div>
    </div>
</section>
</main>


@include('layouts.footer')
@endsection