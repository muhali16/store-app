@extends('canteen-dashboard.layouts.main')

@section('fill')
<section class="p-4 w-full flex items-center justify-center">
    <div class="md:w-1/2 w-full p-6">
        <h1 class="text-3xl font-semibold mb-5">Tambah Menu</h1>
        <form action="" method="post" class="w-full flex flex-col space-y-4">
            <span class="w-fit rounded border-blue-400 border overflow-hidden">
                <label for="name" class="bg-blue-200 p-2 text-gray-700">Nama Menu</label>
                <input type="text" name="name" id="name" class="text-gray-600 px-2 py-1 focus:outline-none focus:ring-none">
            </span>
            <span class="border-blue-400 border overflow-hidden rounded">
                <input type="file" name="photo" id="photo" accept="image/*" class="block file:bg-blue-200 file:border-none file:hover:bg-blue-900 file:hover:text-white file:text-gray-700 file:px-3 text-gray-600">
            </span>
            <span class="w-fit rounded border-blue-400 border overflow-hidden">
                <label for="harga" class="bg-blue-200 p-2 text-gray-700">Rp</label>
                <input type="number" name="harga" id="harga" class="text-gray-600 px-2 py-1 focus:outline-none focus:ring-none">
            </span>
            <span class="w-fit rounded border-blue-400 border overflow-hidden">
                <label for="kategori" class="bg-blue-200 p-2 text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="text-gray-600 px-4 py-1">
                    <option value="">Makanan</option>
                    <option value="">Minuman</option>
                </select>
            </span>
            <span class="w-fit rounded border-blue-400 border overflow-hidden">
                <label for="deskripsi" class="bg-blue-200 p-2 text-gray-700">Deskripsi</label>
                <textarea type="text" name="deskripsi" id="deskripsi" class="w-full text-gray-600 px-2 py-1 focus:outline-none focus:ring-none"></textarea>
            </span>
            <span>
                <input type="checkbox" name="rekomendasi" id="rekomendasi" value="1">
                <label for="rekomendasi">Tandai sebagai rekomendasi kantin<br><span class="text-sm text-red-500">Menu yang direkomendasikan akan muncul pada kolom rekomendasi. Setiap kantin hanya bisa merekomendasikan 3 menu.</span></label>
            </span>
            <span>
                <input type="checkbox" name="habis" id="habis" value="1">
                <label for="habis">Tandai sebagai menu habis<br><span class="text-sm text-red-500">Menu yang habis tidak akan bisa dipesan</span></label>
            </span>
            <button type="submit" class="bg-blue-200 border border-blue-500 text-semibold text-gray-700 rounded-full py-2 hover:bg-blue-300" name="buat-menu">Buat</button>
        </form>
    </div>
</section>
@endsection