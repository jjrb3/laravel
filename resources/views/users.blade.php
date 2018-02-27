
<ul>
    @forelse($users as $user)
        <li>{{$user}}</li>
    @empty
        No se encontrarón datos
    @endforelse
</ul>
