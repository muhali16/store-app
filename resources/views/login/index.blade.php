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
                    <div class="w-80 bg-red-100 rounded-lg py-2 px-5 mb-4 text-base text-red-700" role="alert">
                        {{ session('failed-login') }}
                    </div>
                @endif
                @if (session('success-login'))
                    <div class="w-80 bg-green-100 rounded-lg py-2 px-5 mb-4 text-base text-green-700" role="alert">
                        {{ session('success-login') }}
                    </div>
                @endif
                <input type="email" name="email" placeholder="Email" class="bg-gray-200 rounded-md py-2 px-3 w-80 border-none focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white @error('email')
                    ring-2 ring-red-600
                @enderror" value="{{ old('email') }}">
                @error('email')
                    <span class="text-right text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="relative w-fit h-fit">
                    <input type="password" name="password" placeholder="Password" class="bg-gray-200 rounded-md py-2 px-3 w-80 border-none focus:ring-2 focus:ring-gray-400 focus:outline-none focus:bg-white" id="pass">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 bottom-1.5 icon icon-tabler icon-tabler-eye stroke-blue-600 cursor-pointer" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" id="eye">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" id="eye"></path>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                     </svg>
                </div>
                <button type="submit" class="py-2 px-3 w-32 rounded-md text-white bg-blue-900 font-bold hover:opacity-80">Login</button>
            </form>
            <p class="text-center text-sm">Don't have account? <a href="{{ route('signup') }}" class="text-blue-700 ">Signup</a>.</p>
        </div>
    </div>
</section>

<script type="text/javascript">
    var eye = document.getElementById('eye')
    var pass = document.getElementById('pass')

    const close = '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="3" x2="21" y2="21"></line><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341"></path>'
    const open = '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>'

    eye.addEventListener('click', function(){
        if( pass.type == "password"){
            pass.type = 'text'
            eye.innerHTML = close
        } else {
            pass.type = 'password'
            eye.innerHTML = open
        }
        eye.classList.toggle('stroke-gray-400')
    })
</script>
@endsection