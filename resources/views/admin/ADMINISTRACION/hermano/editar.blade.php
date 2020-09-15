@extends("theme.$theme.layout")
@section('titulo')
    Hermanos
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')        
        <div class="card card-navy">
            <div class="card-header">
            <h3 class="card-title"><b>Administracion </b> \ Editar Hermano \ {{$datas->nombre}}</h3>
                <div class="card-tools">
                    <a href="{{route("hermano")}}" class="btn btn-outline-primary">
                        <i></i> Volver
                    </a>
                </div>
            </div>
            <form action="{{route('actualizar_hermano', ['id' => $datas->id])}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                @csrf @method("put")
                <div class="card-body">
                    @include('admin.ADMINISTRACION.hermano.form')
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-editar')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
