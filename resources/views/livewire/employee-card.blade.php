<div>
    <div class="w-full bg-slate-100 p-4 flex items-center justify-between rounded-lg">
        <div class="flex items-center gap-4">
            <x-employee-avatar :username="$employee->first_name" :gender="$employee->gender" />

            <div class="flex flex-col">
                <strong>{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                <span class="text-2xs sm:text-xs">{{ strtoupper($employee->position) }} ({{ strtoupper($employee->seniorityLabel()) }})</span>
            </div>
        </div>

        <div>
            <span class="text-xs sm:text-sm font-bold {{ ($employee->status === 'unloaded') ? 'text-green-600' : 'text-red-600' }}">{{ strtoupper($employee->status) }}</span>
        </div>
    </div>
</div>
