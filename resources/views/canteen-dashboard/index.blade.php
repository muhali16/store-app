@extends('canteen-dashboard.layouts.main')

@section('fill')
<!-- Hero dahsboard home -->
<section class="relative w-full h-80 flex overflow-hidden">
    <img src="{{ asset('storage/' . $canteen->banner) }}" alt="" class="object-cover bg-cover">
    <div class="px-4 md:px-10 py-3 absolute bg-blue-800/50 rounded-tr-xl backdrop-blur-sm place-self-end">
        <h1 class="text-4xl text-white font-bold">{{ $canteen->nama_kantin }}</h1>
    </div>
</section>
<!-- Rekomendasi -->
<section class="w-full px-4 md:px-10">
    <h1 class="my-3 text-4xl text-red-500 font-semibold py-2 border-b-2">Rekomendasi</h1>
    <div class="flex flex-wrap gap-1 md:gap-4">
        @foreach ($recomended_menus as $recomended)
            <div class="relative overflow-hidden shadow-md w-44 md:w-72 rounded flex flex-col justify-center">
                <img src="{{ asset('storage/' . $recomended->photo) }}" alt="" class="bg-cover bg-center w-full h-52">
                <div class="p-3">
                    <h2 class="text-md font-semibold">{{ $recomended->name }}</h2>
                    <h4 class="mb-2">@currency($recomended->harga)</h4>
                    <p class="text-sm mb-3">{{ $recomended->deskripsi }}</p>
                    @if ($recomended->is_empty)  
                        <p class="text-sm text-red-500 mb-2">Menu sedang habis.</p>
                    @endif
                    <form action="/canteen/dashboard" method="post">
                        <button class="bg-blue-100 hover:bg-blue-500 w-full text-center py-2 rounded-lg disabled:border-red-500 disabled:border" name="cart" {{ $recomended->is_empty ? 'disabled' : '' }}>
                            <svg class="hover:stroke-white stroke-blue-600 w-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Makanan -->

@foreach ($categories as $category)
    <section class="w-full px-4 md:px-10">
    <h1 class="my-3 text-2xl text-blue-500 font-semibold py-2 border-b-2">{{ $category }}</h1>
    <div class="flex flex-wrap gap-1 md:gap-4">
        @foreach ($menus as $menu)
            @if ($menu->category->name == $category)
                <div class="relative overflow-hidden shadow-md w-40 rounded ">
                    <img src="{{ asset('storage/' . $menu->photo) }}" alt="" class="bg-cover bg-center w-full h-44">
                    <div class="p-3">
                        <h2 class="text-md font-semibold">{{ $menu->name }}</h2>
                        <h4 class="mb-2">@currency($menu->harga)</h4>
                        <p class="text-sm mb-3">{{ $menu->deskripsi }}</p>
                        @if ($menu->is_empty)  
                            <p class="text-sm text-red-500 mb-2">Menu sedang habis.</p>
                        @endif
                        <form action="#" method="post">
                            <button class="bg-blue-100 hover:bg-blue-500 w-full text-center py-2 rounded-lg disabled:border-red-500 disabled:border" name="cart" {{ $menu->is_empty ? 'disabled' : '' }}>
                                <svg class="hover:stroke-white stroke-blue-600 w-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
@endforeach

@endsection