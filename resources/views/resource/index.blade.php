@extends('base')


@section('content')


<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">Confirmar borrado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-dark">¿Seguro desea borrar el elemento?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="modalDeleteResourceForm" action="" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Borrar elemento"/>
        </form>
      </div>
    </div>
  </div>
</div>

<h1>{{ $enterprise }}</h1>


@isset($message)
    <div class="alert alert-{{ $type }}" role="alert">
        {{ $message }}
    </div>
@endisset


<table class="table table-success table-dark">
    
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resources as $resource)
        
        <tr>
            <td>
                {{$resource['id']}}
            </td>
            <td>
                {{$resource['name']}}
            </td>
            <td>
                {{$resource['precio']}}
            </td>
            <td>
                <a href="{{ url('resource/' . $resource['id']) }}"><button type="button" class="btn btn-info">Mostrar</button></a>
            </td>
            <td>
                <a href="{{ url('resource/' . $resource['id'] . '/edit') }}"><button type="button" class="btn btn-light">Editar</button></a>
            </td>
            <td>
               
                     <a href="javascript: void(0);" data-url="{{ url('resource/' . $resource['id']) }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">Borrar</a>
               
            </td>
        </tr>
        
        
        
        @endforeach
        
        
    </tbody>
    
</table>
<a href="{{ url('resource/create') }}" class="btn btn-primary btn-lg" type="button">Agregar producto</a>
<a href="{{ url('resource/flush/all') }}" class="btn btn-danger btn-lg" type="button">Borrar productos</a>
<form id="deleteResourceForm" action="" method="post">
    @method('delete')
    @csrf
</form>
@endsection

@section('js')
<!-- nuevo 4 -->
<script src="{{ url('assets/js/delete.js') }}"></script>
<!-- nuevo 4 -->
@endsection
