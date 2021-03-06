@extends("theme.$theme.layout")
@section('titulo')
    Años
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/usuario/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-navy">
            <div class="card-header">
            <h3 class="card-title"><b>Administracion </b> \ Crear Años</h3>
                <div class="card-tools">
                    <a href="{{route("año")}}" class="btn btn-outline-primary">
                        <i></i>Volver
                    </a>
                </div>
            </div>
            <form action="{{route('guardar_año')}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    @include('admin.ADMINISTRACION.año.form')
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-crear')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
