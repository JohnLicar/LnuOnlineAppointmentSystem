<div>
    <div x-data="{ show: true }" x-show.transition.opacity.out.duration.5000ms="show" x-init="setTimeout(() => show = false, 3000)">
        <x-success-message/>
    </div>
    <form method="POST" action="{{  route('store') }}" enctype="multipart/form-data">
        @csrf
        <div>

            <div>
                <x-label for="name" :value="__('First Name')" />
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" wire:model="clientInfo.first_name" required  />
            </div>

            <div class="mt-2">
                <x-label for="middle_name" :value="__('Middle Name')" />
                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" wire:model="clientInfo.middle_name" required/>
            </div>

            <div class="mt-2">
                <x-label for="last_name" :value="__('Last Name')" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" wire:model="clientInfo.last_name" required/>
            </div>

            <div class="col-span-3 mt-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model="clientInfo.email" required/>
            </div>

            <div class="col-span-3 mt-2">
                <x-label for="contact_number" :value="__('Contact Number')" />
                <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" wire:model="clientInfo.contact_number" required/>
            </div>

        </div>
        <div>
            <label for="toggleA" class="mr-3 font-semibold">Send to next Department</label>
            <input wire:model="toggleA" type="checkbox" id="toggleA" class="my-3 "/>

            @if (!$toggleA )

                <x-button class="px-10" wire:click.prevent="doneAppointment()">
                    {{ __('Done Transaction') }}
                </x-button>

            @else
                <select   wire:model.lazy="selectedDepartment" id="department_id" name="department_id" class=" mb-2 w-full rounded-md  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
                    <option value="" disabled selected>Select Department to Pass</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->description }}</option>
                    @endforeach
                </select>

                <select wire:model.lazy="theSelectedServer" id="service_id" name="service_id" class=" mb-2 w-full rounded-md  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required >
                    <option value="" disabled selected>Select Department Transaction</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->description }}</option>
                    @endforeach
                </select>

                <x-button class="px-10 bg-blue-900" wire:click.prevent="passToNextDepartment({{ $selectedDepartment}}, {{ $theSelectedServer }})" wire:click="$refresh">
                    {{ __('Send to next Dept.') }}
                </x-button>
            @endif
        </div>
    </form>
</div>
