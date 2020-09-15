@extends("theme.$theme.layout")
@section('titulo')
    Asistencia
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
                <h3 class="card-title"><b>GESTION DE AUXILIARES </b> \ Asistencia A Las Reuniones</h3><h5 align="right">2019</h5>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>REUNION DE VIDA Y MINISTERIO CRISTIANA</b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="text-center">MESES</th>
                      <th class="text-center">CANTIDAD DE REUNIONES EN EL MES</th>
                      <th class="text-center">ASISTENCIA A LAS REUNIONES EN EL MES</th>
                      <th class="text-center">PROMEDIO SEMANAL</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach ($datas as $data) 
                            <tr>
                                <td>{{$data->nombre}}</td>                                                  
                                <td class="text-center">{{$data->cant_reu}}</td>
                                <td class="text-center">{{$data->reu_sem}}</td>
                                <td class="text-center">{{$data->avgsem}}</td>
                            </tr>
                                @endforeach        
                    </tbody>
                    <tfoot class="table-dark">
                    @foreach ($total_sem as $data) 
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-center"><strong></strong>{{$data->sum_can}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_sem}}</td>
                            <td class="text-center"><strong></strong>{{$data->avg_sem}}</td>
                        </tr>
                        @endforeach  
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4 class="text-center"><b>REUNION PUBLICA Y ESTUDIO DE LA ATALAYA</b></h4>
        </div>
            <div class="card-body">            
              <div class="table table-sm table-responsive">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="text-center">MESES</th>
                      <th class="text-center">CANTIDAD DE REUNIONES EN EL MES</th>
                      <th class="text-center">ASISTENCIA A LAS REUNIONES EN EL MES</th>
                      <th class="text-center">PROMEDIO SEMANAL</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach ($datas as $data) 
                            <tr>
                                <td>{{$data->nombre}}</td>                                                  
                                <td class="text-center">{{$data->cant_reu_fin}}</td>
                                <td class="text-center">{{$data->reu_fin_sem}}</td>
                                <td class="text-center">{{$data->avgfin}}</td>
                            </tr>
                        @endforeach        
                    </tbody>
                    <tfoot class="table-dark">
                    @foreach ($total_fin as $data) 
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-center"><strong></strong>{{$data->sum_can_fin}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_sem_fin}}</td>
                            <td class="text-center"><strong></strong>{{$data->avg_sem_fin}}</td>
                        </tr>
                        @endforeach  
                    </tfoot>
                </table>             
            </div>    
        </div>
    </div>
</div>
@endsection
