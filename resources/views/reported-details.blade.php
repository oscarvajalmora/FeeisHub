@extends('layouts.app')

{{-- SEO metadata --}}
@section('page-title', 'Conoce las opiniones de este perfil | FeeisHub')
@section('page-description', 'Recopilamos las experiencias de vendedores y compradores de Facebook con otros usuarios y te ayudamos a tomar una mejor desición para tu siguiente compra o venta.')
{{-- /SEO metadata --}}

{{-- Page content --}}
@section('page-content')
<div class="row mb-5">
  <h2 class="mb-3 p-3">1. Detalles del perfil</h2>
  <div class="col-12 col-md-6">
    <div class="card h-100">
      <div class="card-body">
        <div class="card-text">
          <span class="d-block">Primer feedback recibido: {{ $reported->created_at->format('d F Y') }} <span class="text-muted">({{ $reported->created_at->diffForHumans() }})</span> </span>
          <span class="d-block">URL: <a href="{{ $reported->url }}" target="_blank">{{ $reported->url }}</a></span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 text-center mt-3 mt-md-0">
    <div class="card-group">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Opiniones positivas</h5>
          <div class="card-text">
            <span class="d-block fs-1" >{{ $feedback_positive_count }}</span>
          </div>
        </div>
      </div>
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Opiniones negativas</h5>
          <div class="card-text">
            <span class="d-block fs-1" >{{ $feedback_negative_count }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <h2 class="mb-3 p-3">2. Feedback de los usuarios</h2>
  @foreach ($reported->reviews as $review)
    <div class="col-sm-12 col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><div class="card-text">{{ $review->reporter_name }} @if ($review->validated == 1) <span class="material-icons md-18 md-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Rebiiu verificada">verified</span> @endif </h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $review->created_at->diffForHumans() }}</h6>
          <div class="card-text">
            <span class="d-block fw-bold {{ $review->feedback == 1 ? 'text-success' : 'text-danger' }}">Feedback {{ $review->feedback == 1 ? 'positivo' : 'negativo' }}  @if($review->feedback == 1) &#128522; @else &#128533; @endif</span>
            <span class="d-block">Grupo Facebook: @if($review->facebookGroup) {{ $review->facebookGroup->name }} @else - @endif </span>
            <span class="d-block text-justify-start">
              Comentarios adicionales: {{ $review->commentary ?: '-' }}
            </span>
            <span class="d-block mt-3"><a href="{{ $review->fb_post_link }}" class="btn btn-outline-primary" target="_blank">Ver post de facebook</a></span>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
{{-- /Page content --}}

{{-- Scripts --}}
@section('js')
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  });
</script>
@endsection
{{-- /Scripts --}}