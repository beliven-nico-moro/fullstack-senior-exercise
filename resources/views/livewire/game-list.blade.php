<div>
    @if (count($games) > 0)
        <h2 class="text-2xl mt-8 mb-4">Resume Game</h2>

        <div class="space-y-4">
            @foreach ($games as $game)
                <div class="rounded-lg bg-slate-200 text-black flex justify-between items-center p-4">
                    <div class="flex flex-col">
                        <x-game-link game_id="{{ $game->id }}">
                            <strong>{{ $game->name }}</strong>
                        </x-game-link>
                        <span class="text-sm">{{ __('Balance') }}: {{ $game->balance }} €</span>
                        <span class="text-xs">Last played: {{ $game->updated_at->diffForHumans() }}</span>
                    </div>

                    <div class="">
                        <form method="POST" action="{{ route('game.delete') }}">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">

                            <button class="uppercase text-xs text-red-500 font-bold">{{ __('Delete game') }}</button>
                        </form>
                    </div>
                </div>

            @endforeach
        </div>
    @endif
</div>
