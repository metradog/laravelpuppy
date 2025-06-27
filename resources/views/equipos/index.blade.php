@extends('layouts.app')
@section('title', 'Equipos')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home_index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Equipos</li>
            </ol>
        </nav>        
    </div>
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Equipos </h1>
        <!-- Mostrar errores de validación -->
        @if(Session::has('mensaje')) 
                <div class="alert alert-{{ Session::get('css') }} alert-dismissible fade show" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
         @endif
        <!-- Mostrar errores de validación -->
        
        <!-- Mostrar errores de validación -->
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
        <!-- Mostrar errores de validación -->
        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <a class="btn btn-outline-success float-end" title="Crear" onclick="abrir_modal('ventana_modal', 'Crear', '1', [], []);">
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
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datos_equipos as $dato)
                                        <tr>
                                            <td>{{ $dato->id }}</td>
                                            <td>{{ $dato->nombre }}</td>
                                            
                                        <td class="text-center">
                                            <a class="btn btn-outline-primary"  href="javascript:void(0);" onclick="abrir_modal('ventana_modal', 'Editar {{ addslashes($dato->nombre)}}', '2', ['nombre'], {{$dato}});">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a class="btn btn-outline-danger"  href="javascript:void(0);" onclick="confirmarSweet('¿Realmente desea eliminar este registro?', '{{ route('equipos_eliminar', ['id'=>$dato->id]) }}');">
                                            <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>    
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
        <form action="{{ route('equipos_index_post') }}" method="post" name="form">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" />
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