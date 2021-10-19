<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors />
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{  route('department.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            {{-- <div>
                                <x-label for="code" :value="__('Department Code')" />
                                <x-input id="code" class="block mt-1 w-full uppercase" type="text" name="code" placeholder="Code" :value="old('code')" autofocus/>
                            </div> --}}

                            <div class="col-span-3">
                                <x-label for="description" :value="__('Description')" />
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" placeholder="Input Department Description" autofocus />
                            </div>

                            <div class="col-span-3">
                                <x-label for="vp_id" :value="__('Vice President')" />
                                <select id="vp_id" name="vp_id" :value="old('vice_president')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select Vice President for this Department</option>
                                    @foreach ($vice_presidents as $vice_president)
                                        <option value="{{ $vice_president->id }}">
                                            {{ $vice_president->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="col-span-3">
                                <x-label for="chairman_id" :value="__('Chairman')" />
                                <select id="chairman_id" name="chairman_id" :value="old('chairman_id')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select Vice President for this Department</option>
                                    @foreach ($chairmans as $chairman)
                                        <option value="{{ $chairman->id }}">
                                            {{ $chairman->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-back-button href="{{ route('vice-pres.index') }}" class="ml-3">
                                {{ __('Back') }}
                            </x-back-button>
                            <x-button class="ml-3">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
