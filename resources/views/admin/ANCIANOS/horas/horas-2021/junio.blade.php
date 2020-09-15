@extends("theme.$theme.layout")
@section('titulo')
    Horas - Junio
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
                <h3 class="card-title"><b>GESTION DE ANCIANOS </b> \ Resumen De Horas Mensual</h3><h5 align="right">2021</h5>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>PRUBLICADORES - JUNIO</b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="thead-dark">GRUPOS</th>
                      <th class="text-center">PUBLICACIONES</th>
                      <th class="text-center">REPRESENTACIONES DE VIDEO</th>
                      <th class="text-center">HORAS</th>
                      <th class="text-center">REVISITAS</th>
                      <th class="text-center">CURSOS BIBLICOS</th>
                      <th class="text-center">CANTIDAD QUE INFORMARON</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach ($datas_p as $data)
                            <tr>
                            <td class="font-weight-bold">{{$data->nombre}}</td>                                                  
                                <td class="text-center">{{$data->sum_p_p}}</td>
                                <td class="text-center">{{$data->sum_p_r}}</td>
                                <td class="text-center">{{$data->sum_p_h}}</td>
                                <td class="text-center">{{$data->sum_p_re}}</td>
                                <td class="text-center">{{$data->sum_p_c}}</td>
                                <td class="text-center">{{$data->sum_p_co}}</td>
                            </tr>   
                        @endforeach    
                    </tbody>
                    <tfoot class="table-dark">
                        @foreach ($sum_p as $data)
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_p_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_r_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_h_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_re_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_c_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_co_t}}</td>
                        </tr>
                    @endforeach 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>PRECURSORES AUXILIARES - JUNIO</b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="font-weight-bold">GRUPOS</th>
                      <th class="text-center">PUBLICACIONES</th>
                      <th class="text-center">REPRESENTACIONES DE VIDEO</th>
                      <th class="text-center">HORAS</th>
                      <th class="text-center">REVISITAS</th>
                      <th class="text-center">CURSOS BIBLICOS</th>
                      <th class="text-center">CANTIDAD QUE INFORMARON</th>
                    </tr>
                  </thead>
                    <tbody>
                        @foreach ($datas_pr as $data)
                            <tr>
                                <td class="font-weight-bold">{{$data->nombre}}</td>                                                  
                                <td class="text-center">{{$data->sum_pr_p}}</td>
                                <td class="text-center">{{$data->sum_pr_r}}</td>
                                <td class="text-center">{{$data->sum_pr_h}}</td>
                                <td class="text-center">{{$data->sum_pr_re}}</td>
                                <td class="text-center">{{$data->sum_pr_c}}</td>
                                <td class="text-center">{{$data->sum_pr_co}}</td>
                            </tr>   
                        @endforeach    
                    </tbody>
                    <tfoot class="table-dark">
                        @foreach ($sum_pr as $data)
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_p_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_r_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_h_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_re_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_c_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_co_t}}</td>
                        </tr>
                    @endforeach 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4 class="text-center"><b>PRECURSORES REGULARES - JUNIO</b></h4>
        </div>
            <div class="card-body">            
              <div class="table table-sm table-responsive">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                    <th class="text-center">GRUPOS</th>
                      <th class="text-center">PUBLICACIONES</th>
                      <th class="text-center">REPRESENTACIONES DE VIDEO</th>
                      <th class="text-center">HORAS</th>
                      <th class="text-center">REVISITAS</th>
                      <th class="text-center">CURSOS BIBLICOS</th>
                      <th class="text-center">CANTIDAD QUE INFORMARON</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($datas_pre as $data)
                            <tr>
                                <td class="font-weight-bold">{{$data->nombre}}</td>                                                  
                                <td class="text-center">{{$data->sum_p}}</td>
                                <td class="text-center">{{$data->sum_r}}</td>
                                <td class="text-center">{{$data->sum_h}}</td>
                                <td class="text-center">{{$data->sum_re}}</td>
                                <td class="text-center">{{$data->sum_c}}</td>
                                <td class="text-center">{{$data->sum_co}}</td>
                            </tr>   
                        @endforeach    
                    </tbody>
                    <tfoot class="table-dark">
                        @foreach ($sum_pre as $data)
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_r_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_h_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_re_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_c_t}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_co_t}}</td>
                        </tr>
                    @endforeach 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4 class="text-center"><b>INFORME TOTAL DE JUNIO</b></h4>
        </div>
            <div class="card-body">            
              <div class="table table-sm table-responsive">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="text-center">PUBLICACIONES</th>
                      <th class="text-center">REPRESENTACIONES DE VIDEO</th>
                      <th class="text-center">HORAS</th>
                      <th class="text-center">REVISITAS</th>
                      <th class="text-center">CURSOS BIBLICOS</th>
                      <th class="text-center">CANTIDAD QUE INFORMARON</th>
                    </tr>
                  </thead>
                    <tfoot class="table-dark">
                        @foreach ($sum_t as $data)
                        <tr>
                            <td class="text-center"><strong></strong>{{$data->sum_t_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_co}}</td>
                        </tr>
                    @endforeach 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
