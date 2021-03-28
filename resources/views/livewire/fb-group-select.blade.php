<div class="form-floating mb-3">
    <input type="text" id="fbGroupName" placeholder="Nombre del grupo de Facebook" name="fb_group_name" class="form-control @error('fb_group_name') is-invalid @enderror" value="{{ old('fb_group_name') }}" wire:model.debounce.300ms="facebookGroupName">
    <label for="">Nombre del grupo de facebook</label>
    @error('fb_group_name')
      <div id="fbGroupNameFeedback" class="invalid-feedback">{{ $message }}</div>
    @enderror

    <div wire:loading.delay>
        @include('partials.loading')
    </div>
    
    @if ($facebookGroupName && count($facebookGroups) && $activeSearch)
    <div class="alert alert-primary mt-3" role="alert">
        <span class="d-block py-2"> Sugerencias:</span>
        @foreach ($facebookGroups as $facebookGroup)
            <button class="btn btn-sm btn-light ml-1 mb-1" type="button" wire:click="setAsGroup({{ $facebookGroup }})">{{ $facebookGroup->name }}</button>
        @endforeach
    </div>
    @endif
</div>