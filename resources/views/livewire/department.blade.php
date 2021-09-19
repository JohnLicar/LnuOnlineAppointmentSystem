<div>
    @if(auth()->user()->isAn('Admin'))
    <div class="relative flex space-x-4 mb-3 ">
        <a href="{{ route('department.create')}}" class="bg-blue-600 flex hover:bg-blue-800 transition duration-500 transform hover:scale-105  text-white py-2 px-4 rounded">
            <i class="mr-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7V11H7C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11V17C11 17.5523 11.4477 18 12 18C12.5523 18 13 17.5523 13 17V13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H13V7Z" fill="currentColor" /></svg></i>
            Add Department</a>
        <x-input wire:model.debounce.300ms="search" id="search" class="absolute right-0 w-1/3 " type="search" name="search" placeholder="Search Voter" :value="old('search')" />
    </div>


    <div class="flex justify-around pt-5 border-t-2">

        @forelse ($departments as $department)
        <div class="w-80 bg-white border rounded-lg mt-5 py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
            <div class="flex items-center mb-2 space-x-4">
                <div class="mx-2">
                    <h1 class="mb-1 text-xl font-bold text-gray-700">{{ $department->description }}</h1>
                   {{-- @foreach ($department->vice_pres as $officer) --}}
                        <p class="text-sm font-normal text-gray-600 mr-14">Assigned VP: <span class="font-semibold  hover:underline">{{ $department->vice_pres->full_name ??  'No assigned Vice President' }}</span></p>
                        <p class="text-sm font-normal text-gray-600 mr-14">Assigned CH: <span class="font-semibold  hover:underline">{{ $department->chairman->full_name ??  'No assigned Vice Chairman' }}</span></p>
                   {{-- @endforeach --}}
                </div>
            </div>

            <div class="flex justify-around px-10 py-6">

                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <a href="{{ route('department.edit', $department) }}">
                        <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                </div>

                <div class="w-4 mr-2 transform hover:text-red-800 hover:scale-110">
                    <form action="{{ route('department.destroy', $department) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="w-4 h-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 1 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="flex justify-center">
            <div>
                <img class="w-24 h-24" src="{{ asset('images/icons/undraw_void_3ggu.png' )}}" alt="Empty" />
                <div class="mr-8">
                    No data was found
                </div>
            </div>
        </div>
        @endforelse

    </div>
    <div class="mt-4">
        {{ $departments->links() }}
    </div>
    @endif
</div>
