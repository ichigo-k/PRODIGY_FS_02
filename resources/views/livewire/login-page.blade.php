<div class="flex items-center justify-center min-h-screen">



    <div class="flex w-full max-w-3xl bg-white shadow-lg rounded-lg overflow-hidden max-md:flex-col-reverse">
        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-blue-600 mb-2">Admin Login</h2>
            <p class="text-gray-700 mb-6">Welcome to the Admin login page</p>

            <form class="space-y-6" wire:submit.prevent="login" >
                <div class="flex flex-col">
                    <label for="email" class="mb-2 text-gray-900 font-semibold text-lg">Email <span
                            class="text-red-500">*</span></label>
                    <input id="email" wire:model.live="email" type="email" placeholder="test@example.com"
                           class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$email}}"/>
                    @error('email')
                        <div class="text-sm text-red-500">{{$message}}</div>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="password" class="mb-2 text-gray-900 font-semibold text-lg">Password <span
                            class="text-red-500">*</span></label>
                    <input id="password" wire:model.live="password" type="password" placeholder="********"
                           class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('password')
                    <div class="text-sm text-red-500">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300 w-full hover:scale-105">
                    Log In
                </button>
            </form>
        </div>

        <!-- Image Section -->
        <div class=" md:block md:w-1/2 w-full">
            <img src="{{asset('/assets/login2.jpeg')}}" alt="Login Image" class="w-full h-full object-cover">
        </div>
    </div>
</div>
