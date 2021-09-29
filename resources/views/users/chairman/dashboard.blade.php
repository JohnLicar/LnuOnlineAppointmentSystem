<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 p-6 bg-white border-b border-gray-200">
                    <div class="w-80 bg-blue-500 border rounded-lg py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <div class="flex items-center ml-5 mb-2 space-x-4">
                            <div class="col-span-2">
                                <h1 class=" text-xl font-bold text-white">Appointment for this day</h1>
                            </div>
                        </div>
                    </div>
                    <div class="w-80 bg-blue-500 border rounded-lg py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <div class="flex items-center ml-5 mb-2 space-x-4">
                            <div class="col-span-2">
                                <h1 class=" text-xl font-bold text-white">Appointment for this day</h1>
                            </div>
                        </div>
                    </div>
                    <div class="w-80 bg-blue-500 border rounded-lg py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <div class="flex items-center ml-5 mb-2 space-x-4">
                            <div class="col-span-2">
                                <h1 class=" text-xl font-bold text-white">Appointment for this day</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
