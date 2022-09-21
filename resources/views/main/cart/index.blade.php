@extends('layouts.main')

@section('container')
@include('layouts.header')
<section class="w-full">
    <center>
        <form action="" method="post">
            <div>
                
                <div className=' flex h-screen justify-center items-center'>
                    <div className='group text-xl'>
                    <strong className='group-hover:text-red-500'>Hover on me </strong>
                    <strong className='group-hover:text-green-500'>the texts will be </strong>
                    <strong className='group-hover:text-blue-500'>of different colors</strong>
                    </div>
                </div>
            </div>
        </form>
    </center>
</section>
@include('layouts.footer')
@endsection