@extends("theme.$theme.layout")
@section('titulo')
    Usuarios
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @csrf
        @include('includes.mensaje')
        <div class="card card-navy">
            <div class="card-header">
            <h3 class="card-title"><b>Administracion </b> \ Listado De Usuarios</h3>
                <div class="card-tools">
                    <a href="{{route("crear_usuario")}}" class="btn btn-outline-primary">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear Usuario
                    </a>
                </div>
                </div>
                <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">USUARIO</th>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">CORREO</th>
                            <th class="text-center">ROL</th>
                            <th class="width70">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->usuario}}</td>
                            <td>{{$data->nombre}}</td>
                            <td>{{$data->email}}</td>
                            <td>
                                @foreach ($data->roles as $rol)
                                    {{$loop->last ? $rol->nombre : $rol->nombre . ', '}}
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{route('editar_usuario', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este usuario">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('eliminar_usuario', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este usaurio">
                                        <i class="fa fa-times-circle text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                    {{ $datas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
