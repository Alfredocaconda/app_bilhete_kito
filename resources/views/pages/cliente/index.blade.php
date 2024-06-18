@extends('layouts.base')
@section('macon')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Lista de Rotas</h4>
                   {{-- <a href="#Cadastrar" onclick="limpar()" data-toggle="modal"><i class="fa fa-plus-circle"></i></a> --}}
                </div>
            </div>
            <div class="head-body">
                <div class="container-fluid">
                    <div class="row">
                        @foreach (App\Models\Viagen::whereDate('created_at',date("Y-m-d"))->get() as $item)
                            <div class="col-12 col-md-2 col-lg-2 base-rotas">
                                <a href="{{route('ticket',$item->id)}}">
                                    <div class="rotas">
                                        <h4>{{$item->horario->rotas->partida}}</h4>
                                            -
                                        <h4>{{$item->horario->rotas->destino}}</h4>
                                        <h4>{{$item->horario->local}}</h4>
                                        <h4>{{ Carbon\Carbon::parse($item->horario->hora)->format('H:i')}}</h4>
                                        <h5>{{number_format($item->horario->rotas->preco,0,',',' ')}} kz</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection