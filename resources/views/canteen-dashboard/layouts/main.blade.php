@extends('layouts.main')

@section('container')
    @include('canteen-dashboard.layouts.header')
    @yield('fill')
    @include('canteen-dashboard.layouts.footer')
@endsection