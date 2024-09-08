<div class="w-full px-4 md:px-0">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between max-w-4xl mb-8 mx-auto">
        <h2 class="text-blue-700 font-extrabold text-3xl text-center md:text-left mb-4 md:mb-0">Add New Employee</h2>
        <a href="/dashboard" class="p-3 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition-colors duration-200 text-center">Cancel</a>
    </div>

    <!-- Form Section -->
    <div class="mx-auto p-8 bg-white rounded-lg shadow-lg max-w-4xl">

        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit="save" enctype="multipart/form-data" x-data="{ profilePicPreview: '' }">

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

            <!-- Profile Picture Upload with Preview -->
            <div class="mb-6">
                <label for="profilePic" class="block text-sm font-medium text-gray-800">Profile Picture</label>
                <input id="profilePic" type="file" wire:model="profile_pic" accept="image/*" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm p-3" @change="profilePicPreview = URL.createObjectURL($event.target.files[0])">
                @error('profile_pic')
                <div class="text-red-500 text-sm">{{$message}}</div>
                @enderror
                <div class="mt-4" x-show="profilePicPreview">
                    <p class="text-sm text-gray-500 mb-2">Image Preview:</p>
                    <img :src="profilePicPreview" class="w-32 h-32 rounded-full object-cover border border-gray-300 shadow-sm" alt="Profile Picture Preview">
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
                <button type="submit" class="py-3 px-6 bg-blue-700 text-white rounded-lg shadow-md hover:bg-blue-800 transition-colors duration-200">Submit</button>
            </div>

        </form>
    </div>

</div>
