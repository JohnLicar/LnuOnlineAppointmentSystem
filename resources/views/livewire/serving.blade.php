<div>
   <div class="grid grid-cols-4 gap-4 border border-black  p-2">
        <div class="col-span-2 ">
            <div class="w-full ">
                <div class="bg-white rounded">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="text-5xl border-4 border-blue-800 uppercase text-md leading-normal">
                                <th class="py-3 px-6  border-r-4 border-blue-800 text-center">Counter</th>
                                <th class="py-3 px-6 text-center">Now Serving</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counters as $counter)
                            <tr class="border-4 border-blue-800 ">
                                <td class="py-3 px-6 text-center border-r-4 border-blue-800 ">
                                    <div class="text-3xl text-md">
                                        <span>{{ $counter->description }}</span>
                                    </div>
                                </td>

                                <td class="py-3 px-6 text-center border-r-4 border-blue-800 ">
                                    <div class="text-4xl text-md">
                                      <span class="font-bold">{{ $counter->serving->appointment->queuing_number ?? 'Break'}}</span>
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <div class="col-span-2">
            <div class="text-black border-4 border-indigo-800 shadow-lg">
                <div class="text-4xl text-center text-white font-bold  m-2 bg-indigo-800 shadow-lg p-2">
                    <h1>Student Queuing Number</h1>
                </div>

                <div class="text-7xl font-bold text-center m-4">
                    {{  $nextQueue->appointment->queuing_number ?? 'Call' }}
                </div>
                {{-- <div class="text-7xl font-bold text-center m-4">
                    {{ session('callQueue') ?? 'Call' }}
                </div> --}}

                <div class="flex border-t-4 border-indigo-800">
                    <div class="text-4xl text-left  border-r-4 border-indigo-800 text-black font-bold p-2">
                        <h1>Next</h1>
                    </div>
                    <div class="text-4xl text-center border-indigo-800  w-full text-black font-bold   p-2">

                        {{ $nextQueue->nextQueue->queuing_number ?? 'No one next' }}
                        <span>||</span>
                        {{ $nextQueue->nextQueue->full_name ?? 'No one next' }}

                    </div>
                </div>
            </div>
            <div class="text-black border-4 mt-2 border-indigo-800 shadow-lg">
                <div class="text-4xl text-center text-white font-bold  m-2 bg-indigo-800 shadow-lg p-2">
                    <h1>Please Proceed to   {{ $nextQueue->counter->description ?? 'Counter' }}</h1>
                </div>
            </div>
         </div>
     </div>
</div>
