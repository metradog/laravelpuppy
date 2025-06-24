@extends('layouts.app')
@section('title', 'Equipos')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('home_index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Jugadores
                            </li>
                        </ol>
        </nav>
        
    </div>
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Jugadores </h1>
        @if ($errors->any())
        <div class="alert p-3 mb-2 bg-danger text-white alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endif
        <div class="row">
            <div class="col-12 col-lg-12  d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                    <a class="btn btn-outline-primary float-end" title="Crear" onclick="abrir_modal('ventana_modal', 'Crear', '1', [], []);">
                        <i class="fas fa-check"></i> Crear
                    </a>
                                <h5 class="card-title mb-0"> </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Equipo</th>
                                    <th>Nombre</th>
                                    <th>Apodo</th>
                                    <th>Posición</th>
                                    <th>Edad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                    <tr>
                                        <td>{{$dato->id}}</td>
                                        <td>{{$dato->equipos->nombre}}</td>
                                        <td>{{$dato->nombre}}</td>
                                        <td>{{$dato->apodo}}</td>
                                        <td>{{$dato->posicion}}</td>
                                        <td>{{$dato->edad}}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" onclick="abrir_modal('ventana_modal', 'Editar {{$dato->nombre}}', '2', ['equipos_id','nombre', 'posicion', 'apodo', 'edad'], {{$dato}});">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0);" onclick="confirmarSweet('¿Realmente desea eliminar este registro?', '{{route('jugadores_eliminar', ['id'=>$dato->id])}}');">
                                            <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                            {{-- Paginación "Showing 1 to 2 of 4 results"  --}}
                            <!-- Mostrar información de paginación -->
                            <div class="pagination-info">
                                {{ $datos->links() }} 
                                Mostrando {{ $datos->firstItem() }} a {{ $datos->lastItem() }} 
                                de {{ $datos->total() }} registros
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--ventana modal-->
<div class="modal fade" id="ventana_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ventana_modal_titulo">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('jugadores_index_post')}}" method="post" name="form">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="equipos_id">Equipos</label>
                <select name="equipos_id" id="equipos_id" class="form-control">
                    @foreach($equipos as $equipo)
                        <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" />
            </div>
            <div class="form-group">
            <label for="posicion">Posición</label>
            <input type="text" class="form-control" placeholder="Posición" name="posicion" id="posicion" autocomplete="off" /> 
        </div> 
        <div class="form-group">
        <label for="apodo">Apodo</label>
            <input type="text" class="form-control" placeholder="Apodo" name="apodo" id="apodo" autocomplete="off" /> 
        </div>
        <div class="form-group">
        <label for="edad">Edad</label>
            <input type="number" class="form-control" placeholder="Edad" name="edad" id="edad" autocomplete="off" min="0" /> 
        </div>
            <hr/>
            <input type="hidden" name="accion" id="accion" value="1" />
            <input type="hidden" name="id" id="id" value="0" />
            <a href="javascript:void(0);" onclick="document.form.submit();" class="btn btn-primary" title="Guardar"><i class="fas fa-save"></i> Guardar</a>
        </form>
      </div>
     
    </div>
  </div>
</div>
<!--/ventana modal-->
@endsection