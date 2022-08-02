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
                <form action="/user/{{ $user->slug }}/photo" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <label for="profile_photo" class="text-md text-gray-600 text-semibold mb-2">Ganti Foto Profile</label>
                    @if (session('success-change-photo'))
                        <div class="w-full bg-green-300 border border-green-700 text-green-900 text-lg rounded-md my-4 p-3">
                            {{ session('success-change-photo') }}
                        </div>
                    @endif
                    <input type="file" name="profile_photo" id="profile_photo" class="block file:bg-blue-300 file:border-none file:hover:bg-blue-900 file:hover:text-white file:rounded-md file:text-blue-800 file:px-3 text-gray-600" required></input>
                    @error('profile_photo')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" name="change_photo" class="block bg-blue-900 text-white px-4 py-1 mt-2 rounded shadow-md hover:opacity-75">Edit</button>
                </form>
            </div>
            <div class="w-full md:px-7 mt-5 md:w-2/5 md:mt-0">
                <h1 class="text-2xl text-blue-900 font-bold border-gray-300 pb-3">Edit Profile</h1>
                <form action="{{ route('user.update', ['user' => $user->slug]) }}" method="post" class="flex flex-col text-blue-900">
                    @method('patch')
                    @csrf
                    <label for="firstname" class="mb-1">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border  @error('firstname') ring-2 ring-red-600 @enderror" value="{{ $user->firstname }}"></input>
                    @error('firstname')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="lastname" class="mb-1">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border  @error('lastname') ring-2 ring-red-600 @enderror" value="{{ $user->lastname }}"></input>
                    @error('lastname')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="bio" class="mb-1">Bio</label>
                    <textarea type="text" name="bio" id="bio" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border  @error('bio') ring-2 ring-red-600 @enderror">{{ $user->bio }}</textarea>
                    @error('bio')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" name="email" id="email" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border @error('email') ring-2 ring-red-600 @enderror" value="{{ $user->email }}"></input>
                    @error('email')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" name="change_profile" class="w-fit bg-blue-900 text-white px-4 py-1 mt-5 rounded shadow-md hover:opacity-75">Edit</button>
                </form>
                <hr class="my-5 border-blue-500">
                <form action="/user/{{ $user->slug }}/password" method="post" class="flex flex-col text-blue-900">
                    @method('put')
                    @csrf
                    <h1 class="text-2xl text-blue-900 font-bold pb-3">Ganti Password</h1>
                    @if (session('success-change-password'))
                        <div class="w-full bg-green-300 border border-green-700 text-green-900 text-lg rounded-md my-4 p-3">
                            {{ session('success-change-password') }}
                        </div>
                    @endif
                    @if (session('failed-password'))
                        <div class="w-full bg-red-300 border border-red-700 text-red-900 text-lg rounded-md my-4 p-3">
                            {{ session('failed-password') }}
                        </div>
                    @endif
                    <label for="password" class="mb-1">Old Password</label>
                    <input type="password" name="password" id="password" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border"></input>
                    @error('password')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="new-password" class="mb-1">New Password</label>
                    <input type="password" name="new-password" id="new-password" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border"></input>
                    @error('new-password')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="new-password_confirmation" class="mb-1">Confirm New Password</label>
                    <input type="password" name="new-password_confirmation" id="new-password_confirmation" class="px-2 py-1 text-gray-600 rounded mb-3 focus:outline-none focus:ring-1 focus:ring-blue-600 border-blue-400 border"></input>
                    @error('new-password_confirmation')
                        <div class="text-red-600 text-sm font-semibold text-right w-full">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="w-fit bg-blue-900 text-white px-4 py-1 mt-5 rounded shadow-md hover:opacity-75">Ganti</button>
                </form>
            </div>
            @if ($user->wallet)
            <div class="w-full md:px-7 mt-8 md:w-2/5 md:mt-0">
                <h1 class="text-2xl text-blue-900 font-bold border-b-2 border-gray-300 pb-3">Wallet Information</h1>
                <table class="table-fixed w-full mt-5">
                    <tr class="border-b">
                        <td class="w-1/3 font-bold">Wallet Name</td>
                        <td class="w-2/3">{{ str()->of($user->wallet->wallet_name)->title() }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-1/3 font-bold align-top">Phone</td>
                        <td>{{ $user->wallet->no_hp }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-1/3 font-bold align-top">Address</td>
                        <td>{{ str()->of($user->wallet->alamat)->title() }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-1/3 font-bold align-top">Saldo</td>
                        <td>@currency($user->wallet->saldo ?? 0)</td>
                    </tr>
                </table>
            </div>
            @endif
        </div>
    </section>
</main>
@include('layouts.footer')
@endsection