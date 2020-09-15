@extends("theme.$theme.layout")
@section('titulo')
    Años
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')        
        <div class="card card-navy">
            <div class="card-header">
            <h3 class="card-title"><b>Administracion </b> \ Listado De Años</h3>
                <div class="card-tools">
                    <a href="{{route("crear_año")}}" class="btn btn-outline-primary">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear Año
                    </a>
                </div>
                </div>
                <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">NOMBRE</th>
                            <th class="width70">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->nombre}}</td>
                            <td class="text-center">
                                <a href="{{route('editar_año', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este año">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('eliminar_año', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este año">
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
