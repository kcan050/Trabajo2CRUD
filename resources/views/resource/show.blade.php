@extends('base')

@section('content')
<h1>{{ $enterprise }}</h1>
<form action="{{ url('resource') }}">
     <div class="form-group">
    <label for="exampleInputEmail1">NOMBRE</label>
    <input type="text" class="form-control" name="nombre" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese nombre" disabled>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PRECIO</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Ingrese precio" disabled>
  </div>
     <br>
    <input type="submit" class="btn btn-info"value="Volver"/>
</form>

<table class="table table-dark"> 
    <thead>
        <tr>
            <th scope="col">
                ID
            </th>
            <th scope="col">
                NOMBRE
            </th>
             <th scope="col">
                PRECIO
            </th>
        </tr>
        
    </thead>
    
    <tbody>
        <tr>
            <td>
                {{ $resource ['id'] }}
            </td>
            <td>
                {{ $resource ['name'] }}
            </td>
             <td>
                {{ $resource ['precio'] }}
            </td>
            <td>
                <a href="{{ url('resource') }}"></a>
            </td>
        </tr>
    </tbody>
</table>
@endsection