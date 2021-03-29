@extends('layouts.app')

@section('page-title', 'Preguntas y respuestas')

@section('page-content')
<div class="row justify-content-center">
  <div class="col-12 col-md-8">
    <h1>Preguntas y respuestas</h1>
    <p>Utiliza esta sección para encontrar información útil sobre este portal. Si no ves tu pregunta aquí, puedes enviar tus inquietudes o dudas a <a href="mailto:os.carvajalmora@gmail.com">este email.</a></p>

    @if (count($faqs) > 0)
      @foreach ($faqs as $faq)
      <div id="{{ $faq->element_id }}" class="my-5">
        <h2>{{ $loop->iteration . '. ' . $faq->title}}</h2>
        <p>{{ $faq->description }}</p>
      </div>      
      @endforeach
      @else
      <p class="text-muted text-center my-5 py-5">¡Estamos escribiendo algunas cosas útiles! Vuelve en un rato</p>
    @endif


  </div>

  
</div>


@endsection