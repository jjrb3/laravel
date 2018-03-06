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
