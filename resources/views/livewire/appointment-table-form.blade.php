<div>
    <div x-data="{ show: true }" x-show.transition.opacity.out.duration.5000ms="show" x-init="setTimeout(() => show = false, 3000)">
        <x-success-message/>
    </div>
    <form method="POST" action="{{  route('store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <div>
                <x-label for="name" :value="__('First Name')" />
                {{-- <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" wire:model="clientInfo.first_name" required  /> --}}
                {{-- <x-input @if(session()->has('serving')) value="{{  session('serving')[0]->first_name }}"  @endif id="first_name" class="block mt-1 w-full" type="text" name="first_name"  required  /> --}}
                <x-input  value="{{ session()->has('serving') ? Session::get('serving')[0]->first_name : '' }}" id="first_name" class="block mt-1 w-full" type="text" name="first_name"  required  />
            </div>

            <div class="mt-2">
                <x-label for="middle_name" :value="__('Middle Name')" />

                {{-- <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" wire:model="clientInfo.middle_name" required/> --}}
                <x-input  value="{{ session()->has('serving') ? Session::get('serving')[0]->middle_name : '' }}" id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" required/>
            </div>

            <div class="mt-2">
                <x-label for="last_name" :value="__('Last Name')" />
                {{-- <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" wire:model="clientInfo.last_name" required/> --}}
                <x-input  value="{{ session()->has('serving') ? Session::get('serving')[0]->last_name : '' }}" id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" required/>

            </div>

            <div class="col-span-3 mt-2">
                <x-label for="email" :value="__('Email')" />
                {{-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model="clientInfo.email" required/> --}}
                <x-input  value="{{ session()->has('serving') ? Session::get('serving')[0]->email : '' }}" id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" required/>

            </div>

            <div class="col-span-3 mt-2">
                <x-label for="contact_number" :value="__('Contact Number')" />
                {{-- <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" wire:model="clientInfo.contact_number" required/> --}}
                <x-input  value="{{ session()->has('serving') ? Session::get('serving')[0]->contact_number : '' }}" id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" required/>

            </div>

        </div>
        <div>
            <label for="toggleA" class="mr-3 font-semibold">Send to next Department</label>
            <input wire:model="toggleA" type="checkbox" id="toggleA" class="my-3 "/>

            @if (!$toggleA )
                @if (session()->has('serving'))
                    <x-button class="px-10" wire:click.prevent="doneAppointment()">
                        {{ __('Done Transaction') }}
                    </x-button>


                    <x-back-button  class="px-10 mt-3 w-full flex justify-center text-center" wire:click.prevent="failTransaction()">
                        {{ __('Wait') }}
                    </x-back-button>
                @endif
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
