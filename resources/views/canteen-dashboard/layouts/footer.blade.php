<!-- Footer dashboard -->
<footer class="mt-32 bg-blue-200 w-full h-24 p-5 text-blue-700 my-auto">
    <ul class="flex flex-row space-x-4 justify-center">
        <a href="{{ url('/canteen/dashboard') }}"><li>Home</li></a>
        <a href="{{ url('/canteen/dashboard/menu') }}"><li>Menu</li></a>
        <a href="#"><li>Kios</li></a>
        <a href="#"><li>About</li></a>
    </ul>
    <p class="text-center text-sm mt-3">&copy; Muhammad Ali Mustaqim 2022</p>
</footer>

@vite('resources/js/notify-btn.js')
@vite('resources/js/tw-elements.js')