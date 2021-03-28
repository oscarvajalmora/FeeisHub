@extends('layouts.app')

@section('page-title', 'Somos una comunidad que apoya a los compradores online')

@section('page-content')
<div class="row my-5 justify-content-center">
  <div class="col-12 col-md-9">
    <h1 class="text-center mb-5">Conoce la experiencia de otros usuarios con quienes compran y venden en tu comunidad de facebook</h1>
    @if (session('error'))
    <div class="alert alert-primary d-flex" role="alert">
      <p class="align-self-center my-auto">	<span class="mr-2">&#128077;</span> El perfil que buscas no registra opiniones de otros usuarios. <a href="{{ route('page.help') . '#usuario-no-encontrado' }}" class="alert-link"> ¿Qué significa esto?</a></p>
    </div>
    @endif

    <form method="POST" action="{{ route('search-reviews') }}" class="form d-flex justify-content-center" autocomplete="off">
      <div class="input-group input-group-lg" style="width: 85%">
        @csrf
        <input id="url" type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Pega aquí la URL del perfil de facebook" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('url') }}" style="border-radius: .25rem 0 0 .25rem" required>
        <button class="btn d-flex bg-light" type="submit" style="border-radius: 0 .25rem .25rem 0; border-color: #ced4da"><span class="material-icons mx-auto my-auto">search</span></button>
        @error('url')
        <div id="urlFeedback" class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
    </form>
  </div>
</div>

@endsection