<div x-data="{ viewMode: 'cards' }" class="mt-4 w-full flex flex-col space-y-6">

    <!-- Header -->
    <div class="flex flex-row justify-between items-center w-full space-y-4 md:space-y-0">
        <h1 class="text-gray-800 font-extrabold text-xl md:text-3xl text-center">All Employees</h1>

        <!-- Toggle View Buttons -->
        <div class="flex items-center space-x-4">
            <button @click="viewMode = 'cards'"
                    class="rounded-full shadow-md bg-blue-600 hover:bg-blue-700 transition-all duration-300 py-2 px-4 text-white font-semibold
                           flex items-center space-x-2 focus:outline-none"
                    :class="{ 'bg-gray-400 disabled:': viewMode === 'cards' }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                </svg>
            </button>
            <button @click="viewMode = 'table'"
                    class="rounded-full shadow-md bg-blue-600 hover:bg-blue-700 transition-all duration-300 py-2 px-4 text-white font-semibold
                           flex items-center space-x-2 focus:outline-none"
                    :class="{ 'bg-gray-400': viewMode === 'table' }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18" />
                </svg>
            </button>

            <!-- Add Employee Button -->
            <a href="/employee/new" class="rounded-full shadow-md bg-green-500 hover:bg-green-600 transition-all duration-300 py-2 px-6 text-white font-semibold">
                Add Employee
            </a>
        </div>
    </div>

    <!-- Card View -->
    <div x-show="viewMode === 'cards'" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($employees as $employee)
            <div class="bg-white rounded-lg shadow-md p-4 text-center transition-all duration-300 hover:shadow-xl hover:scale-105">
                <img src="{{$employee['profile_pic']}}" alt="Employee Picture" class="mx-auto w-24 h-24 rounded-full object-cover shadow-sm"/>
                <p class="font-bold mt-4 text-gray-800 text-lg">{{$employee['fName']}} {{$employee['lName']}}</p>
                <p class="text-sm text-gray-500">{{$employee['job_title']}}</p>
                <a href="/employee/{{$employee['id']}}"
                   class="inline-block mt-4 border border-blue-500 rounded-full px-4 py-2 text-blue-500 font-semibold text-sm
                      hover:text-white hover:bg-blue-500 hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-105">
                    View Profile
                </a>
            </div>
        @endforeach
    </div>

    <!-- Table View -->
    <div x-show="viewMode === 'table'" class="w-full bg-white rounded-lg shadow-md p-4 overflow-x-auto">
        <table class="w-full table-auto text-center border-collapse">
            <thead class="text-gray-600 uppercase text-sm font-semibold">
            <tr class="border-b border-gray-300">
                <th class="py-3">Employee</th>
                <th class="py-3 hidden md:table-cell">Designation</th>
                <th class="py-3 hidden md:table-cell">Gender</th>
                <th class="py-3 hidden md:table-cell">Department</th>
                <th class="py-3">Details</th>
            </tr>
            </thead>

            <tbody>
            @foreach($employees as $employee)
                <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition-all duration-300">
                    <td class="py-4 px-4 text-sm flex items-center gap-x-3">
                        <img src="{{$employee['profile_pic']}}" alt="Employee Picture" class="w-12 h-12 rounded-full object-cover shadow-sm"/>
                        <div class="text-left">
                            <p class="font-semibold text-gray-700">{{$employee['fName']}} {{$employee['lName']}}</p>
                        </div>
                    </td>
                    <td class="py-4 px-4 hidden md:table-cell">{{$employee['job_title']}}</td>
                    <td class="py-4 px-4 hidden md:table-cell">{{$employee['gender']}}</td>
                    <td class="py-4 px-4 hidden md:table-cell">{{$employee['Department']}}</td>
                    <td class="py-4 px-4">
                        <a href="/employee/{{$employee['id']}}"
                           class="inline-block border border-blue-500 rounded-full px-5 py-2 text-blue-500 font-semibold text-sm
                                      hover:text-white hover:bg-blue-500 hover:shadow-md transition-all duration-300 ease-in-out transform hover:scale-105">
                            View Details
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="w-full mt-6 justify-center items-center mb-5 ">
        {{$employees->links()}}
    </div>
</div>
