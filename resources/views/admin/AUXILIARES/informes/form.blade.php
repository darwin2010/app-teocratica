<div class="form-group row">
    <label for="publicaciones" class="col-lg-4 control-label">Publicaciones</label>
    <div class="col-lg-6">
        <input type="text" name="publicaciones" id="publicaciones" class="form-control" value="{{old('reu_sem', $data->reu_sem ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="videos" class="col-lg-4 control-label">Videos</label>
    <div class="col-lg-6">
        <input type="text" name="videos" id="videos" class="form-control" value="{{old('cant_reu', $data->cant_reu ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="horas" class="col-lg-4 control-label">Horas</label>
    <div class="col-lg-6">
        <input type="decimal" name="horas" id="horas" class="form-control" value="{{old('reu_fin_sem', $data->reu_fin_sem ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="revisitas" class="col-lg-4 control-label">Revisitas</label>
    <div class="col-lg-6">
        <input type="text" name="revisitas" id="revisitas" class="form-control" value="{{old('cant_reu_fin', $data->cant_reu_fin ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="estudios" class="col-lg-4 control-label">Estudios</label>
    <div class="col-lg-6">
        <input type="text" name="estudios" id="estudios" class="form-control" value="{{old('cant_reu_fin', $data->cant_reu_fin ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="estudios" class="col-lg-4 control-label">Estudios</label>
    <div class="col-lg-6">
        <input type="text" name="estudios" id="estudios" class="form-control" value="{{old('cant_reu_fin', $data->cant_reu_fin ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="hermano_id" class="col-lg-4 control-label requerido">Hermano</label>
    <div class="col-lg-6">
        <select name="hermano_id" id="hermano_id" class="form-control" required>
            <option value="">Seleccionar hermano</option>
            @foreach($hermanos as $id => $nombre)
            <option value="{{$id}}" {{old('hermano_id', isset($data) ? ($data->hermanos->firstWhere("id", $id) ? $id : '') : '') == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="grupo_id" class="col-lg-4 control-label requerido">Grupo</label>
    <div class="col-lg-6">
        <select name="grupo_id" id="grupo_id" class="form-control" required>
            <option value="">Seleccionar grupo</option>
            @foreach($grupos as $id => $nombre)
            <option value="{{$id}}" {{old('grupo_id', isset($data) ? ($data->grupos->firstWhere("id", $id) ? $id : '') : '') == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
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
<div class="form-group row">
    <label for="privilegio_id" class="col-lg-4 control-label requerido">Privilegios</label>
    <div class="col-lg-6">
        <select name="privilegio_id[]" id="privilegio_id" class="form-control" multiple required>
            <option value="">Seleccionar privilegios</option>
            @foreach($privilegios as $id => $nombre)
                <option value="{{$id}}" {{old('privilegio_id', isset($data) ? ($data->privilegios->firstWhere("id", $id) ? $id : '') : '') == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
