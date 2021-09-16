<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors />
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{  route('service.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">

                            <div>
                                <x-label for="code" :value="__('Service Code')" />
                                <x-input id="code" class="block mt-1 w-full uppercase" type="text" name="code" placeholder="Code" :value="old('code')" autofocus/>
                            </div>

                            <div  class="col-span-5">
                                <x-label for="description" :value="__('Description')" />
                                <x-input id="description" class="block mt-1 w-full" type="text" name="description" placeholder="Description" :value="old('description')"  />
                            </div>

                            <x-input id="department_id"  type="hidden" name="department_id" value="{{ auth()->user()->department_id }}" />

                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-back-button href="{{ route('service.index') }}" class="ml-3">
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
