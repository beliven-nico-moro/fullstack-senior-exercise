<x-app-layout>
    <x-game-layout>

        <h2 class="text-2xl font-semibold">{{ __('Production') }}</h2>

        <div class="sm:max-h-[60vh] h-full flex flex-col-reverse sm:flex-row gap-4 pt-4">
            <div class="flex-1">
                <h3 class="text-lg font-bold">{{ __('Developers') }}</h3>
                <livewire:developer-list />
            </div>

            <div class="flex-1">
                <h3 class="text-lg font-bold">{{ __('Projects') }}</h3>
                <livewire:project-list />
            </div>
        </div>

    </x-game-layout>
</x-app-layout>
