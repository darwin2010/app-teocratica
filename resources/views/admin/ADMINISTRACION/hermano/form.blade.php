<div class="form-group row">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre y Apellido</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $datas->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group row">
    <label for="direccion" class="col-lg-3 control-label">Direccion</label>
    <div class="col-lg-8">
        <input type="text" name="direccion" id="direcciono" class="form-control" value="{{old('direccion', $datas->direccion ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="telefono" class="col-lg-3 control-label">Telefono</label>
    <div class="col-lg-8">
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{old('telefono', $datas->telefono ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="celular" class="col-lg-3 control-label">Celular</label>
    <div class="col-lg-8">
        <input type="text" name="celular" id="celular" class="form-control" value="{{old('celular', $datas->celular ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-lg-3 control-label">Correo</label>
    <div class="col-lg-8">
        <input type="email" name="email" id="email" class="form-control" value="{{old('email', $datas->email ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_naci" class="col-lg-3 control-label">Fecha De Nacimiento</label>
    <div class="col-lg-8">
        <input type="text" name="fecha_naci" id="fecha_naci" class="form-control" value="{{old('fecha_naci', $datas->fecha_naci ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="fecha_baut" class="col-lg-3 control-label">Fecha De Bautismo</label>
    <div class="col-lg-8">
        <input type="text" name="fecha_baut" id="fecha_baut" class="form-control" value="{{old('fecha_baut', $datas->fecha_baut ?? '')}}"/>
    </div>
</div>
<div class="form-group row">
    <label for="grupo_id" class="col-lg-3 control-label requerido">Grupo</label>
    <div class="col-lg-8">
        <select name="grupo_id" id="grupo_id" class="form-control" required>
            <option value="">Seleccionar grupo</option>
            @foreach($grupo as $id => $nombre)
            <option value="{{$id}}" {{old("grupo_id", $datas->grupo_id ?? "") == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="estado_id" class="col-lg-3 control-label requerido">Estado</label>
    <div class="col-lg-8">
        <select name="estado_id" id="estado_id" class="form-control" required>
            <option value="">Seleccionar estado</option>
            @foreach($estado as $id => $nombre)
            <option value="{{$id}}" {{old("estado_id", $datas->estado_id ?? "") == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="publica_id" class="col-lg-3 control-label requerido">Publica</label>
    <div class="col-lg-8">
        <select name="publica_id" id="publica_id" class="form-control" required>
            <option value="">Seleccionar opcion</option>
            @foreach($publica as $id => $nombre)
            <option value="{{$id}}" {{old("publica_id", $datas->publica_id ?? "") == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="privilegio_id" class="col-lg-3 control-label requerido">Privilegio</label>
    <div class="col-lg-8">
        <select name="privilegio_id[]" id="privilegio_id" class="form-control" multiple required>
            <option value="">Seleccionar privilegio</option>
            @foreach($privilegios as $id => $nombre)
                <option value="{{$id}}" {{old('privilegio_id', isset($datas) ? ($datas->privilegios->firstWhere("id", $id) ? $id : '') : '') == $id ? 'selected' : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
