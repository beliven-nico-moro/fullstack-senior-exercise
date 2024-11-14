<x-app-layout>
    <x-game-layout>

        <h2 class="text-2xl font-semibold uppercase text-center">{{ __('HR') }}</h2>

        <div class="sm:max-h-[60vh] h-full flex flex-col-reverse sm:flex-row gap-4 pt-4">
            <div class="flex-1 overflow-auto">
                <h3 class="text-lg font-bold">{{ __('Employees to hire') }}</h3>
                <livewire:hire-employees />
            </div>
        </div>

    </x-game-layout>
</x-app-layout>
