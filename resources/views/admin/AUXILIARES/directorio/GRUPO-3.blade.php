@extends("theme.$theme.layout")
@section('titulo')
    Directorio
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
                <h3 class="card-title"><b>GESTION DE AUXILIARES </b> \ Directorio</h3>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>DIRECTORIO - GRUPO 3</b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="text-center">HERMANOS</th>
                      <th class="text-center">DIRECCION</th>
                      <th class="text-center">TELEFONO</th>
                      <th class="text-center">CELULAR</th>
                      <th class="text-center">CORREO</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($datas as $data) 
                            <tr>
                                <td>{{$data->nombre}}</td>
                                <td>{{$data->direccion}}</td>                                                                            
                                <td>{{$data->telefono}}</td>
                                <td>{{$data->celular}}</td>
                                <td>{{$data->email}}</td>
                            </tr> 
                        @endforeach     
                    </tbody>
                        <tfoot class="table-dark">
                            <tr>
                                <td colspan="8"><strong></strong></td>
                            </tr>                           
                        </tfoot>
                    </table>
                </div>
            </div>       
        </div>
    </div>
</div>
@endsection
