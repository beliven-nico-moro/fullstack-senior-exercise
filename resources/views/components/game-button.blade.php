@props(['game_id' => null])

<form method="POST" action="{{ (isset($game_id)) ? route('game.resume') : route('game.start') }}" class="w-full text-center">
    @csrf
    @if (isset($game_id))
    <input type="hidden" name="game_id" value="{{ $game_id }}">
    @endif

    <x-primary-button class="px-12 py-4 mx-auto">
        {{ $slot }}
    </x-primary-button>
</form>
