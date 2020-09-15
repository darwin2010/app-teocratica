@extends("theme.$theme.layout")
@section('titulo')
    Informes
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
                <h3 class="card-title"><b>GESTION DE AUXILIARES </b> \ Informes</h3><h5 align="right">2021</h5>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>Informe De Servicio - Grupo 6 - Mes De Mayo </b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="text-center">HERMANOS</th>
                      <th class="text-center">PRIVILEGIOS</th>
                      <th class="text-center">PUBLICACIONES</th>
                      <th class="text-center">VIDEOS</th>
                      <th class="text-center">HORAS</th>
                      <th class="text-center">REVISITAS</th>
                      <th class="text-center">ESTUDIOS</th>
                      <th class="text-center">OBSERVACIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($datas as $data) 
                            <tr>
                                <td>{{$data->nombre}}</td>
                                <td>{{$data->nombres}}</td>                                                                            
                                <td class="text-center">{{$data->publicaciones}}</td>
                                <td class="text-center">{{$data->videos}}</td>
                                <td class="text-center">{{$data->horas}}</td>
                                <td class="text-center">{{$data->revisitas}}</td>
                                <td class="text-center">{{$data->estudios}}</td>
                                <td>{{$data->observaciones}}</td>
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
