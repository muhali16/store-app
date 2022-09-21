@extends('canteen-dashboard.layouts.main')

@section('fill')
<!-- Hero dahsboard home -->
<section class="relative w-full h-80 flex overflow-hidden">
    <img src="{{ asset('storage/' . $canteen->banner) }}" alt="" class="object-cover bg-cover bg-center">
    <div class="px-4 md:px-10 py-3 absolute bg-blue-800/50 rounded-tr-xl backdrop-blur-sm place-self-end">
        <h1 class="text-4xl text-white font-bold">{{ $canteen->nama_kantin }}</h1>
    </div>
</section>
{{-- Rekomendasi --}}
<section class="w-full px-4 md:px-10">
    <h1 class="my-3 text-4xl text-red-500 font-semibold py-2 border-b-2">Rekomendasi</h1>
    <div class="flex flex-wrap gap-1 md:gap-4">
        @foreach ($recomended_menus as $recomended)
            <!-- Modal Menu -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto bg-gray-900/50 backdrop-blur-sm" id="staticBackdrop{{ $recomended->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog relative w-auto pointer-events-none">
                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-blue-100 bg-clip-padding rounded-md outline-none text-current">
                        <div class="modal-header flex flex-shrink-0 items-center justify-between px-9 py-4 border-b border-gray-200 rounded-t-md">
                            <h5 class="text-xl font-bold leading-normal text-gray-800" id="exampleModalLabel">
                                Add to Cart!
                            </h5>
                            <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <div class="modal-body relative p-4 text-gray-700 grid grid-cols-2 gap-4">
                                <div class="pl-5">
                                    <img src="{{ asset('storage/' . $recomended->photo) }}" alt="Menu Photo" class="w-full h-full rounded-lg shadow-md object-cover">
                                </div>
                                <div class="pr-5">
                                    <h2 class="font-semibold text-2xl">{{ $recomended->name }}</h2>
                                    <p>@currency($recomended->harga)</p>
                                    <p class="text-sm my-3">{{ $recomended->deskripsi }}</p>
                                    <div class="flex justify-center">
                                        <div class="mb-3 xl:w-96">
                                            <input type="number" class="
                                                form-control
                                                block
                                                w-full
                                                px-3
                                                py-1.5
                                                text-base
                                                font-normal
                                                text-gray-700
                                                bg-white bg-clip-padding
                                                border border-solid border-gray-300
                                                rounded
                                                transition
                                                ease-in-out
                                                m-0
                                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                                "
                                            id="exampleNumber0" value="1" name="many" min="1"/>
                                        </div>
                                    </div>
                                    <div class="flex justify-center">
                                        <div class="mb-3 xl:w-96">
                                            <textarea
                                            class="
                                              form-control
                                              block
                                              w-full
                                              px-3
                                              py-1.5
                                              text-base
                                              font-normal
                                              text-gray-700
                                              bg-white bg-clip-padding
                                              border border-solid border-gray-300
                                              rounded
                                              transition
                                              ease-in-out
                                              m-0
                                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                            "
                                            id="exampleFormControlTextarea1"
                                            rows="3"
                                            placeholder="Catatan untuk kantin"
                                            name="note"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium leading-tight rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                    Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Card Menu --}}
            <div class="relative overflow-hidden shadow-md w-44 md:w-72 rounded flex flex-col justify-center">
                <img src="{{ asset('storage/' . $recomended->photo) }}" alt="" class="bg-cover bg-center w-full h-52">
                <div class="p-3">
                    <h2 class="text-md font-semibold">{{ $recomended->name }}</h2>
                    <h4 class="mb-2">@currency($recomended->harga)</h4>
                    <p class="text-sm mb-3">{{ $recomended->deskripsi }}</p>
                    @if ($recomended->is_empty)  
                        <p class="text-sm text-red-500 mb-2">Menu sedang habis.</p>
                    @endif
                    <button type="button" class="group w-full disabled:border-red-500 disabled:border-2 inline-block px-6 py-2.5 bg-blue-100 rounded shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-150 ease-in-out {{ $recomended->is_empty ? 'hidden' : '' }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $recomended->id }}" >
                        <svg class="group-hover:stroke-white stroke-blue-600 w-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                    </button>
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
                <!-- Modal Menu -->
                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto bg-gray-900/50 backdrop-blur-sm" id="staticBackdrop{{ $menu->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog relative w-auto pointer-events-none">
                        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-blue-100 bg-clip-padding rounded-md outline-none text-current">
                            <div class="modal-header flex flex-shrink-0 items-center justify-between px-9 py-4 border-b border-gray-200 rounded-t-md">
                                <h5 class="text-xl font-bold leading-normal text-gray-800" id="exampleModalLabel">
                                    Add to Cart!
                                </h5>
                                <button type="button"
                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <div class="modal-body relative p-4 text-gray-700 grid grid-cols-2 gap-4">
                                    <div class="pl-5">
                                        <img src="{{ asset('storage/' . $menu->photo) }}" alt="Menu Photo" class="w-full h-full rounded-lg shadow-md object-cover">
                                    </div>
                                    <div class="pr-5">
                                        <h2 class="font-semibold text-2xl">{{ $menu->name }}</h2>
                                        <p>@currency($menu->harga)</p>
                                        <p class="text-sm my-3">{{ $menu->deskripsi }}</p>
                                        <div class="flex justify-center">
                                            <div class="mb-3 xl:w-96">
                                                <input type="number" class="
                                                    form-control
                                                    block
                                                    w-full
                                                    px-3
                                                    py-1.5
                                                    text-base
                                                    font-normal
                                                    text-gray-700
                                                    bg-white bg-clip-padding
                                                    border border-solid border-gray-300
                                                    rounded
                                                    transition
                                                    ease-in-out
                                                    m-0
                                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                                    "
                                                id="exampleNumber0" value="1" name="many" min="1"/>
                                            </div>
                                        </div>
                                        <div class="flex justify-center">
                                            <div class="mb-3 xl:w-96">
                                                <textarea
                                                class="
                                                form-control
                                                block
                                                w-full
                                                px-3
                                                py-1.5
                                                text-base
                                                font-normal
                                                text-gray-700
                                                bg-white bg-clip-padding
                                                border border-solid border-gray-300
                                                rounded
                                                transition
                                                ease-in-out
                                                m-0
                                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                                "
                                                id="exampleFormControlTextarea1"
                                                rows="3"
                                                placeholder="Catatan untuk kantin"
                                                name="note"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                    <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium leading-tight rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                        Tambah
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Card Menu --}}
                <div class="relative overflow-hidden shadow-md w-40 rounded">
                    <img src="{{ asset('storage/' . $menu->photo) }}" alt="" class="bg-cover bg-center w-full h-44">
                    <div class="p-3">
                        <h2 class="text-md font-semibold">{{ $menu->name }}</h2>
                        <h4 class="mb-2">@currency($menu->harga)</h4>
                        <p class="text-sm mb-3">{{ $menu->deskripsi }}</p>
                        @if ($menu->is_empty)  
                            <p class="text-sm text-red-500 mb-2">Menu sedang habis.</p>
                        @endif
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            
                        <button type="button" class="group w-full disabled:border-red-500 disabled:border-2 inline-block px-6 py-2.5 bg-blue-100 rounded shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-150 ease-in-out {{ $menu->is_empty ? 'hidden' : '' }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $menu->id }}" >
                            <svg class="group-hover:stroke-white stroke-blue-600 w-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
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