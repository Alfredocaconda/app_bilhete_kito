@extends('layouts.base')

@section('macon')
<div class="media-body">
    <h4 class="mb-2">Meu Perfil</h4>
        <p class="mb-0 font-size-14">Nome Completo : {{Auth::user()->name}}</p>
        <p class="mb-0 font-size-14">E-mail : {{Auth::user()->email}}</p>
        <p class="mb-0 font-size-14">Tipo : {{Auth::user()->tipo}}</p>
</div>
@endsection
