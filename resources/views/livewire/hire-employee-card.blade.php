<div>
    @if (!$employee->is_hired)
    <div class="w-full bg-slate-100 p-4 flex items-center justify-between rounded-lg">
        <div class="flex items-center gap-4">
            <x-employee-avatar :username="$employee->first_name" :gender="$employee->gender" />

            <div class="flex flex-col">
                <strong>{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                <span class="text-2xs sm:text-xs">{{ strtoupper($employee->position) }} ({{ strtoupper($employee->seniorityLabel()) }})</span>
            </div>
        </div>

        <div>
            @if (intval($employee->salary) <= intval($balance))
            <button wire:click="hireEmployee({{ $employee->id }})" class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer">
                {{ __('Hire for') }} {{ $employee->salary }}€
            </button>
            @endif
            <button wire:click="removeEmployee({{ $employee->id }})" class="bg-red-500 text-white px-4 py-2 rounded-lg cursor-pointer">
                {{ __('Remove') }}
            </button>
        </div>
    </div>
    @endif
</div>
