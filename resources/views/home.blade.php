@extends('layouts.app')

{{-- SEO metadata --}}
@section('page-title', 'Comunidad colaborativa para compradores y vendedores de Facebook | FeeisHub')
@section('page-description', 'Recopilamos las experiencias de vendedores y compradores de Facebook con otros usuarios y te ayudamos a tomar una mejor desición para tu siguiente compra o venta.')
{{-- /SEO metadata --}}

{{-- Page content --}}
@section('page-content')
<div class="row mt-5 mb-3 justify-content-center">
  <div class="col-12 col-md-10">
    <h1 class="text-center mb-5">Conoce la experiencia de otros usuarios con quienes compran y venden en tu comunidad de facebook</h1>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-12 col-md-8 col-lg-7">
    @if (session('error'))
    <div class="alert alert-info d-flex" role="alert">
      <p class="align-self-center my-auto">&#128077;&nbsp; El perfil que buscas no registra opiniones de otros usuarios. <a href="{{ route('page.help') . '#perfil-no-encontrado' }}" class="alert-link"> ¿Qué significa esto?</a></p>
    </div>
    @endif
    <form method="POST" action="{{ route('search-reviews') }}" class="form d-flex justify-content-center" autocomplete="off">
      <div class="input-group input-group-lg">
        @csrf
        <input id="url" type="text" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="Pega aquí la URL del perfil de facebook" value="{{ old('url') }}" style="border-radius: .25rem 0 0 .25rem" required autofocus>
        <button class="btn d-flex bg-light" type="submit" style="border-radius: 0 .25rem .25rem 0; border-color: #ced4da"><span class="material-icons mx-auto my-auto">search</span></button>
        @error('url')
        <div id="urlFeedback" class="invalid-feedback">{{ $message }}</div>
      @enderror
      </div>
    </form>
  </div>
</div>

@endsection
{{-- /Page content --}}