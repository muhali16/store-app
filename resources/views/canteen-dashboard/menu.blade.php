@extends('canteen-dashboard.layouts.main')

@section('fill')
<section class="w-full p-4">
    <h1 class="text-3xl mb-5">Daftar Menu</h1>
    <div class="w-full">
        <a href="{{ url('/canteen/dashboard/menu/create') }}" class="w-fit bg-blue-400 flex align-start px-2 py-1 rounded-md text-white hover:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            <span>Tambah Menu</span>
        </a>
    </div>
    <div>
        <table class="table-auto w-full">
            <thead class="text-center border-b-4 border-black">
                <td class="p-2">No</td>
                <!-- <td class="hidden sm:hidden md:block p-2">Photo</td> -->
                <td class="p-2">Nama Menu</td>
                <td class="hidden sm:hidden md:block p-2">Deskripsi</td>
                <td class="p-2">Harga</td>
                <td class="p-2">Status</td>
                <td class="hidden sm:hidden md:block p-2">Kategori</td>
                <td class="p-2">Aksi</td>
            </thead>
            <tbody>
                <tr class="border-b-2">
                    <td class="p-2 text-center">1</td>
                    <!-- <td class="hidden sm:hidden md:block p-2">
                        <img src="https://source.unsplash.com/random/100x100?food" alt="Foto Menu">
                    </td> -->
                    <td class="p-2">Kentang Goreng</td>
                    <td class="hidden sm:hidden md:block p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur culpa quis similique.</td>
                    <td class="p-2">Rp.12.000</td>
                    <td class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7cde61" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ff0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </td>
                    <td class="hidden sm:hidden md:block p-2">Makanan</td>
                    <td class="p-2 gap-2">
                        <a href="#"><button class="bg-red-500 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button></a>
                        <a href="#"><button class="bg-yellow-500 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                        </button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection