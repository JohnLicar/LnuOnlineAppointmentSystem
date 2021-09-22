<x-guest-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department List') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">

                    <!-- component -->
                    @livewire('serving')
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
