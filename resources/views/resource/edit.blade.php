@extends('base')

@section('content')
<h1>{{ $enterprise }}</h1>

<form action="{{ url('resource/' . $resource['id']) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
    <label for="exampleInputEmail1">NOMBRE</label>
    <input value="{{ old('name', $resource['name']) }}" type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese nombre">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PRECIO</label>
    <input value="{{ old('id', $resource['precio']) }}" type="text" class="form-control" name="precio" id="exampleInputPassword1" placeholder="Ingrese precio">
  </div>
    <input value="{{ old('id', $resource['id']) }}" type="hidden" class="form-control" name="id" id="exampleInputPassword1" >
    <br>
    <input type="submit" class="btn btn-light" value="Editar"/>
</form>

@endsection