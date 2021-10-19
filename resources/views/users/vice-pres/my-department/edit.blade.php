<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors />
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('my-department.update', $my_department) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-3">
                                <x-label for="description" :value="__('Description')" />
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $my_department->description}}" />
                            </div>

                            <div class="col-span-3">
                                <x-label for="chairman_id" :value="__('Chairman')" />
                                <select id="chairman_id" name="chairman_id" :value="old('chairman_id')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select Chairman for this Department</option>
                                        @foreach ($chairmans as $chairaman)
                                            <option value="{{ $chairaman->id }}" @if ($chairaman->id === $my_department->chairman_id  ) selected @endif>{{ $chairaman->full_name }}</option>
                                        @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-back-button href="{{ route('my-department.index') }}" class="ml-3">
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
