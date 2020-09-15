@if(session("mensaje"))
<div class="alert alert-success alert-dismissible" data-auto-dismiss="5000">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <h4><i class="ico fa fa-check"></i>   Mensaje del Sistema</h4>
    <ul>
            <li>{{ session("mensaje") }}</li>
    </ul>
</div>
@endif