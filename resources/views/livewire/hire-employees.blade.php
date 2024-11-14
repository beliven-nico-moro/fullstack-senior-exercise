<div>
    @if ($employees && count($employees) > 0)
    <div class="space-y-2 py-4">
        @foreach ($employees as $employee)
            <livewire:hire-employee-card :employee="$employee" :wire:key="$employee->id" />
        @endforeach
    </div>
    @else
        <p>{{ __('No employees to hire.') }}</p>
    @endif
</div>
