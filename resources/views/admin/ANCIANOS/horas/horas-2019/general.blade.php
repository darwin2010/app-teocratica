@extends("theme.$theme.layout")
@section('titulo')
    Horas - General
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
                <h3 class="card-title"><b>GESTION DE ANCIANOS </b> \ Resumen General De Horas</h3><h5 align="right">2019</h5>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>RESUMEN GENERAL - PRUBLICADORES</b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="thead-dark">MES</th>
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
                            <td class="text-center"><strong></strong>{{$data->sum_p_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_p_co}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                    <tfoot class="table-dark">
                        @foreach ($pro_p as $data)
                        <tr>
                            <td><strong>Promedio</strong></td>
                            <td class="text-center"><strong></strong>{{$data->pro_p_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_p_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_p_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_p_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_p_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_p_co}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h4 class="text-center"><b>RESUMEN GENERAL - PRECURSORES AUXILIARES</b></h4>
            </div>
            <div class="card-body"> 
              <div class="table table-sm table-responsive p-2">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="font-weight-bold">MES</th>
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
                            <td class="text-center"><strong></strong>{{$data->sum_pr_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pr_co}}</td>
                        </tr>
                    @endforeach 
                    </tfoot>
                    <tfoot class="table-dark">
                        @foreach ($pro_pr as $data)
                        <tr>
                            <td><strong>Promedio</strong></td>
                            <td class="text-center"><strong></strong>{{$data->pro_pr_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pr_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pr_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pr_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pr_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pr_co}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4 class="text-center"><b>RESUMEN GENERAL - PRECURSORES REGULARES</b></h4>
        </div>
            <div class="card-body">            
              <div class="table table-sm table-responsive">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                    <th class="text-center">MES</th>
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
                                <td class="text-center">{{$data->sum_pre_p}}</td>
                                <td class="text-center">{{$data->sum_pre_r}}</td>
                                <td class="text-center">{{$data->sum_pre_h}}</td>
                                <td class="text-center">{{$data->sum_pre_re}}</td>
                                <td class="text-center">{{$data->sum_pre_c}}</td>
                                <td class="text-center">{{$data->sum_pre_co}}</td>
                            </tr>   
                        @endforeach    
                    </tbody>
                    <tfoot class="table-dark">
                        @foreach ($sum_pre as $data)
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-center"><strong></strong>{{$data->sum_pre_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pre_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pre_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pre_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pre_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_pre_co}}</td>
                        </tr>
                    @endforeach 
                    </tfoot>
                    <tfoot class="table-dark">
                        @foreach ($pro_pre as $data)
                        <tr>
                            <td><strong>Promedio</strong></td>
                            <td class="text-center"><strong></strong>{{$data->pro_pre_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pre_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pre_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pre_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pre_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_pre_co}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4 class="text-center"><b>RESUMEN GENERAL TODA LA CONGREGACION</b></h4>
        </div>
            <div class="card-body">            
              <div class="table table-sm table-responsive">
                <table class="table table-striped table-bordered" id="tabla-data">
                  <thead class="thead-dark">                  
                    <tr>
                      <th class="text-center">MES</th>
                      <th class="text-center">PUBLICACIONES</th>
                      <th class="text-center">REPRESENTACIONES DE VIDEO</th>
                      <th class="text-center">HORAS</th>
                      <th class="text-center">REVISITAS</th>
                      <th class="text-center">CURSOS BIBLICOS</th>
                      <th class="text-center">CANTIDAD QUE INFORMARON</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($datas_t as $data)
                            <tr>
                                <td class="font-weight-bold">{{$data->nombre}}</td>                                                  
                                <td class="text-center">{{$data->sum_t_p}}</td>
                                <td class="text-center">{{$data->sum_t_r}}</td>
                                <td class="text-center">{{$data->sum_t_h}}</td>
                                <td class="text-center">{{$data->sum_t_re}}</td>
                                <td class="text-center">{{$data->sum_t_c}}</td>
                                <td class="text-center">{{$data->sum_t_co}}</td>
                            </tr>   
                        @endforeach    
                    </tbody>
                    <tfoot class="table-dark">
                        @foreach ($sum_t as $data)
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->sum_t_co}}</td>
                        </tr>
                    @endforeach 
                    </tfoot>
                    <tfoot class="table-dark">
                        @foreach ($pro_t as $data)
                        <tr>
                            <td><strong>Promedio</strong></td>
                            <td class="text-center"><strong></strong>{{$data->pro_t_p}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_t_r}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_t_h}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_t_re}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_t_c}}</td>
                            <td class="text-center"><strong></strong>{{$data->pro_t_co}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
