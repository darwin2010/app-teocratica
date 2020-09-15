<div class="form-group row">
    <label for="reu_sem" class="col-lg-4 control-label">Asistencia A Las Reuniones (Entre Semana)</label>
    <div class="col-lg-6">
        <input type="text" name="reu_sem" id="reu_sem" class="form-control" value="{{old('reu_sem', $data->reu_sem ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cant_reu" class="col-lg-4 control-label">Cantidad De Reuniones (Entre Semana)</label>
    <div class="col-lg-6">
        <input type="text" name="cant_reu" id="cant_reu" class="form-control" value="{{old('cant_reu', $data->cant_reu ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="reu_fin_sem" class="col-lg-4 control-label">Asistencia A Las Reuniones (Fin De Semana)</label>
    <div class="col-lg-6">
        <input type="text" name="reu_fin_sem" id="reu_fin_sem" class="form-control" value="{{old('reu_fin_sem', $data->reu_fin_sem ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="cant_reu_fin" class="col-lg-4 control-label">Cantidad De Reuniones (Fin De Semana)</label>
    <div class="col-lg-6">
        <input type="text" name="cant_reu_fin" id="cant_reu_fin" class="form-control" value="{{old('cant_reu_fin', $data->cant_reu_fin ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="año_id" class="col-lg-4 control-label requerido">Años</label>
    <div class="col-lg-6">
        <select name="año_id" id="año_id" class="form-control" required>
            <option value="">Seleccionar año</option>
            @foreach($años as $id => $nombre)
            <option value="{{$id}}" {{old('año_id', isset($data) ? ($data->años->firstWhere("id", $id) ? $id : '') : '') == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="mes_id" class="col-lg-4 control-label requerido">Meses</label>
    <div class="col-lg-6">
        <select name="mes_id" id="mes_id" class="form-control" required>
            <option value="">Seleccionar mes</option>
            @foreach($meses as $id => $nombre)
                <option value="{{$id}}" {{old('mes_id', isset($data) ? ($data->meses->firstWhere("id", $id) ? $id : '') : '') == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
