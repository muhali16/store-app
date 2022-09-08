<!-- Head dashboard -->
<nav class="p-4 bg-blue-200 w-full lg:flex lg:flex-row align-baseline justify-between">
    <h1 class="text-2xl text-blue-900 font-bold mx-2">Dashboard Kantin</h1>
    <ul class="flex flex-wrap lg:space-x-4">
        <a href="{{ url('/canteen/dashboard') }}"><li class="text-blue-500 px-2 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">Home</li></a>
        <a href="{{ url('/canteen/dashboard/menu') }}"><li class="text-blue-500 px-2 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">Menu</li></a>
        <a href="#"><li class="text-blue-500 px-2 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">Kios</li></a>
        <a href="#"><li class="text-blue-500 px-2 rounded-lg font-semibold hover:bg-blue-400 hover:text-white">About</li></a>
    </ul>
</nav>