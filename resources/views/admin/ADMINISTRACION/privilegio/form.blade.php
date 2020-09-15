<div class="form-group row">
    <label for="nombres" class="col-lg-3 control-label requerido">Privilegio</label>
    <div class="col-lg-8">
    <input type="text" name="nombres" id="nombres" class="form-control" value="{{old('nombres', $data->nombres ?? "")}}" required/>
    </div>
</div>