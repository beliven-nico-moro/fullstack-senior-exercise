<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="py-6 px-8 text-gray-900 w-full flex flex-row items-center justify-center gap-8">
        <a href="{{ route('game.production') }}" class="text-sm {{ (request()->routeIs('game.production')) ? 'font-bold' : '' }}">{{ strtoupper(__('Production')) }}</a>
        <a href="{{ route('game.sales') }}" class="text-sm {{ (request()->routeIs('game.sales')) ? 'font-bold' : '' }}">{{ strtoupper(__('Sales')) }}</a>
        <a href="{{ route('game.hr') }}" class="text-sm {{ (request()->routeIs('game.hr')) ? 'font-bold' : '' }}">{{ strtoupper(__('HR')) }}</a>
    </div>
</div>
