@extends('layouts.main')

@section('container')
@include('layouts.header')
<section class="w-full flex flex-col p-4 items-center mb-10">
    <h1 class="text-3xl text-blue-800 font-semibold mb-5 border-b-2 pb-3 border-blue-300">Form Pengajuan Pembukaan Kantin Kejujuran</h1>
    @if (session('canteen-success'))
        <div class="text-green-700 bg-green-200 p-3 rounded border-2 border-green-500 text-md mb-5 w-full md:w-1/3">
            {{ session('canteen-success') }}
            {{-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid mollitia, tenetur magni voluptate ea obcaecati laborum dolor rerum illo quaerat? --}}
        </div>
    @endif
    <form action="{{ url('/canteen') }}" method="post" class="w-full md:w-1/2 text-gray-700 flex flex-col" enctype="multipart/form-data">
        @csrf
        <label for="nama_pemilik" class="text-sm">Nama Pemilik</label>
        <input value="{{ old("nama_pemilik") }}" type="text" name="nama_pemilik" id="nama_pemilik" class="text-md border-2 rounded border-blue-300 px-1 focus:outline-none focus:ring-1 focus:ring-blue-400 mb-3 @error('nama_pemilik') ring-2 ring-red-500 @enderror" required>
        @error('nama_pemilik')
            <span class="text-red-600 text-sm text-right">
                {{ $message }}
            </span>
        @enderror
        <label for="nama_kantin" class="text-sm" >Nama Kantin</label>
        <input value="{{ old("nama_kantin") }}" type="text" name="nama_kantin" id="nama_kantin" class="text-md border-2 rounded border-blue-300 px-1 focus:outline-none focus:ring-1 focus:ring-blue-400 mb-3 @error('nama_pemilik')
        ring-2 ring-red-500 @enderror" required>
        @error('nama_kantin')
            <span class="text-red-600 text-sm text-right mb-3">
                {{ $message }}
            </span>
        @enderror
        <label for="no_hp" class="text-sm">Nomor Telepon Kantin</label>
        <input value="{{ old("no_hp") }}" type="tel" name="no_hp" id="no_hp" class="text-md border-2 rounded border-blue-300 px-1 focus:outline-none focus:ring-1 focus:ring-blue-400 mb-3 @error('no_hp') ring-2 ring-red-500 @enderror" required>
        @error('no_hp')
            <span class="text-red-600 text-sm text-right mb-3">
                {{ $message }}
            </span>
        @enderror
        <label for="alamat" class="text-sm">Alamat Kios</label>
        <textarea type="text" name="alamat" id="alamat" class="text-md border-2 rounded border-blue-300 px-1 focus:outline-none focus:ring-1 focus:ring-blue-400 mb-3 @error('nama_pemilik') ring-2 ring-red-500 @enderror" required>{{ old("alamat") }}</textarea>
        @error('alamat')
            <span class="text-red-600 text-sm text-right mb-3">
                {{ $message }}
            </span>
        @enderror
        <label for="foto" class="text-sm">Foto Kantin</label>
        <input type="file" accept="image/*" name="foto" id="foto" class="block file:bg-blue-200 file:border-none file:hover:bg-blue-900 file:hover:text-white file:text-gray-700 file:px-3 text-gray-600 mb-1 @error('foto') file:border-2 file:border-red-500 @enderror" value="{{ old('foto') }}">
        @error('foto')
            <span class="text-red-600 text-sm text-right mb-3">
                {{ $message }}
            </span>
        @enderror
        <span class="text-sm mb-3 text-green-600">Pastikan foto kantin tidak melebihi 1 MB. Silakan gunakan aplikasi atau website yang mendukung untuk menyesuaikan ukuran foto terlebih dahulu.</span>
        <label for="banner" class="text-sm">Banner Kantin</label>
        <input type="file" accept="image/*" name="banner" id="banner" class="block file:bg-blue-200 file:border-none file:hover:bg-blue-900 file:hover:text-white file:text-gray-700 file:px-3 text-gray-600 mb-1 @error('banner') file:border-2 file:border-red-500 @enderror">
        @error('banner')
            <span class="text-red-600 text-sm text-right mb-3">
                {{ $message }}
            </span>
        @enderror
        <span class="text-sm mb-3 text-green-600">Pastikan banner kantin berukuran 468x60 px dan tidak melebihi 1 MB. Silakan gunakan aplikasi atau website yang mendukung untuk menyesuaikan ukuran banner terlebih dahulu.</span>
        <label for="deskripsi" class="text-sm">Deskripsi Kantin</label>
        <textarea type="text" name="deskripsi" id="deskripsi" class="text-md border-2 rounded border-blue-300 h-44 px-1 focus:outline-none focus:ring-1 focus:ring-blue-400 @error('deskripsi') ring-2 ring-red-500 @enderror" required>{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <span class="text-red-600 text-sm text-right mb-3">
                {{ $message }}
            </span>
        @enderror
        <div class="mb-7 mt-3 p-3 @error ('snk')
            border-2 rounded border-red-500
        @enderror">
            <input type="checkbox" name="snk" id="snk" value="1">
            <label for="snk">Dengan mengajukan pembukaan kantin, saya menyetujui <a href="#" class="text-blue-600">syarat dan ketentuan</a> yang sedang berlaku.</label>
        </div>
        <button type="submit" name="ajukan_kantin" class="bg-blue-200 w-fit py-2 font-semibold rounded px-4 hover:bg-blue-400">Submit</button>
    </form>
</section>
@include('layouts.footer')
@endsection