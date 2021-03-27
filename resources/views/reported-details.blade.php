@extends('layouts.app')

@section('page-title', 'Conoce las rebiius de este perfil')

@section('page-content')
<div class="row mb-5">
  <h2 class="mb-3 p-3">1. Detalles del perfil</h2>
  <div class="col-12 col-md-6">
    <div class="card h-100">
      <div class="card-body">
        <div class="card-text">
          <span class="d-block">Primera Rebiiu: {{ $reported->created_at->format('d F Y') }} <span class="text-muted">({{ $reported->created_at->diffForHumans() }})</span> </span>
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
  <h2 class="mb-3 p-3">2. Feedbacks de los usuarios</h2>
  @foreach ($reported->reviews as $review)
    <div class="col-sm-12 col-md-6 mt-3 mt-md-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Feedback {{ $review->feedback == 1 ? 'positivo' : 'negativo' }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $review->created_at->diffForHumans() }}</h6>
          <div class="card-text">
            <span class="d-block">Rebiiu por: {{ $review->reporter_name }}</span>
            <span class="d-block">Grupo Facebook: <a href="{{ $review->fb_group_link }}" target="_blank">{{ $review->fb_group_name }}</a></span>
            <span class="d-block">Detalles del rebiiu: <a href="{{ $review->fb_post_link }}" target="_blank">Ver post de facebook</a></span>
            <span class="d-block text-justify-start">
              Comentarios adicionales: {{ $review->commentary ?: '-' }}
            </span>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection