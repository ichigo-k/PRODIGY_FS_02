<div class="relative" x-data="{ isOpen: true }" @click.away="isOpen = false" @keydown.escape.window="isOpen = false">
    <input
        class="md:w-[30rem] w-[15rem] p-2 rounded-2xl shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-150"
        placeholder="Search employee"
        wire:model.live="search"
        @focus="isOpen = true"
        @input="isOpen = true"
    />

    @if(strlen($search) > 1)
        <div
            class="md:w-[30rem] w-[15rem] p-2 rounded-2xl max-h-[20rem] shadow-lg bg-white absolute z-[60] top-[4rem] overflow-y-auto"
            x-show="isOpen"
            @click.away="isOpen = false"
        >
            @if(count($results) > 0)
                @foreach($results as $result)
                    <a href="/employee/{{$result->id}}" class="p-2 hover:bg-gray-100 cursor-pointer flex items-center mx-auto space-x-3">
                        <img src="{{$result->profile_pic}}" alt="Profile Picture" class="w-12 h-12 rounded-full object-cover shadow-sm" />

                        <div>
                            <div class="font-medium">{{$result->fName}} {{$result->lName}}</div>
                            <div class="text-sm text-gray-500">{{$result->email}}</div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="p-2 text-gray-500">
                    Employee with name "{{$search}}" not found
                </div>
            @endif
        </div>
    @endif
</div>
