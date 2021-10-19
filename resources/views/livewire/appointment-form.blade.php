<div class="max-w-7xl col-span-2 md:grid-cols-4 sm:grid-cols-1 h-auto mt-2 mr-2 sm:px-auto lg:px-8 bg-white overflow-hidden border border-blue-500 shadow-sm sm:rounded-lg">
    <x-auth-validation-errors class="mt-2"/>
    <div x-data="{ show: true }" x-show.transition.opacity.out.duration.5000ms="show" x-init="setTimeout(() => show = false, 3000)">
        <x-success-message class="mt-2"/>
    </div>
    <div class="my-5">
        <div class="flex justify-content-between">
           <div>
              <h4 class="font-semibold">Available Slot: <i id="slot" class="font-bold text-lg  text-indigo-900"></i> </h4>
           </div>
        </div>
     </div>
    <h5 class="font-bold mb-3">Please be advised that you need to be there 20 minutes before</h5>

    <form method="POST" action="{{  route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-2 transition duration-500">

            <div class="col-span-3 mt-2">
                <x-label for="department_id" :value="__('Department you wish to have transaction')" />
                <select   id="department_id" name="department_id" :value="old('department_id')"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                wire:model="selectedDepartment">
                    <option value="" disabled selected>Select your Service you want</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->description }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-span-3 mt-2 transition duration-500 ">
                <x-label for="service_id" :value="__('Services')" />
                <select wire:model="selectedService" id="service_id" name="service_id" :value="old('service_id')"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
                    <option value="" disabled selected>Select your Service you want</option>
                    @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->description }}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-span-3 mt-2">
                <x-label for="scheduled_date" :value="__('Date')" />
                <x-input id="scheduled_date" class="block mt-1 w-full" type="text" name="scheduled_date" :value="old('scheduled_date')" required  readonly  placeholder="Please click the day in calendar to choose date"/>
                {{-- <x-input id="scheduled_date" type="text" name="scheduled_date" /> --}}
            </div>

            <div class="mt-2">
                <x-label for="name" :value="__('First Name')" />
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required  />
            </div>

            <div class="mt-2">
                <x-label for="middle_name" :value="__('Middle Name')" />
                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" required/>
            </div>

            <div class="mt-2">
                <x-label for="last_name" :value="__('Last Name')" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required/>
            </div>

            <div class="col-span-3 mt-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <div class="col-span-3 mt-2">
                <x-label for="contact_number" :value="__('Contact Number')" />
                <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" required/>
            </div>

        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button id="submit" class="ml-3">
                {{ __('Submit Appointment') }}
            </x-button>
        </div>
    </form>
</div>
