<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Chairman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors />
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{  route('chairman.update', $chairman) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-3 gap-6">

                            <div>
                                <x-label for="name" :value="__('First Name')" />
                                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $chairman->first_name }}" autofocus />
                            </div>

                            <div>
                                <x-label for="middle_name" :value="__('Middle Name')" />
                                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" value="{{ $chairman->middle_name }}" />
                            </div>

                            <div>
                                <x-label for="last_name" :value="__('Last Name')" />
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $chairman->last_name }}" />
                            </div>

                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $chairman->email }}" />
                            </div>

                            <div>
                                <x-label for="email" :value="__('Contact Number')" />
                                <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" value="{{ $chairman->contact_number }}"/>
                            </div>

                            <div>
                                <x-label for="department_id" :value="__('Department')" />
                                <select id="department_id" name="department_id" :value="old('department_id')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select your Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" @if($department->id === $chairman->department_id)
                                            selected @endif>{{ $department->description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-label for="avatar" :value="__('Image')" />
                                <div class="flex">
                                  @if ($chairman->avatar)
                                  <img src="{{asset('images/profile/'. $chairman->avatar)}}" alt="Teacher Picture"
                                    class="w-12 h-12 border dark:border-coolGray-700">
                                  @endif
                                  <x-input id="avatar" class="block ml-3 mt-1 w-full" type="file" name="avatar"
                                    :value="old('avatar')" />
                                </div>
                            </div>

                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-back-button href="{{ route('vice-pres.index') }}" class="ml-3">
                                {{ __('Back') }}
                            </x-back-button>
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
