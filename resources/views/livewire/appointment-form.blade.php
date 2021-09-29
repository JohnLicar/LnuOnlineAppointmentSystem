<div class="max-w-7xl col-span-2 md:grid-cols-4 sm:grid-cols-1 h-auto mt-2 mr-2 sm:px-auto lg:px-8 bg-white overflow-hidden border border-blue-500 shadow-sm sm:rounded-lg">
    <x-auth-validation-errors class="mt-2"/>
    <div x-data="{ show: true }" x-show.transition.opacity.out.duration.5000ms="show" x-init="setTimeout(() => show = false, 3000)">
        <x-success-message class="mt-2"/>
    </div>
    <div class="my-5">
        <div class="flex justify-content-between">
           <div>
              <h4 class="font-semibold">Available Slot: <span id="slot" class="font-bold text-lg  text-indigo-900"></span> </h4>
           </div>
        </div>
     </div>
    <h5 class="font-bold mb-3">Please be advised that you need to be there 20 minutes before</h5>
    <form method="POST" action="{{  route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-2">

            <div class="col-span-3 mt-2">
                <x-label for="department_id" :value="__('Department you wish to have transaction')" />
                <select id="department_id" name="department_id" :value="old('department_id')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                    <option value="" disabled selected>Select your Service you want</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->description }}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-span-3 mt-2">
                <x-label for="scheduled_date" :value="__('Date')" />
                <x-input id="scheduled" class="block mt-1 w-full" type="text" name="scheduled" :value="old('scheduled')" required  readonly  placeholder="Please click the day in calendar to choose date"/>
                <x-input id="scheduled_date" type="hidden" name="scheduled_date" :value="old('scheduled_date')" required />
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

            {{-- <div class="col-span-3 mt-2">
                <x-label for="course_id" :value="__('Course')" />
                <select id="course_id" name="course_id" :value="old('course_id')" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                    <option value="" disabled selected>Select your Service you want</option>
                    @foreach ($courses as $courses)
                    <option value="{{ $courses->id }}">{{ $courses->description }}</option>
                    @endforeach

                </select>
            </div> --}}

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
            <x-button class="ml-3">
                {{ __('Submit Appointment') }}
            </x-button>
        </div>
    </form>
</div>
