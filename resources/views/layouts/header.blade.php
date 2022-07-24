<header class="flex flex-col">
    <div class="w-full px-4 py-3 bg-gradient-to-l from-blue-700 to-blue-900 flex flex-row justify-between items-center md:px-10">
        <h1 class="text-3xl font-bold text-white">Kantin Kejujuran</h1>
        <ul class="flex flex-row space-x-2">
            @guest
                <li>
                    <a href="/login">
                        <button class="text-base font-bold text-white bg-blue-400 px-3 py-1 rounded-full transition ease-in duration-200 hover:bg-blue-200 hover:text-blue-500 active:-translate-y-1">
                            Login
                        </button>
                    </a>
                </li>
                <li>
                    <a href="/signup">
                        <button class="text-base font-bold text-white bg-blue-400 px-3 py-1 rounded-full transition ease-in-out duration-100 hover:bg-blue-200 hover:text-blue-500">
                            Signup
                        </button>
                    </a>
                </li>
            @endguest
            @auth
                </li class="relative">
                    <button id="setting-toggle" class="stroke-white rounded-full hover:opacity-80">
                        <svg class="stroke-white hover:rotate-180 transition ease-in-out duration-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    </button>
                    <div id="setting-menu" class="hidden absolute z-50 translate-y-14 right-24 w-44 px-5 py-3 bg-blue-600 text-white text-md font-semibold rounded-md shadow-lg">
                        <ul>
                            <a href="{{ route('user.show', ['user' => auth()->user()->slug]) }}"><li class="mb-3 hover:text-gray-200 w-full">Edit Profile</li></a>
                            <a href="#"><li class="mb-3 hover:text-gray-200 w-full">Edit Kantin</li></a>
                            <a href="#"><li class="mb-3 hover:text-gray-200 w-full">Buka Kantin</li></a>
                            <li class="hover:text-gray-200 w-full"><a href="/logout">Logout</a></li>
                        </ul>
                    </div>
                </li>
                <li class="pr-3">
                    <button class="p-3 stroke-white rounded-full relative hover:opacity-80">
                        <span class="absolute text-md text-white font-bold bg-red-600 px-1 w-fit rounded-full -right-1 bottom-1 text-sm">1</span>
                        <svg class="stroke-white" xmlns="http://www.w3.org/2000/svg" class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="20.5" r="1"/><circle cx="18" cy="20.5" r="1"/><path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1"/></svg>
                    </button>
                </li>
            @endauth
        </ul>
    </div>
    <div id="search" class="relative w-full px-4 py-3 bg-blue-900 flex flex-row justify-between items-center md:px-10">
        <button id="menu-toggle" class="bg-blue-400 p-2 rounded  hover:bg-blue-600 md:hidden active:scale-75 transition ease-in duration-50">
            <div class="w-5 bg-white h-1 mb-1 rounded"></div>
            <div class="w-5 bg-white h-1 mb-1 rounded"></div>
            <div class="w-5 bg-white h-1 rounded"></div>
        </button>
        <nav id="nav-menu" class="hidden w-52 z-50 absolute top-12 p-4 shadow-lg backdrop-blur-lg rounded-lg  bg-blue-400/50 md:static md:block md:shadow-none md:rounded-none md:max-full md:mb-0 md:p-0 md:bg-transparent">
            <ul class="block-inline md:flex md:flex-row">
                <li class="group py-1 pr-6 text-blue-900 text-lg font-semibold hover:text-blue-700 md:text-white">
                    <a href="/home">
                        <button>
                            Home
                        </button>
                    </a>
                </li>
                <li class="group py-1 pr-6 text-blue-900 text-lg font-semibold hover:text-blue-700 md:text-white">
                    <a href="#canteen">
                        <button>
                            Canteen
                        </button>
                    </a>
                </li>
                <li class="group py-1 pr-6 text-blue-900 text-lg font-semibold hover:text-blue-700 md:text-white">
                    <a href="#menu">
                        <button>
                            Menu
                        </button>
                    </a>
                </li>
                <li class="group py-1 pr-6 text-blue-900 text-lg font-semibold hover:text-blue-700 md:text-white">
                    <a href="#about">
                        <button>
                            About
                        </button>
                    </a>
                </li>
            </ul>
        </nav>
        <form action="">
            <input type="text" class="px-3 bg-blue-50 border-none rounded-full w-52 h-7 focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Cari apa?">
            <button class="text-white text-lg bg-blue-400 px-2  rounded-full">
                Cari
            </button>
        </form>
        
        
    </div>
</header>
