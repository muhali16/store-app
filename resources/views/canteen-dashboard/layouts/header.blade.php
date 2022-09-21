<!-- Head dashboard -->
<nav class="md:px-10 px-4 py-3 bg-blue-200 w-full lg:flex lg:flex-row align-baseline justify-between">
    <h1 class="text-2xl text-blue-900 font-bold">Dashboard Kantin</h1>
    <ul class="flex flex-wrap lg:space-x-4">
        <a href="{{ url('/canteen/dashboard') }}"><li class="text-blue-500 px-2 py-1 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">Home</li></a>
        <a href="{{ url('/canteen/dashboard/menu') }}"><li class="text-blue-500 px-2 py-1 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">Menu</li></a>
        <a href="#"><li class="text-blue-500 px-2 py-1 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">Kios</li></a>
        <a href="#"><li class="text-blue-500 px-2 py-1 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">About</li></a>
        <a href="{{ route('home') }}"><li class="text-red-500 px-2 py-1 rounded-lg font-semibold hover:bg-red-500 hover:text-white">Exit Dashboard</li></a>
    </ul>
</nav>