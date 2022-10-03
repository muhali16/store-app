@extends('layouts.main')

@section('container')
@include('layouts.header')

@foreach ($items as $item)
<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-blue-100 bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between px-9 py-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-bold leading-normal text-gray-800" id="exampleModalLabel">
                    Edit Item
                </h5>
                <button type="button"
                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('item.update') }}" method="post">
                @csrf
                <input type="text" name="menu_id" value="{{ $item->menu_id }}" hidden>
                <input type="text" name="item_id" value="{{ $item->id }}" hidden>
                <div class="modal-body relative p-4 text-gray-700 grid grid-cols-2 gap-4">
                    <div class="pl-5">
                        <img src="{{ asset('storage/' . $item->menu->photo) }}" alt="Menu Photo" class="w-full h-full rounded-lg shadow-md object-cover">
                    </div>
                    <div class="pr-5">
                        <h2 class="font-semibold text-2xl">{{ $item->menu->name }}</h2>
                        <p>@currency($item->menu->harga)</p>
                        <p class="text-sm my-3">{{ $item->menu->deskripsi }}</p>
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
                                id="exampleNumber0" value="{{ $item->many }}" name="many" min="1"/>
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
                                >{{ $item->note }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button" class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium leading-tight rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1" name="edit">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal --->
@endforeach

<section class="p-4 w-full grid grid-cols-1 gap-4 lg:grid-cols-2 md:p-10">
    <div class="w-full">
        @foreach ($items as $item)
        <div class="border shadow-sm border-gray-500 max-w-lg w-full overflow-hidden flex flex-row max-h-sm h-44 mb-5">
            <img src="{{ asset('storage/' . $item->menu->photo) }}" alt="Menu Photo" class="object-cover bg-cover w-1/3">
            <div class="p-3 w-full">
                <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $item->menu->name }}</h2>
                <p class="text-gray-500 text-sm mb-3">Note: {{ $item->note }}</p>
                <div class="relative mb-2 w-full">
                    <div class="flex flex-col">
                        <span class="text-base">Qty: {{ $item->many }}</span>
                        <span class="text-base font-bold">Total: @currency($item->total_price)</span>
                    </div>
                    <form action="#" method="POST" class="group absolute right-2">
                        <button class="py-2 px-3 bg-red-600 group-hover:bg-red-300 flex items-center flex-col rounded-md" type="submit" name="delete_item">
                            <svg class="stroke-white group-hover:stroke-red-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </form>
                </div>
                <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-800"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">Edit Pesanan</button>
            </div>
        </div>
        @endforeach
    </div>

    <div class="rounded bg-blue-50 shadow-sm p-5 w-full mt-5 md:mt-0">
        <h1 class="text-blue-900 text-3xl font-bold mb-2">Summary</h1>
        <ol class="border-b-2 border-t-2 border-blue-700 py-3 space-y-1">
            @foreach ($items as $item)
            <li class="flex flex-row justify-between">
                <p class="text-gray-500">{{ $item->menu->name }} {{ $item->many }}x</p>
                <span class="font-semibold">@currency( $item->total_price )</span>
            </li>
            @endforeach
        </ol>
        <h2 class="text-xl font-bold text-blue-700 text-right mb-5 mt-3">@currency($cart->harga_total)</h2>
        <h2 class="text-blue-900 text-3xl font-bold">Promo</h2>
        <div class="p-3 rounded bg-blue-200 mb-2">
            <h3 class="font-bold text-lg text-blue-700">Promo Special Ramadhan.</h3>
            <p class="text-red-500">Diskon UpTo 50%</p>
            <div class="flex flex-col">
                <div class="mt-3">
                    <a class="text-sm text-gray-500 hover:text-gray-600" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Syarat dan ketentuan.</a>
                    <div class="collapse" id="collapseExample">
                        <div class="block p-6 rounded-lg shadow-lg bg-white">
                        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </div>
                <a href="#" class="p-2 font-semibold bg-blue-800 text-white rounded-md hover:bg-blue-700 right-0 w-fit mt-3">Pasang Promo</a>
            </div>
        </div>
        <hr class="border border-blue-700">
        <a href="#" class="block p-3 border border-blue-700 uppercase bg-blue-700 text-white hover:bg-white hover:text-blue-700 rounded-md mt-5 text-center">Pesan Sekarang</a>
    </div>
</section>
@include('layouts.footer')
@endsection