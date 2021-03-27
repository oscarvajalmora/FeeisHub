@extends('layouts.app')

@section('page-title', 'Somos una comunidad que apoya a los compradores online')

@section('page-content')
<div class="row my-5 justify-content-center">
  <div class="col-sm-12 col-md-6">
    <div class="form">
      <div class="input-group input-group-lg mb-3">
        <input type="text" class="form-control form-control-lg" placeholder="Pega aquí el link del perfil de facebook" aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="submit" id="button-addon2">Buscar</button>
      </div>
    </div>
  </div>
</div>
@endsection