<div>
    @if ($project->status !== 'completed')
    <div class="w-full bg-slate-100 p-4 rounded-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="flex flex-col">
                    <strong>{{ $project->name }}</strong>
                    <span class="text-xs sm:text-sm">{{ __('Reward') }}: <strong>{{ $project->reward }} €</strong></span>
                    <span class="text-2xs sm:text-xs">{{ __('Difficulty') }}: {{ strtoupper($project->difficultyLabel()) }}</span>
                </div>
            </div>

            <div>
                <span class="text-xs sm:text-sm font-bold {{ $project->statusClass() }}">{{ strtoupper($project->statusLabel()) }}</span>
            </div>
        </div>
        @if ($project->status === 'pending' && ($developers && count($developers) > 0))
        <div class="mt-4">
            <form wire:submit.prevent="assignProject">
                <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}" wire:model.fill="project_id" />

                @if (count($developers) > 0)
                    <label for="developer_id">{{ __('Assign to developer') }}</label>
                    <select name="developer_id" id="developer_id" wire:model="developer_id">
                        <option value="">{{ __('Select a developer') }}</option>
                        @foreach ($developers as $developer)
                            <option value="{{ $developer->id }}">{{ $developer->first_name }} {{ $developer->last_name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">{{ __('Assign') }}</button>
                @else
                    <p>{{ __('No developers available') }}</p>
                @endif
            </form>
        </div>
        @endif
    </div>
    @endif
</div>
