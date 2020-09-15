@extends("theme.$theme.layout")
@section('titulo')
    Listado - Siervos
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
                <h3 class="card-title"><b>GESTION DE AUXILIARES </b> \ Listado De Hermanos</h3>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>SIERVOS MINISTERIALES</b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">GRUPO AL QUE PERTENECE</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{$data->nombre}}</td>                                                  
                                <td class="text-center">{{ !empty($data->grupo) ? $data->grupo->nombre:'' }}</td>
                            </tr>   
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
