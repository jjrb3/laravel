<h3>Listado de usuario</h3>
<form action="{{url('usuario')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="name" placeholder="Jeremy">
    <br>
    <input type="text" name="email" placeholder="jeremy@gmail.com">
    <br>
    <input type="password" name="password" placeholder="Mayor de 6 caracteres">
    <br>
    <button type="submit">Crear</button>
</form>
<ul>
    @forelse($users as $user)
        <li>
            {{$user->name}}, ({{$user->email}})
            <a href="{{route('user.show',['id' => $user->id])}}">Ver detalles</a>
        </li>
    @empty
        No se encontrarón datos
    @endforelse
</ul>
