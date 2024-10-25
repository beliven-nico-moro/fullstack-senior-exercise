@props(['game_id'])

<form method="POST" action="{{ route('game.resume') }}" class="w-full cursor-pointer">
    @csrf
    <input type="hidden" name="game_id" value="{{ $game_id }}">

    <button class="">
        {{ $slot }}
    </button>
</form>
