<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 bg-white border-b border-gray-200">
                    <div class="w-80 bg-blue-500 border rounded-md py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <h1 class="ml-5 text-xl font-bold text-white">Appointment for this day</h1>
                        <div class="flex ml-14 mt-4 text-white">
                            <img src="{{ asset('images/icons/queue.png') }}" alt="">
                            <p class="text-7xl ml-14  font-black">{{ $appointmentToday }}</p>
                        </div>
                    </div>
                    <div class="w-80 bg-green-500 border rounded-md py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <h1 class="ml-5 text-xl font-bold text-white">Transaction completed this day</h1>
                        <div class="flex ml-14 mt-4 text-white">
                            <img src="{{ asset('images/icons/task-completed.png') }}" alt="">
                            <p class="text-7xl ml-14  font-black">{{ $completedToday }}</p>
                        </div>
                    </div>
                    <div class="w-80 bg-yellow-500 border rounded-md py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <h1 class="ml-5 text-xl font-bold text-white">Active Counter</h1>
                        <div class="flex ml-14 mt-4 text-white">
                            <img src="{{ asset('images/icons/counter.png') }}" alt="">
                            <p class="text-7xl ml-14  font-black">{{ 1 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white  mt-5 overflow-hidden shadow-sm sm:rounded-lg" >
            <div>
                {!! $chart->container() !!}
                {{ $chart->script() }}
            </div>

        </div>
        </div>
    </div>
</x-app-layout>
