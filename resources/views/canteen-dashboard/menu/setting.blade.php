@extends('canteen-dashboard.layouts.main')

@section('fill')
{{-- <section class="p-4 w-full flex items-center justify-center">
    <div class="md:w-1/2 w-full p-6">
        <h1 class="text-3xl font-semibold mb-5">Setting Menu</h1>
        <form action="{{ route('menu-setting-tst') }}" method="post" class="w-full flex flex-col space-y-4">
            @csrf
            <div class="md:w-1/2 flex flex-col w-full justify-between">
                <div class="flex flex-row justify-between w-full">
                    <div class="">
                        <p class="text-lg mb-1 font-semibold">Lorem, ipsum dolor.</p>
                        <p class="text-sm text-gray-500 w-56 md:w-80">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime totam dolorum voluptas.</p>
                    </div>
                    <label for="is_habis" class="relative w-[60px] h-8 bg-blue-500 rounded-full cursor-pointer" >
                        <input type="checkbox" name="is_habis" id="is_habis" class="invisible peer">
                        <span class="absolute bg-blue-300 w-1/3 h-3/5 rounded-full left-2 top-1.5 peer-checked:bg-white peer-checked:left-8 transition-all duration-300"></span>
                    </label>
                </div>
            </div>
            <span>
                <input type="checkbox" name="rekomendasi" id="rekomendasi" checked>
                <label for="rekomendasi">Tandai sebagai rekomendasi kantin<br><span class="text-sm text-red-500">Menu yang direkomendasikan akan muncul pada kolom rekomendasi. Setiap kantin hanya bisa merekomendasikan 3 menu.</span></label>
            </span>
            <span>
                <input type="checkbox" name="habis" id="habis" value="1">
                <label for="habis">Tandai sebagai menu habis<br><span class="text-sm text-red-500">Menu yang habis tidak akan bisa dipesan</span></label>
            </span>
            <button type="submit" class="bg-blue-200 border border-blue-500 text-semibold text-gray-700 rounded-full py-2 hover:bg-blue-300" name="simpan">Simpan</button>
        </form>
    </div>
</section> --}}
<section class="w-full flex justify-center items-center p-10">
    <div class="flex flex-col w-full md:w-2/3">
        <h1 class="text-3xl font-semibold mb-1">Setting Menu</h1>
        <h2 class="text-2xl text-gray-600 font-semibold mb-7">Menu: {{ $detail->name }}</h2>
        <form method="POST" action="{{ route('menu-setting-tst', ['menu' => $detail->id]) }}" class="grid grid-rows-1 w-full gap-7">
            @csrf
            <div class="flex flex-row justify-between w-full">
                <div>
                    <p class="text-lg mb-1">Menu Aktif</p>
                    <p class="text-sm text-gray-500 w-56 md:w-80">Menu yang aktif akan muncul pada halaman kantin</p>
                </div>
                <label for="is_active" class="relative w-[60px] h-8 bg-blue-500 rounded-full cursor-pointer" >
                    <input type="checkbox" name="is_active" id="is_active" class="sr-only peer" {{ $detail->is_active != null ? 'checked' : '' }}>
                    <span class="absolute bg-blue-300 w-1/3 h-3/5 rounded-full left-2 top-1.5 peer-checked:bg-white peer-checked:left-8 transition-all duration-300"></span>
                </label>
            </div>
            <div class="flex flex-row justify-between w-full">
                <div>
                    <p class="text-lg mb-1">Menu Habis</p>
                    <p class="text-sm text-gray-500 w-56 md:w-80">Menu yang habis tidak akan bisa dipesan</p>
                    @if ($detail->is_active == null)
                    <p class="text-sm font-semibold text-red-500 mt-2"> Menu sedang tidak aktif. Aktifkan menu, kemudian simpan untuk mengaktifkan fitur ini</p>
                    @endif
                </div>
                <label for="is_empty" class="relative w-[60px] h-8 bg-blue-500 rounded-full cursor-pointer @if ($detail->is_active == null)
                    border-2 border-red-500
                @endif" >
                    <input type="checkbox" name="is_empty" id="is_empty" class="sr-only peer" 
                    @if ($detail->is_empty != null)
                        @checked(true)
                    @endif
                    @if ($detail->is_active == null)
                        {{ 'disabled' }}
                    @endif>
                    <span class="absolute bg-blue-300 w-1/3 h-3/5 rounded-full left-2 top-1.5 peer-checked:bg-white peer-checked:left-8 transition-all duration-300"></span>
                </label>
            </div>
            <div class="flex flex-row justify-between w-full">
                <div>
                    <p class="text-lg mb-1">Rekomendasi Menu</p>
                    <p class="text-sm text-gray-500 w-56 md:w-80">Menu yang direkomendasikan akan muncul pada kolom rekomendasi. Setiap kantin hanya bisa merekomendasikan 3 menu.</p>
                    @if ($detail->is_active == null)
                    <p class="text-sm font-semibold text-red-500 mt-2"> Menu sedang tidak aktif. Aktifkan menu, kemudian simpan untuk mengaktifkan fitur ini</p>
                    @elseif ($recomended_menus)
                    <p class="text-sm font-semibold text-red-500 mt-2"> Rekomendasi menu hanya bisa maksimal 3 menu.</p>
                    @endif
                </div>
                <label for="is_recomended" class="relative w-[60px] h-8 bg-blue-500 rounded-full cursor-pointer @if ($detail->is_active == null)
                    border-2 border-red-500
                @endif" >
                    <input type="checkbox" name="is_recomended" id="is_recomended" class="sr-only peer "
                    @if ($detail->is_recomended != null)
                        @checked(true)
                    @elseif ($detail->is_recomended == null && $recomended_menus)
                        {{ 'disabled' }}
                    @endif>
                    <span class="absolute bg-blue-300 w-1/3 h-3/5 rounded-full left-2 top-1.5 peer-checked:bg-white peer-checked:left-8 transition-all duration-300"></span>
                </label>
            </div>
            <button type="submit" class="bg-blue-200 border border-blue-500 text-semibold text-gray-700 rounded-full py-2 hover:bg-blue-300" name="simpan">Simpan</button>
        </form>
    </div>
    
</section>
@endsection