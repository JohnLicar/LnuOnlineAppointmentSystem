<div>

    <div class="bg-white  mt-5 overflow-hidden shadow-sm sm:rounded-lg" >
            <div class="relative my-3 ml-5">
                <select wire:model.debounce.300ms="search" id="department_id" name="department_id" :value="old('department_id')" class="block mt-1 w-1/4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->description }}
                        </option>
                    @endforeach
                </select>
            </div>
        <div>
            {!! $chart->container() !!}
            {{ $chart->script() }}
        </div>

    </div>
</div>
