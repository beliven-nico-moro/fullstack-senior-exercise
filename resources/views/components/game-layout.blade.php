<section class="w-full h-[93vh] bg-slate-400 flex flex-col relative">

    <div class="flex-1">
        <div class="w-full h-full flex sm:items-center">
            <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
                    <div class="p-6 text-gray-900">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-full sm:max-w-7xl w-full sm:w-fit m-0 mx-auto sm:px-6 lg:px-8 mb-0 sm:mb-4 flex-0">
        <hr class="block sm:hidden">

        <x-game-balance></x-game-balance>

        <x-game-menu></x-game-menu>
    </div>
</section>
