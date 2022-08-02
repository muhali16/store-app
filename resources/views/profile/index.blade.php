@extends('layouts.main')

@section('container')

@include('layouts.header')

<main class="py-7 px-4">
    <section class="w-full flex flex-col space-y-6 ">
        @auth
            <h1 class="w-full text-4xl text-blue-900 font-bold px-4">Selamat datang, {{ $user->firstname }}!</h1>
        @endauth
        <div class="w-full flex flex-wrap p-4"> 
            <div class="w-full h-fit bg-blue-200 rounded shadow-md p-6 md:w-1/5">
                <img src="{{ asset('storage/'.$user->photo) }}" alt="Foto Profile" class="w-32 rounded-lg border-2 border-blue-700 mb-2">
            </div>
            <div class="w-full md:px-7 mt-5 md:w-2/5 md:mt-0">
                <h1 class="text-2xl text-blue-900 font-bold border-gray-300 pb-3">Profile</h1>
                <div class="flex flex-col">
                    <label for="firstname" class="mb-1">Firstname</label >
                    <input type="text" name="firstname" id="firstname" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border disabled:bg-transparent" value="{{ $user->firstname }}" disabled></input>
                    <label for="lastname" class="mb-1">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border disabled:bg-transparent" value="{{ $user->lastname }}" disabled></input>
                    <label for="bio" class="mb-1">Bio</label>
                    <textarea type="text" name="bio" id="bio" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border disabled:bg-transparent" disabled>{{ $user->bio }}</textarea>
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" name="email" id="email" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border disabled:bg-transparent" value="{{ $user->email }}" disabled></input>
                </div>
            </div>
            @if (isset($user->wallet->name))
                <div class="w-full md:px-7 mt-8 md:w-2/5 md:mt-0">
                    <h1 class="text-2xl text-blue-900 font-bold border-b-2 border-gray-300 pb-3">Wallet Information</h1>
                    <table class="table-fixed w-full mt-5">
                        <tr class="border-b">
                            <td class="w-1/3 font-bold">Wallet Name</td>
                            <td class="w-2/3">{{ str()->of($user->wallet->wallet_name)->title }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="w-1/3 font-bold align-top">Phone</td>
                            <td>{{ $user->wallet->no_hp }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="w-1/3 font-bold align-top">Address</td>
                            <td>{{ str()->of($user->wallet->alamat)->title }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="w-1/3 font-bold align-top">Saldo</td>
                            <td>@currency($user->wallet->saldo)</td>
                        </tr>
                    </table>
                </div>
            @endif
        </div>
    </section>
</main>
@include('layouts.footer')
    
@endsection