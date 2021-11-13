@php
    use App\Http\Controllers\IndexController;
@endphp


@extends('base')



@section('content')



 <h1>CRUD</h1>
    <p class="lead"></p>
    <p class="lead">
      <a href="{{ url('resource') }}" class="">
         <button class="btn btn-lg btn-secondary fw-bold border-white bg-white" type="button">Ver Base de datos</button>
      </a>
    </p>



@endsection