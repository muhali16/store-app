@extends('canteen-dashboard.layouts.main')

@section('fill')
<section class="p-4 w-full flex items-center justify-center">
    <div class="md:w-1/2 w-full p-6">
        <h1 class="text-3xl font-semibold mb-5">Tambah Menu</h1>
        <form action="{{ route('menu.store') }}" enctype="multipart/form-data" method="post" class="w-full flex flex-col space-y-4">
            @csrf
            @method('post')
            <span class="w-full rounded border-blue-400 border overflow-hidden @error('name') ring-1 ring-red-500 @enderror">
                <label for="name" class="bg-blue-200 p-2 text-gray-700">Nama Menu</label>
                <input type="text" name="name" id="name" class="text-gray-600 px-2 py-1 focus:outline-none focus:ring-none w-full" value="{{ old('name') }}">
            </span>
            @error('name') 
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
            <span class="border-blue-400 border overflow-hidden rounded w-full @error('photo') ring-1 ring-red-500 @enderror">
                <input type="file" name="photo" id="photo" accept="image/*" class="block file:bg-blue-200 file:border-none file:hover:bg-blue-900 file:hover:text-white file:text-gray-700 file:px-3 file:py-2 text-gray-600 w-full">
            </span>
            @error('photo') 
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
            <span class="w-full rounded border-blue-400 border overflow-hidden @error('harga') ring-1 ring-red-500 @enderror">
                <label for="harga" class="bg-blue-200 p-2 text-gray-700">Rp</label>
                <input type="number" name="harga" id="harga" class="text-gray-600 px-2 py-1 focus:outline-none focus:ring-none w-full" value="{{ old('harga') }}">
            </span>
            @error('harga') 
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
            <span class="w-full rounded border-blue-400 border overflow-hidden @error('kategori') ring-1 ring-red-500 @enderror">
                <label for="category_id" class="bg-blue-200 p-2 text-gray-700">Kategori</label>
                <select name="category_id" id="category_id" class="text-gray-600 p-2 w-full">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </span>
            @error('category_id') 
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
            <span class="w-full rounded border-blue-400 border overflow-hidden @error('deskripsi') ring-1 ring-red-500 @enderror">
                <label for="deskripsi" class="bg-blue-200 p-2 text-gray-700">Deskripsi</label>
                <textarea type="text" name="deskripsi" id="deskripsi" class="w-full text-gray-600 px-2 py-1 focus:outline-none focus:ring-none" >{{ old('deskripsi') }}</textarea>
            </span>
            @error('deskripsi') 
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
            <button type="submit" class="bg-blue-200 border border-blue-500 text-semibold text-gray-700 rounded-full py-2 hover:bg-blue-300" name="buat-menu">Buat</button>
        </form>
    </div>
</section>
@endsection