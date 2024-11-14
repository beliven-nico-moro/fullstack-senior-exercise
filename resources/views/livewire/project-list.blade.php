<div>
    @if ($projects && count($projects) > 0)
        <div class="space-y-2 py-4">
            @foreach ($projects as $project)
                <livewire:project-card :project="$project" :developers="$developers" :wire:key="$project->id" />
            @endforeach
        </div>
    @else
        <p>{{ __('No projects available.') }}</p>
    @endif
</div>
