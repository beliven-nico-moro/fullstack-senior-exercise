<div>
    @if (count($sales) > 0)
        <form wire:submit.prevent="sendSale">
            <p>{{ __('Send a sale to find a new project!') }}</p>
            <select name="sale_id" id="sale_id" wire:model="sale_id">
                <option value="">{{ __('Select a sale') }}</option>
                @foreach ($sales as $sale)
                    <option value="{{ $sale->id }}">{{ $sale->first_name }} {{ $sale->last_name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">{{ __('Send a sale') }}</button>
        </form>
    @else
        <p>{{ __('No sales available') }}</p>
    @endif
</div>
