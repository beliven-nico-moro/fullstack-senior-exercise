<div>
    @if ($sales)
    <div class="space-y-2 py-4">
        @foreach ($sales as $sale)
            <livewire:employee-card :employee="$sale" :wire:key="$sale->id" />
        @endforeach
    </div>
    @else
        <p>{{ __('No sales available.') }}</p>
    @endif
</div>
