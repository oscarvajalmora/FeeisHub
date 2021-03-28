@extends('layouts.app')

@section('page-title', 'Ayuda a la comunidad enviando tu feedback de otros usuarios')

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-8 col-xl-8">
      <h1 class="text-center py-3">&#128525 Gracias por aportar a la comunidad</h1>

      @if (session('success'))
      <div class="alert alert-success mt-5" role="alert">
        {!! session('success') !!}
      </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
          <strong>Ops!</strong> Hay algunos errores. Por favor, revisa el formulario.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
  
      <form action="{{ route('send-review.store') }}" class="mt-5" method="post" class="form" autocomplete="off">
        @csrf
        <h5 class="mb-3">1. Tus datos: </h5>
        <div class="form-floating mb-3">
          <input type="text" placeholder="Tu nombre" id="reporterName" name="reporter_name" class="form-control @error('reporter_name') is-invalid @enderror" required value="{{ old('reporter_name') }}">
          <label for="">* Tu nombre </label>
          @error('reporter_name')
            <div id="reporterNameFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="url" id="reporterProfileLink" placeholder="URL de tu perfil de facebook" name="reporter_profile_link" class="form-control @error('reporter_profile_link') is-invalid @enderror" required value="{{ old('reporter_profile_link') }}">
          <label for="">* URL de tu perfil de facebook</label>
          <div id="reporterProfileLinkHelp" class="form-text">No será público, lo necesitamos para validar tu feedback. Ejemplo: https://facebook.com/nombreDeUsuario</div>
          @error('reporter_profile_link')
            <div id="reporterProfileLinkFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="url" placeholder="URL de tu post" id="fbPostLink" name="fb_post_link" class="form-control @error('fb_post_link') is-invalid @enderror" required value="{{ old('fb_post_link') }}">
          <label for="">* URL de tu post </label>
          <div id="reporterProfileLinkHelp" class="form-text">Pega la URL completa del post de facebook donde compartiste tu caso. <strong>Debe ser un post público.</strong></div>
          @error('fb_post_link')
            <div id="fbPostLink" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <h5 class="mt-5 mb-3">2. Datos del perfil del para el feedback: </h5>
        <livewire:reported-profile-select />
        <div class="form-floating mb-3">
          <input type="text" id="affectedName" placeholder="Nombre" name="affected_name" class="form-control @error('affected_name') is-invalid @enderror" required value="{{ old('affected_name') }}">
          <label for="">* Nombre del perfil</label>
          @error('affected_name')
            <div id="affectedNameFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <h5 class="mt-5 mb-3">3. Datos adicionales: </h5>
        <livewire:fb-group-select /> 
        <div class="form-floating mb-3">
          <textarea id="commentary" name="commentary" style="height: 100px;" placeholder="Comentario" class="form-control @error('commentary') is-invalid @enderror" maxlength="140">{{ old('commentary') }}</textarea>
          <label for="">Comentario: </label>
          @error('commentary')
            <div id="commentaryFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <h6>Tipo de feedback</h6>
          <div class="form-check">
            <input class="form-check-input @error('feedback') is-invalid @enderror" type="radio" name="feedback" value="1" id="positiveFeedback" @if(old('feedback') == "1") checked @endif @if(is_null(old('feedback'))) checked @endif>
            <label class="form-check-label" for="positiveFeedback"> Positivo</label>
          </div>
          <div class="form-check">
            <input class="form-check-input @error('feedback') is-invalid @enderror" type="radio" name="feedback" value="0" id="negativeFeedback" @if(old('feedback') == "0") checked @endif>
            <label class="form-check-label" for="negativeFeedback"> Negativo</label>
          </div>
        </div>
        <div class="d-grid gap-1">
          <button class="btn btn-primary btn-lg" type="submit">ENVIAR FEEDBACK</button>
        </div>
      </form>
    </div>
  </div>
@endsection