<div >
   @if (auth()->user()->isAn('Admin'))
   <div class="relative flex space-x-4 mb-6">
        <a href="{{ route('vice-pres.create')}}" class="bg-blue-600 hover:bg-blue-800 transition duration-500 transform hover:scale-105  text-white py-2 px-4 rounded flex">
            <i class="mr-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 11C10.2091 11 12 9.20914 12 7C12 4.79086 10.2091 3 8 3C5.79086 3 4 4.79086 4 7C4 9.20914 5.79086 11 8 11ZM8 9C9.10457 9 10 8.10457 10 7C10 5.89543 9.10457 5 8 5C6.89543 5 6 5.89543 6 7C6 8.10457 6.89543 9 8 9Z" fill="currentColor" /><path d="M11 14C11.5523 14 12 14.4477 12 15V21H14V15C14 13.3431 12.6569 12 11 12H5C3.34315 12 2 13.3431 2 15V21H4V15C4 14.4477 4.44772 14 5 14H11Z" fill="currentColor" /><path d="M18 7H20V9H22V11H20V13H18V11H16V9H18V7Z" fill="currentColor" /></svg></i>
            Add Vice President</a>
        <x-input wire:model.debounce.300ms="search" id="search" class="absolute right-0 w-1/3" type="search" name="search" placeholder="Search Voter" :value="old('search')" />
    </div>

    <div class="flex justify-around pt-5 border-t-2">
        @forelse ($vicePresidents as $vicePresident)
        <div class="w-80 bg-white border rounded-lg mt-5 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
            {{-- <div class="grid grid-cols-4 gap-4 mb-2 "> --}}
            <div class="flex items-center ml-5 mt-2 space-x-4">
                @if ($vicePresident->avatar)
                    <img class="w-10 h-14 rounded-full" src="{{ asset('images/profile/'.$vicePresident->avatar) }}" alt="Vice President Picture" />
                @endif
                <div class="col-span-2">
                    <h1 class="mb-1 text-xl font-bold text-gray-700">{{ $vicePresident->full_name}}</h1>
                    <p class="text-sm font-normal text-gray-600 mr-14 hover:underline">{{  $vicePresident->email }}</p>
                </div>
            </div>


            <div class="ml-5">
                <div class="grid grid-cols-2 gap-2">
                    @foreach ( $vicePresident->vice_pres as $viceDepartment)
                            <li>{{ $viceDepartment->description ?? 'No department was assigned' }}</li>
                    @endforeach
                </div>
            </div>

            {{-- <img src="https://images.unsplash.com/photo-1559128010-7c1ad6e1b6a5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80" alt="" /> --}}
            <div class="flex justify-around px-10 mt-2">

                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                    <a href="{{ route('vice-pres.edit', $vicePresident) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>
                </div>

                <div class="w-4 mr-2 transform hover:text-red-800 hover:scale-110">
                    <form action="{{ route('vice-pres.destroy', $vicePresident) }}" method="POST">
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
        {{ $vicePresidents->links() }}
    </div>
   @endif
</div>
