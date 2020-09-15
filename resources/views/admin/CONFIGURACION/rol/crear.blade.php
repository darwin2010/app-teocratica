@extends("theme.$theme.layout")
@section("titulo")
    Roles
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/crear.js")}}" type="text/javascript"></script>
@endsection

@section("contenido")
<div class="row">
    <div class="col-lg-12">
    @include("includes.form-error")
    @include("includes.mensaje")    
        <div class="card card-navy">
            <div class="card-header">
                <h3 class="card-title"><b>Administracion</b> \ Crear Roles</h3>
                <div class="card-tools">
                    <a href="{{route("rol")}}" class="btn btn-outline-primary">
                        <i></i>Volver
                    </a>
                </div>
            </div>
            <form action="{{route("guardar_rol")}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    @include("admin.CONFIGURACION.rol.form")
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include("includes.boton-form-crear")
                    </div>
                </div>
            </form>
        </div> 
    </div>
</div>
@endsection