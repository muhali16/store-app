@extends('layouts.main')

@section('container')
<section class="flex flex-col items-center justify-center h-screen">
    <div class="rounded-lg shadow-lg border-t border-r border-l p-7">
        <div class="text-center text-blue-800">
            <h1 class="text-3xl font-bold">Signup</h1>
            <h2 class="text-2xl font-semibold">Kantin Kejujuran</h2>
        </div>
        <div class="mt-10">
            <form action="/user" method="POST" class="flex flex-col space-y-5 items-end mb-3 border-b-2 pb-5">
                @csrf
                <input type="text" name="firstname" placeholder="Firstname" class="bg-gray-200 rounded-md py-2 px-3 w-96 border-none @error('name') ring-2 ring-red-600 @enderror focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" autocomplete="on" required value="{{ old('firstname') }}"></input>
                @error('firstname')
                    <div class="text-red-600 text-sm font-semibold text-right w-full">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" name="lastname" placeholder="Lastname" class="bg-gray-200 rounded-md py-2 px-3 w-96 border-none @error('lastname') ring-2 ring-red-600 @enderror focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" autocomplete="on" required value="{{ old('lastname') }}"></input>
                @error('lastname')
                    <div class="text-red-600 text-sm font-semibold text-right w-full">
                        {{ $message }}
                    </div>
                @enderror
                <input type="email" name="email" placeholder="Email" class="bg-gray-200 @error('email') ring-2 ring-red-600 @enderror rounded-md py-2 px-3 w-96 border-none focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" autocomplete="on" required value="{{ old('email') }}"></input>
                @error('email')
                    <div class="text-red-600 text-sm font-semibold text-right w-full">
                        {{ $message }}
                    </div>
                @enderror
                <input type="password" name="password" placeholder="Password" class="bg-gray-200 rounded-md @error('password') ring-2 ring-red-600 @enderror py-2 px-3 w-96 border-none focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" autocomplete="on" required></input>
                @error('password')
                    <div class="text-red-600 text-sm font-semibold text-right w-full">
                        {{ $message }}
                    </div>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Password Confirm" class="bg-gray-200  @error('password_confirmation') ring-2 ring-red-600 @enderror rounded-md py-2 px-3 w-96 border-none focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" autocomplete="on" required></input>
                @error('password_confirmation')
                    <div class="text-red-600 text-sm font-semibold text-right w-full">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class="py-2 px-3 w-32 rounded-md text-white bg-blue-900 font-bold hover:opacity-80">Login</button>
            </form>
            <p class="text-center text-sm">Already have account? <a href="{{ route('login') }}" class="text-blue-700 ">Login</a>.</p>
        </div>
    </div>
</section>
@endsection