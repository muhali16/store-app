@extends('layouts.main')

@section('container')
@include('layouts.header')
<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Modal title</h5>
                <button type="button"
                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body relative p-4">
            Modal body text goes here.
        </div>
        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
            <button type="button" class="px-6
            py-2.5
            bg-purple-600
            text-white
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded
            shadow-md
            hover:bg-purple-700 hover:shadow-lg
            focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-purple-800 active:shadow-lg
            transition
            duration-150
            ease-in-out" data-bs-dismiss="modal">Close</button>
            <button type="button" class="px-6 
                                        py-2.5
                                        bg-blue-600
                                        text-white
                                        font-medium
                                        text-xs
                                        leading-tight
                                        uppercase
                                        rounded
                                        shadow-md
                                        hover:bg-blue-700 hover:shadow-lg
                                        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                        active:bg-blue-800 active:shadow-lg
                                        transition
                                        duration-150
                                        ease-in-out
                                        ml-1">Save changes
                    </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal --->

<section class="p-4 w-full grid grid-cols-1 lg:grid-cols-2 md:p-10">
    <div class="flex flex-wrap space-y-4 w-full">
        <div class="border shadow-sm border-gray-500 max-w-lg w-full overflow-hidden flex flex-row h-fit">
            <img src="picture.jpg" alt="Menu Photo" class="object-cover bg-cover w-1/3">
            <div class="p-3">
                <h2 class="text-xl font-semibold text-gray-800 mb-1">Nasi Goreng</h2>
                <p class="text-gray-500 text-sm mb-3">Note: Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <div class="flex flex-row justify-between mb-2">
                    <div class="flex flex-col">
                        <span class="text-base">Qty: 3</span>
                        <span class="text-base font-bold">Total: Rp 20.000</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </div>
                <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-800"  data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Pesanan</button>
            </div>
        </div>
    </div>
    <div class="rounded bg-blue-50 shadow-sm p-5 w-full mt-5 md:mt-0">
        <h1 class="text-blue-900 text-3xl font-bold mb-2">Summary</h1>
        <ol class="border-b-2 border-t-2 border-blue-700 py-3 space-y-1">
            <li class="flex flex-row justify-between">
                <p class="text-gray-500">Nasi Goreng 1x</p>
                <span class="font-semibold">Rp. 30.000</span>
            </li>
        </ol>
        <h2 class="text-xl font-bold text-blue-700 text-right mb-5">Rp. 30.000</h2>
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