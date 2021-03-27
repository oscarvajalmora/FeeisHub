@extends('layouts.app')

@section('page-title', 'Ayuda a la comunidad enviando tu Rebiiu')

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-8 col-xl-6">
      <h1 class="text-center">Gracias por aportar a la comunidad</h1>
      <hr class="hr">

      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Ops!</strong> Hay algunos errores. Por favor, revisa el formulario.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
  
      <form action="{{ route('send-review.store') }}" method="post" class="form">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Tu nombre: </label>
          <input type="text" id="reporterName" name="reporter_name" class="form-control @error('reporter_name') is-invalid @enderror" required value="{{ old('reporter_name') }}">
          @error('reporter_name')
            <div id="reporterNameFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">URL de tu perfil de facebook: </label>
          <input type="url" id="reporterProfileLink" name="reporter_profile_link" class="form-control @error('reporter_profile_link') is-invalid @enderror" required value="{{ old('reporter_profile_link') }}">
          @error('reporter_profile_link')
            <div id="reporterProfileLinkFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Nombre: </label>
          <input type="text" id="affectedName" name="affected_name" class="form-control @error('affected_name') is-invalid @enderror" required value="{{ old('affected_name') }}">
          @error('affected_name')
            <div id="affectedNameFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">URL del perfil de facebook: </label>
          <input type="url" name="affected_profile_link" id="affecterProfileLink" class="form-control @error('affected_profile_link') is-invalid @enderror" required value="{{ old('affected_profile_link') }}">
          @error('affected_profile_link')
            <div id="affecterProfileLinkFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Nombre del grupo de facebook</label>
          <input type="text" id="fbGroupName" name="fb_group_name" class="form-control @error('fb_group_name') is-invalid @enderror" value="{{ old('fb_group_name') }}">
          @error('fb_group_name')
            <div id="fbGroupNameFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">URL grupo de facebook: </label>
          <input type="url" id="fbGroupLink" name="fb_group_link" class="form-control @error('fb_group_link') is-invalid @enderror" value="{{ old('fb_group_link') }}">
          @error('fb_group_link')
            <div id="fbGroupLinkFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">URL de tu post: </label>
          <input type="url" id="fbPostLink" name="fb_post_link" class="form-control @error('fb_post_link') is-invalid @enderror" required value="{{ old('fb_post_link') }}">
          @error('fb_post_link')
            <div id="fbPostLink" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Tipo de feedback: </label>
          <select name="feedback" id="feedback" class="form-select @error('feedback') is-invalid @enderror" required value="{{ old('feedback') }}">
            <option value="" selected disabled>- Selecciona un valor -</option>
            <option value="1">Positivo</option>
            <option value="0">Negativo</option>
          </select>
          @error('feedback')
            <div id="feedbackFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Comentario: </label>
          <textarea id="commentary" name="commentary" class="form-control @error('commentary') is-invalid @enderror" maxlength="140">{{ old('commentary') }}</textarea>
          @error('commentary')
            <div id="commentaryFeedback" class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button class="btn btn-primary" type="submit">Enviar rebiiu</button>
      </form>
    </div>
  </div>
@endsection