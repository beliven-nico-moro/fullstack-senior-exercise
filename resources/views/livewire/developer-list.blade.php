<div>
    @if ($employees)
    <div class="space-y-2 py-4">
        @foreach ($employees as $employee)
            <livewire:employee-card :employee="$employee" :wire:key="$employee->id" />
        @endforeach
    </div>
    @endif
</div>
