<nav class="w-full flex justify-between items-center py-4 ">
    <!-- Search Input -->
   <livewire:searchBar/>

    <!-- User Profile and Dropdown -->
    <div class="relative flex gap-x-4 items-center" x-data="{ open: false }
    ">
        <!-- Profile Image -->
        <img src="{{asset('assets/login1.png')}}"
             class="w-10 h-10 rounded-full ring-2 ring-blue-500 cursor-pointer hover:ring-blue-700 transition-all duration-200"
             @click="open = !open"/>

        <!-- User Name (hidden on small screens) -->
        <p class="hidden md:block font-semibold text-xl text-gray-700">{{$name}}</p>

        <!-- Dropdown Menu -->
        <div class="absolute right-5 top-16 bg-white p-4 w-[10rem] shadow-lg flex flex-col gap-y-3 rounded-md transition-all duration-200 transform origin-top-right scale-95"
             x-show="open"
             @click.outside="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-90"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-90">

            <!-- User Name for small screens -->
            <p class="block md:hidden font-semibold text-sm text-gray-700">{{$name}}</p>

            <!-- Logout Button -->
            <button @click="logout()" class="w-full bg-red-500 text-white rounded-md shadow-md hover:bg-red-600 p-2 transition-all duration-150">
                Log Out
            </button>
        </div>
    </div>
</nav>
