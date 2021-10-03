<div>
    <select wire:model.lazy="clientInfo.service_id"  id="department_id" name="department_id" class=" mb-2 w-full rounded-md  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autofocus>
        <option value="" disabled selected>Select Department Transaction</option>
        @foreach ($services as $service)
        <option value="{{ $service->id }}">{{ $service->description }}</option>
        @endforeach
    </select>
</div>
