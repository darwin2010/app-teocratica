@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{url("#", ["id" => $item["id"]])}}">{{ $item["nombre"] . " | Url -> " . $item["url"]}} Icono -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <a href="{{url("#", ["id" => $item['id']])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar este menu"></a>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{url("#", ["id" => $item["id"]])}}">{{ $item["nombre"] . " | Url -> " . $item["url"] }} Icono -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <a href="{{url("#", ["id" => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar este menu"></a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.CONFIGURACION.menu.menu-item",["item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif