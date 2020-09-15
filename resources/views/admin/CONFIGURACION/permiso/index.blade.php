@extends("theme.$theme.layout")
@section("titulo")
    Permisos
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section("contenido")
<div class="row">
    <div class="col-lg-12">
        @include("includes.mensaje")        
        <div class="card card-navy">
            <div class="card-header">
                <h3 class="card-title"><b>Administracion - APP</b> \ Permisos</h3>
                <div class="card-tools">
                <a href="{{route("crear_permiso")}}" class="btn btn-outline-primary">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Permiso
                </a>
            </div>
            </div>
            <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">SLUG</th>
                            <th class="width70">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permisos as $permiso)
                            <tr>
                                <td>{{$permiso->nombre}}</td>
                                <td>{{$permiso->slug}}</td>
                                <td class="text-center">
                                    <a href="{{route("editar_permiso", ["id" => $permiso->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este permiso">
                                        <i  class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route("eliminar_permiso",  ['id' => $permiso->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este permiso">
                                            <i class="fa fa-times-circle text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection