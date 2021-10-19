<div class="overflow-x-auto" >
    <div class="w-full">
        <div class="grid md:grid-cols-5 sm:grid-cols-1 gap-4">

            @livewire('appointment-table-form')

            <div class="col-span-4 overflow-x-auto">
                <div class=" flex justify-between space-x-4  mb-6">
                    <div>
                        <button type="button" id="callQueue" wire:click.prevent="callQueue({{ $appointments[0]->id  ?? null}}, {{  $counter_id  }}, {{ $appointments[1]->id ?? null }})"  onClick="playSound()"
                            class="{{ count($appointments) == '0'  ? 'text-white py-2 px-4 rounded flex bg-red-900 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-800 transition duration-500 transform hover:scale-105   text-white py-2 px-4 rounded flex' }}"
                            @if(count($appointments) == '0') disabled='disabled' @endif
                            >
                            <i class="mr-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 12C22 10.6868 21.7413 9.38647 21.2388 8.1731C20.7362 6.95996 19.9997 5.85742 19.0711 4.92896C18.1425 4.00024 17.0401 3.26367 15.8268 2.76123C14.6136 2.25854 13.3132 2 12 2V4C13.0506 4 14.0909 4.20703 15.0615 4.60889C16.0321 5.01099 16.914 5.60034 17.6569 6.34326C18.3997 7.08594 18.989 7.96802 19.391 8.93848C19.7931 9.90918 20 10.9495 20 12H22Z" fill="currentColor" /><path d="M2 10V5C2 4.44775 2.44772 4 3 4H8C8.55228 4 9 4.44775 9 5V9C9 9.55225 8.55228 10 8 10H6C6 14.4182 9.58173 18 14 18V16C14 15.4478 14.4477 15 15 15H19C19.5523 15 20 15.4478 20 16V21C20 21.5522 19.5523 22 19 22H14C7.37259 22 2 16.6274 2 10Z" fill="currentColor" /><path d="M17.5433 9.70386C17.8448 10.4319 18 11.2122 18 12H16.2C16.2 11.4485 16.0914 10.9023 15.8803 10.3928C15.6692 9.88306 15.3599 9.42017 14.9698 9.03027C14.5798 8.64014 14.1169 8.33081 13.6073 8.11963C13.0977 7.90869 12.5515 7.80005 12 7.80005V6C12.7879 6 13.5681 6.15527 14.2961 6.45679C15.024 6.7583 15.6855 7.2002 16.2426 7.75732C16.7998 8.31445 17.2418 8.97583 17.5433 9.70386Z" fill="currentColor" /></svg></i>
                            Call Queue
                        </button>

                        <audio id="play" src="{{ asset('audio/Ding-dong-sound-effect.mp3') }}"></audio>
                    </div>
                    <div class=" w-1/3">
                        <select id="service_id" name="service_id" wire:model="serviceId" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="0">All</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" w-1/3">
                        <select id="counter_id" name="counter_id" wire:model="counter_id" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="" disabled>Select a Counter</option>
                            @foreach ($counters as $counter)
                                <option value="{{ $counter->id }}">
                                    {{ $counter->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @if (!count($appointments) == '0')
                <div class="bg-white shadow-md rounded  border-4  border-opacity-100 overflow-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 uppercase text-md leading-normal">
                                <th class="px-6 py-3 text-left text-sm font-semibold  text-gray-500 uppercase tracking-wider">Queuing Number</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold  text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold  text-gray-500 uppercase tracking-wider">Full Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Status</th>

                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-base font-light">
                            @foreach ($appointments as $appointment)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">

                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-bold mr-2 text-blue-800">
                                            {{ $appointment->queuing_number }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-medium text-gray-900">{{ $appointment->service->description }}</div>
                                    <div class="text-sm text-gray-500">{{ $appointment->department->description }}</div>
                                </td>

                                  <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div>
                                        <div class="text-medium font-medium text-gray-900">
                                            {{ $appointment->full_name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $appointment->email}}
                                        </div>
                                      </div>
                                    </div>
                                  </td>


                                  <td class="px-6 py-4 whitespace-nowrap text-medium text-gray-900">
                                    {{-- {{ $appointment->created_at->toFormatedDate()}} --}}
                                    @if ($appointment->waiting)
                                        <span class="bg-pink-200 text-pink-600 py-1 px-3 rounded-full ">Waiting</span>
                                    @else
                                        <span class=" bg-green-200 text-green-600 py-1 px-3 rounded-full ">Queuing</span>
                                    @endif
                                  </td>
                                {{-- <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-right">
                                        <div class="mr-2">
                                            {{ $appointment->created_at}}
                                        </div>
                                    </div>
                                </td> --}}


                                {{-- <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-right">
                                        <div class="mr-2">
                                            {{ $appointment->email}}
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="flex justify-center">
                        <div>
                            <img class="w-24 h-24 ml-11" src="{{ asset('images/icons/undraw_void_3ggu.png' )}}" alt="Empty" />
                            <div>
                                No Appointment was found
                            </div>
                        </div>
                    </div>
                @endif
                <div class="mt-4">
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
    function playSound () {
        var ddl = document.getElementById("counter_id");
        var selectedValue = ddl.options[ddl.selectedIndex].value;
        if (selectedValue == "")
        {
            alert("Please select a counter");
        }else{
            document.getElementById('play').play();
        }

    }
    </script>
@endpush
