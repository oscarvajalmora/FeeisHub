@extends('layouts.app')

@section('page-title', 'Preguntas y respuestas')

@section('page-content')
<div class="row justify-content-center">
  <div class="col-12 col-md-8">
    <h1>Preguntas y respuestas</h1>
    <p>Utiliza esta sección para encontrar información útil sobre este portal. Si no ves tu pregunta aquí, puedes enviar tus inquietudes o dudas a <a href="mailto:os.carvajalmora@gmail.com">este email.</a></p>

    <div id="por-que-hacemos-esto" class="my-5">
      <h2>1. ¿Por qué desarrollamos este portal?</h2>
      <p>{{ config('app.name') }} nace con la intención de ayudar a personas como tú; quienes compran y/o venden en facebook. El problema nace cuando evidenciamos que algunos usuarios resultan ser estafados por personas y, cuando ellos publican en los grupos la respectiva “funa” sirve, pero por un tiempo, ya que esta se pierde entre las otras publicaciones de los usuarios. Es por ello, que queremos transformar esta situación y ser un portal que se alimente por y para la comunidad. Recopilamos las experiencias y ayudamos a futuros compradores a tener una idea del vendedor antes de concretar la compra.</p>
    </div>

    <div id="usuario-no-encontrado" class="my-5">
      <h2>2. Perfil no encontrado. ¿Qué significa?</h2>
      <p>{{ config('app.name') }} nace con la intención de ayudar a personas como tú; quienes compran y/o venden en facebook. El problema nace cuando evidenciamos que algunos usuarios resultan ser estafados por personas y, cuando ellos publican en los grupos la respectiva “funa” sirve, pero por un tiempo, ya que esta se pierde entre las otras publicaciones de los usuarios. Es por ello, que queremos transformar esta situación y ser un portal que se alimente por y para la comunidad.</p>
    </div>
  </div>

  
</div>


@endsection