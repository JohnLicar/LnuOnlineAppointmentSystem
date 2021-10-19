<div>
    @if(auth()->user()->isAn('Vice_President'))

    <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
        <div class="p-6  bg-white border-b border-gray-200 ">
            <div>
                <p class="font-semibold text-xl text-gray-800 leading-tight mr-14">
                    Assigned Chairman:
                    <span class="font-bold  hover:underline">{{ $department->chairman->full_name ??  'No assigned Vice Chairman' }}</span></p>
            </div>
        </div>
    </div>
    <div class="bg-white mt-4 overflow-x-auto shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div>
                <div class="bg-white shadow-sm rounded  border-4  border-opacity-20 overflow-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 uppercase text-md leading-normal">

                                <th class="px-6 py-3 text-left text-sm font-semibold  text-gray-500 uppercase tracking-wider">Full Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-500 uppercase tracking-wider">Contact Number</th>

                            </tr>
                        </thead>

                        <tbody class="text-gray-600 text-base font-light">
                            @foreach ($department->staff as $staff)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                      <div class="flex-shrink-0 h-10 w-10">
                                          @if ($staff->staff->avatar)
                                            <img class="h-10 w-10 rounded-full" src="{{ asset('images/profile/'. $staff->staff->avatar) }}" alt="">
                                          @else
                                          <img class="h-10 w-10 rounded-full" src="{{ asset('images/profile/3-Clio-Anderson.jpg') }}" alt="">
                                          @endif
                                      </div>
                                      <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                         {{ $staff->staff->full_name}}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                          {{ $department->description }}
                                        </div>
                                      </div>
                                    </div>
                                  </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-medium text-gray-900">{{ $staff->staff->email }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $staff->staff->contact_number }}</div>
                                </td>

                                  {{--  --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
