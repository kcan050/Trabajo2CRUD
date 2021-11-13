@extends('base')




@section('content')





<form action="{{ url('resource') }}" method="post">
    
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">NOMBRE</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese nombre">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PRECIO</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="precio" placeholder="Ingrese precio">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Crear Producto</button>
</form>



@endsection