@extends('layouts.main')

@section('container')
<section class="flex flex-col items-center justify-center h-screen">
    <div class="rounded-lg shadow-lg border-t border-r border-l p-7">
        <div class="text-center text-blue-800">
            <h1 class="text-3xl font-bold">Login</h1>
            <h2 class="text-2xl font-semibold">Kantin Kejujuran</h2>
        </div>
        <div class="mt-10">
            <form action="" method="post" class="flex flex-col space-y-5 items-end mb-3 border-b-2 pb-5">
                @csrf
                @if (session('failed-login'))
                    <div class="w-96 bg-red-100 rounded-lg py-2 px-5 mb-4 text-base text-red-700" role="alert">
                        {{ session('failed-login') }}
                    </div>
                @endif
                @if (session('success-login'))
                    <div class="w-96 bg-green-100 rounded-lg py-2 px-5 mb-4 text-base text-green-700" role="alert">
                        {{ session('success-login') }}
                    </div>
                @endif
                <input type="email" name="email" placeholder="Email" class="bg-gray-200 rounded-md py-2 px-3 w-96 border-none focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" autocomplete="off" ></input>
                <input type="password" name="password" placeholder="Password" class="bg-gray-200 rounded-md py-2 px-3 w-96 border-none focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" autocomplete="off"></input>
                <button type="submit" class="py-2 px-3 w-32 rounded-md text-white bg-blue-900 font-bold hover:opacity-80">Login</button>
            </form>
            <p class="text-center text-sm">Don't have account? <a href="/signup" class="text-blue-700 ">Signup</a>.</p>
        </div>
    </div>
</section>
@endsection