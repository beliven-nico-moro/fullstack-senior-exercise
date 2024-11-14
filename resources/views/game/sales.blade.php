<x-app-layout>
    <x-game-layout>

        <h2 class="text-2xl font-semibold uppercase text-center">{{ __('Sales') }}</h2>

        <div class="sm:max-h-[60vh] h-full flex flex-col-reverse sm:flex-row gap-4 pt-4">
            <div class="flex-1 overflow-auto">
                <h3 class="text-lg font-bold">{{ __('Sales') }}</h3>
                <livewire:sales-list />
            </div>

            <div class="flex-1 overflow-auto">
                <h3 class="text-lg font-bold">{{ __('Actions') }}</h3>
                <livewire:send-sales />
            </div>
        </div>

    </x-game-layout>
</x-app-layout>
