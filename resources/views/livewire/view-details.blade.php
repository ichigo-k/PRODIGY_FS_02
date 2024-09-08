<div class="container mx-auto px-4 md:px-8 py-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">

        <!-- Flash Messages -->
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between mb-6">
            <h2 class="text-blue-700 font-extrabold text-3xl mb-4 md:mb-0">Employee Details</h2>
            <div class="flex space-x-4">
                <button wire:click="confirmDelete" class="p-3 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition-colors duration-200">Delete</button>
                <a href="/dashboard" class="p-3 bg-gray-500 text-white rounded-lg shadow-md hover:gray-600  transition-colors duration-200">Back</a>
            </div>
        </div>

        <img src="{{ $employee->profile_pic ? asset($employee->profile_pic) : asset('images/default-profile-pic.jpg') }}"
             alt="Profile Picture"  class="w-32 h-32 rounded-full object-cover border border-gray-300 shadow-sm" >

        <!-- Employee Details Form -->
        <form wire:submit.prevent="save">

            <!-- First and Last Name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="firstName" class="block text-sm font-medium text-gray-800">First Name</label>
                    <input id="firstName" type="text" wire:model="fName" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                    @error('fName')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="lastName" class="block text-sm font-medium text-gray-800">Last Name</label>
                    <input id="lastName" type="text" wire:model="lName" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                    @error('lName')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Date of Birth and Gender -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-800">Date of Birth</label>
                    <input id="dob" type="date" wire:model="DoB" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                    @error('DoB')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-800">Gender</label>
                    <select id="gender" wire:model="gender" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                        <option  disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('gender')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>



            <!-- Nationality, Phone, and Address -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label for="nationality" class="block text-sm font-medium text-gray-800">Nationality</label>
                    <input id="nationality" type="text" wire:model="nationality" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                    @error('nationality')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="phoneNumber" class="block text-sm font-medium text-gray-800">Phone Number</label>
                    <input id="phoneNumber" type="text" wire:model="phone_number" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                    @error('phone_number')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-800">Address</label>
                    <input id="address" type="text" wire:model="address" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                    @error('address')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Email and Job Title -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                    <input id="email" type="email" wire:model="email" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" >
                    @error('email')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="jobTitle" class="block text-sm font-medium text-gray-800">Job Title</label>
                    <input id="jobTitle" type="text" wire:model="job_title" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3">
                    @error('job_title')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Joining Date and Department -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="joiningDate" class="block text-sm font-medium text-gray-800">Joining Date</label>
                    <input id="joiningDate" type="date" wire:model="joining_date" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3">
                    @error('joining_date')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="Department" class="block text-sm font-medium text-gray-800">Department</label>
                    <input id="Department" type="text" wire:model="department" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3">
                    @error('Department')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div >
                <button type="submit" class="py-3 px-6 bg-blue-700 text-white rounded-lg shadow-md hover:bg-blue-800 transition-colors duration-200">Save Changes</button>
            </div>

        </form>

        <!-- Modals -->
        <!-- Delete Confirmation Modal -->
        @if ($deleteConfirm)
            <div class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold mb-4">Are you sure you want to delete this employee?</h3>
                    <div class="flex space-x-4">
                        <button wire:click="delete" class="p-3 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition-colors duration-200">Delete</button>
                        <button wire:click="$set('deleteConfirm', false)" class="p-3 bg-gray-300 text-gray-800 rounded-lg shadow-md hover:bg-gray-400 transition-colors duration-200">Cancel</button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
