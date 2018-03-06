<h2>Detalle del usuario #{{$user->id}}</h2>
<div>
    <strong>Nombre.</strong> {{$user->name}}
</div>
<div>
    <strong>Email.</strong> {{$user->email}}
</div>
<div>
    <a href="{{url()->previous()}}">Regresar al listado de usuario</a>
</div>
