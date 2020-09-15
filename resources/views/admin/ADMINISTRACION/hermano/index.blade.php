@extends("theme.$theme.layout")
@section('titulo')
    Hermanos
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
                <h3 class="card-title"><b>Administracion </b> \ Listado De Hermanos</h3>
                <div class="card-tools">
                    <a href="{{route("crear_hermano")}}" class="btn btn-outline-primary">
                        <i class="fa fa-fw fa-plus-circle"></i> Crear Hermano
                    </a>
                </div>
                </div>
                <nav class="navbar navbar-light float-right">
                    <form class="form-inline">
                        <select name="tipo" id="tipo" class="form-control mr-sm-2">
                            <option value="">Seleccionar por Tipo</option>
                            <option>Nombres</option>
                            <option>Direccion</option>
                            <option>Telefono</option>
                            <option>Celular</option>
                            <option>Correo</option>
                            <option>Fecha De Nacimiento</option>
                            <option>Fecha De Bautismo</option>
                            <option>Privilegio</option>
                            <option>Grupo</option>
                            <option>Estado</option>
                            <option>Publica</option>
                        </select>
                        <input name="tipo" class="form-control mr-sm-2" type="search" placeholder="Ingrese su busqueda" aria-label="Search" autocomplete="off">
                        <button class="btn btn-outline-primary my-2 my-sm-2" type="submit">Aplicar</button>
                    </form>
                </nav>
            <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">NOMBRES</th>
                            <th class="text-center">DIRECCION</th>
                            <th class="text-center">GRUPO</th>
                            <th class="text-center">PRIVILEGIOS</th>
                            <th class="text-center">ESTADO</th>
                            <th class="width70">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{$data->nombre}}</td>
                            <td>{{$data->direccion}}</td>
                            <td>{{ !empty($data->grupo) ? $data->grupo->nombre:'' }}</td>                        
                            <td>
                                @foreach ($data->privilegios as $privilegio)
                                    {{$loop->last ? $privilegio->nombres : $privilegio->nombres . ', '}}
                                @endforeach
                            </td>
                            <td>{{ !empty($data->estado) ? $data->estado->nombre:'' }}</td>                            
                            <td class="text-center">
                                <a href="{{route('ver_hermano', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Ver este hermano">
                                    <i class="fa fa-eye text-success"></i>
                                </a>                              
                                <a href="{{route('editar_hermano', ['id' => $data->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este hermano">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route('eliminar_hermano', ['id' => $data->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este hermano">
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
