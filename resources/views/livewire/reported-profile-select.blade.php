<div class="form-floating mb-3">
    <input type="url" name="affected_profile_link" placeholder="URL del perfil de facebook" id="affecterProfileLink" class="form-control @error('affected_profile_link') is-invalid @enderror" required value="{{ old('affected_profile_link') }}" wire:model.debounce.500ms="url">
    <label for="">* URL del perfil de facebook</label>
    <div id="reporterProfileLinkHelp" class="form-text">Debes copiar toda la URL. Ejemplo: https://facebook.com/nombreDeUsuario</div>

    @error('affected_profile_link')
      <div id="affecterProfileLinkFeedback" class="invalid-feedback">{{ $message }}</div>
    @enderror

    <div wire:loading.delay>
        @include('partials.loading')
    </div>
    
    @if ($url && count($reportedProfiles) && $activeSearch)
    <div class="alert alert-primary mt-3" role="alert">
        <span class="d-block py-2"> En caso que esté presente, utiliza una de estas sugerencias:</span>
        @foreach ($reportedProfiles as $reportedProfile)
            <button class="btn btn-sm btn-light mb-1" type="button" wire:click="setAsReported({{ $reportedProfile }})">{{ $reportedProfile->url }}</button>
        @endforeach
    </div>
    @endif
</div>

