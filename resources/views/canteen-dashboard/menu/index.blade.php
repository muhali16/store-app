@extends('canteen-dashboard.layouts.main')

@section('fill')
<section class="w-full px-10 py-4">
    {{-- Judul Halaman --}}
    <h1 class="text-3xl mb-2 font-bold">Daftar Menu</h1>
    {{-- Daftar isi halaman menu --}}
    <ol class="list-decimal mb-8 px-4 w-fit">
        <a href="#1" class="hover:text-blue-700">
            <li>Menu Aktif</li>
        </a>
        <a href="#2" class="hover:text-blue-700">
            <li>Menu Tidak Aktif</li>
        </a>
        <a href="#3" class="hover:text-blue-700">
            <li>Menu Habis</li>
        </a>
        <a href="#4" class="hover:text-blue-700">
            <li>Menu Rekomendasi</li>
        </a>
    </ol>

    {{-- Tombol tambah menu --}}
    <div class="w-full mb-5">
        <a href="{{ route('menu.create') }}" class="w-fit bg-blue-400 flex align-start px-2 py-1 rounded-md text-white hover:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            <span>Tambah Menu</span>
        </a>
    </div>

    {{-- Bagian Notifikasi --}}
    @if (session('success-add-menu'))
    <div id="notify" class="justify-between items-center w-full bg-green-300 border border-green-700 text-green-900 text-lg rounded-md my-4 px-6 py-2 flex">
        {{ session('success-add-menu') }}
        {{-- Yeay, Wallet kamu sudah dibuat. Jangan lupa isi wallet ya, Selamat Berbelanja! --}}
        <button id="close-notify"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
    </div>
    @elseif (session('success-delete-menu'))
    <div id="notify" class="justify-between items-center w-full bg-yellow-300 border border-yellow-700 text-yellow-900 text-lg rounded-md my-4 px-6 py-2 flex">
        {{ session('success-delete-menu') }}
        {{-- Yeay, Wallet kamu sudah dibuat. Jangan lupa isi wallet ya, Selamat Berbelanja! --}}
        <button id="close-notify"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
    </div>
    @elseif (session('success-setting'))
    <div id="notify" class="justify-between items-center w-full bg-blue-300 border border-blue-700 text-blue-900 text-lg rounded-md my-4 px-6 py-2 flex">
        {!! session('success-setting') !!}
        {{-- Yeay, Wallet kamu sudah dibuat. Jangan lupa isi wallet ya, Selamat Berbelanja! --}}
        <button id="close-notify"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
    </div>
    @endif

    {{-- Tabel Menu Aktif --}}
    <div id="1" class="mb-20">
        <table class="table-fixed w-full">
            <thead class="text-center border-b-4 border-black">
                <td class="p-2">No</td>
                <td class="hidden sm:hidden md:block p-2">Photo</td>
                <td class="p-2">Nama Menu</td>
                <td class="hidden sm:hidden md:block p-2">Deskripsi</td>
                <td class="p-2">Harga</td>
                <td class="p-2">Status</td>
                <td class="hidden sm:hidden md:block p-2">Kategori</td>
                <td class="p-2">Aksi</td>
            </thead>
            <tbody class="text-center">
                @forelse ($active_menus as $active_menu)
                <tr class="border-b-2">
                    <td class="p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="hidden sm:hidden md:block p-2">
                        <img src="{{ asset('storage/'. $active_menu->photo) }}" alt="Foto Menu" class="w-32 h-32">
                    </td>
                    <td class="p-2">{{ $active_menu->name }}</td>
                    <td class="hidden sm:hidden md:block p-2">{{ $active_menu->deskripsi }}</td>
                    <td class="p-2">@currency($active_menu->harga)</td>
                    <td class="p-2">
                        <center>
                            @if ($active_menu->is_active == 'on')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7cde61" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        @endif
                        </center>
                    </td>
                    <td class="hidden sm:hidden md:block p-2">{{ $active_menu->category->name }}</td>
                    <td class="p-2">
                        <div class="flex flex-wrap gap-2 justify-center">
                            <form action="{{ route('menu.destroy', ['menu' => $active_menu->id]) }}" method="POST" class="w-fit block-inline">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                            <a href="{{ route('menu-setting', ['menu' => $active_menu->id]) }}"><button class="bg-blue-500 p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            </button></a>
                            <a href="#">
                                <button class="bg-yellow-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="w-full text-2xl text-center">
                    <td colspan="7" class="p-4">Menu Tidak Ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <p class="bg-blue-200 font-bold border border-black px-3 py-2">Total Menu Aktif: {{ count($active_menus) }}</p>
    </div>

    {{-- Tabel Menu tidak aktif --}}
    <div id="2" class="mb-20">
        <h1 class="text-red-500 text-3xl mb-3 pb-2 border-b-2 border-blue-300">Menu Tidak Aktif</h1>
        <table class="table-fixed w-full">
            <thead class="text-center border-b-4 border-black">
                <td class="p-2">No</td>
                <td class="hidden sm:hidden md:block p-2">Photo</td>
                <td class="p-2">Nama Menu</td>
                <td class="hidden sm:hidden md:block p-2">Deskripsi</td>
                <td class="p-2">Harga</td>
                <td class="p-2">Status</td>
                <td class="hidden sm:hidden md:block p-2">Kategori</td>
                <td class="p-2">Aksi</td>
            </thead>
            <tbody class="text-center">
                @forelse ($inactive_menus as $inactive_menu)
                <tr class="border-b-2">
                    <td class="p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="hidden sm:hidden md:block p-2">
                        <div class="w-32 h-32 overflow-hidden">
                            <img src="{{ asset('storage/'. $inactive_menu->photo) }}" alt="Foto Menu" class="object-cover bg-cover bg-center bg-current">
                        </div>
                    </td>
                    <td class="p-2">{{ $inactive_menu->name }}</td>
                    <td class="hidden sm:hidden md:block p-2">{{ $inactive_menu->deskripsi }}</td>
                    <td class="p-2">@currency($inactive_menu->harga)</td>
                    <td class="p-2">
                        <center>
                            @if ($inactive_menu->is_active == 'on')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7cde61" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            @endif
                        </center>
                    </td>
                    <td class="hidden sm:hidden md:block p-2">{{ $inactive_menu->category->name }}</td>
                    <td class="p-2">
                        <div class="flex flex-wrap gap-2 justify-center">
                            <form action="{{ route('menu.destroy', ['menu' => $inactive_menu->id]) }}" method="POST" class="w-fit block-inline">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                            <a href="{{ route('menu-setting', ['menu' => $inactive_menu->id]) }}"><button class="bg-blue-500 p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            </button></a>
                            <a href="#">
                                <button class="bg-yellow-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="w-full text-2xl text-center">
                    <td colspan="7" class="p-4">Menu Tidak Ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <p class="bg-blue-200 font-bold border border-black px-3 py-2">Total Menu Tidak Aktif: {{ count($inactive_menus) }}</p>
    </div>

    {{-- Tabel Menu Habis --}}
    <div id="3" class="mb-20">
        <h1 class="text-3xl mb-3 pb-2 border-b-2 border-blue-300">Menu Habis</h1>
        <table class="table-fixed w-full">
            <thead class="text-center border-b-4 border-black">
                <td class="p-2">No</td>
                <td class="hidden sm:hidden md:block p-2">Photo</td>
                <td class="p-2">Nama Menu</td>
                <td class="hidden sm:hidden md:block p-2">Deskripsi</td>
                <td class="p-2">Harga</td>
                <td class="p-2">Status</td>
                <td class="hidden sm:hidden md:block p-2">Kategori</td>
                <td class="p-2">Aksi</td>
            </thead>
            <tbody class="text-center">
                @forelse ($empty_menus as $empty_menu)
                <tr class="border-b-2">
                    <td class="p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="hidden sm:hidden md:block p-2">
                        <div class="w-32 h-32 overflow-hidden">
                            <img src="{{ asset('storage/'. $empty_menu->photo) }}" alt="Foto Menu" class="object-cover bg-cover bg-center bg-current">
                        </div>
                    </td>
                    <td class="p-2">{{ $empty_menu->name }}</td>
                    <td class="hidden sm:hidden md:block p-2">{{ $empty_menu->deskripsi }}</td>
                    <td class="p-2">@currency($empty_menu->harga)</td>
                    <td class="p-2">
                        <center>
                            @if ($empty_menu->is_active == 'on')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7cde61" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            @endif
                        </center>
                    </td>
                    <td class="hidden sm:hidden md:block p-2">{{ $empty_menu->category->name }}</td>
                    <td class="p-2">
                        <div class="flex flex-wrap gap-2 justify-center">
                            <form action="{{ route('menu.destroy', ['menu' => $empty_menu->id]) }}" method="POST" class="w-fit block-inline">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                            <a href="{{ route('menu-setting', ['menu' => $empty_menu->id]) }}"><button class="bg-blue-500 p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            </button></a>
                            <a href="#">
                                <button class="bg-yellow-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="w-full text-2xl text-center">
                    <td colspan="7" class="p-4">Menu Tidak Ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <p class="bg-blue-200 font-bold border border-black px-3 py-2">Total Menu Habis: {{ count($empty_menus) }}</p>
    </div>

    {{-- Tabel Menu Rekomendasi --}}
    <div id="4" class="mb-7">
        <h1 class="text-3xl mb-3 pb-2 border-b-2 border-blue-300">Menu Rekomendasi</h1>
        <table class="table-fixed w-full">
            <thead class="text-center border-b-4 border-black">
                <td class="p-2">No</td>
                <td class="hidden sm:hidden md:block p-2">Photo</td>
                <td class="p-2">Nama Menu</td>
                <td class="hidden sm:hidden md:block p-2">Deskripsi</td>
                <td class="p-2">Harga</td>
                <td class="p-2">Status</td>
                <td class="hidden sm:hidden md:block p-2">Kategori</td>
                <td class="p-2">Aksi</td>
            </thead>
            <tbody class="text-center">
                @forelse ($recomended_menus as $recomended_menu)
                <tr class="border-b-2">
                    <td class="p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="hidden sm:hidden md:block p-2">
                        <div class="w-32 h-32 overflow-hidden">
                            <img src="{{ asset('storage/'. $recomended_menu->photo) }}" alt="Foto Menu" class="object-cover bg-cover bg-center bg-current">
                        </div>
                    </td>
                    <td class="p-2">{{ $recomended_menu->name }}</td>
                    <td class="hidden sm:hidden md:block p-2">{{ $recomended_menu->deskripsi }}</td>
                    <td class="p-2">@currency($recomended_menu->harga)</td>
                    <td class="p-2">
                        <center>
                            @if ($recomended_menu->is_active == 'on')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7cde61" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            @endif
                        </center>
                    </td>
                    <td class="hidden sm:hidden md:block p-2">{{ $recomended_menu->category->name }}</td>
                    <td class="p-2">
                        <div class="flex flex-wrap gap-2 justify-center">
                            <form action="{{ route('menu.destroy', ['menu' => $recomended_menu->id]) }}" method="POST" class="w-fit block-inline">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </form>
                            <a href="{{ route('menu-setting', ['menu' => $recomended_menu->id]) }}"><button class="bg-blue-500 p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                            </button></a>
                            <a href="#">
                                <button class="bg-yellow-500 p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="w-full text-2xl text-center">
                    <td colspan="7" class="p-4">Menu Tidak Ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <p class="bg-blue-200 font-bold border border-black px-3 py-2">Total Menu Rekomendasi: {{ count($recomended_menus) }}</p>
    </div>
</section>
@endsection