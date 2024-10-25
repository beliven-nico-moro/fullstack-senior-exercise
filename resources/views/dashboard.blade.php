<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-4xl w-full text-center mb-8">Software House Tycoon</h1>

                    <x-game-button>{{ __('Start new Game') }}</x-game-button>

                    <livewire:game-list />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
