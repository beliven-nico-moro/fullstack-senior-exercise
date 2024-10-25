@php
    use App\Models\Game;
@endphp

<div class="hidden sm:block absolute right-4 top-4">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="px-6 py-4 text-gray-900">
            <livewire:game-balance />

            <livewire:game-timer />
        </div>
    </div>
</div>
<div class="block sm:hidden">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="px-6 py-4 text-gray-900 text-center">
            <livewire:game-balance />

            <livewire:game-timer />
        </div>
    </div>
</div>
