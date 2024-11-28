@extends('layouts.base')
@section('macon')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                   <h4 class="card-title">Bilhete</h4>
                   <a href="#Cadastrar" onclick="limpar()" data-toggle="modal"><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
            <div class="head-body">
                <div class="container-fluid base">
                    <div class="bilhete">
                        <div class="baseTop">
                            <i class="fa fa-bus"></i><h5>bilhete Macon</h5><i class="fa fa-bus"></i>
                        </div>
                        <div class="corpo">
                            <p>Nome: <b>{{Auth::user()->name}}</b></p>
                            <p>Partida: <b>{{$finde->rotas->partida}}</b></p>
                            <p>Destino: <b>{{$finde->rotas->destino}} - {{$finde->local}}</b></p>
                            <p>Preço: <b>{{number_format($finde->rotas->preco,2,',',' ')}} Kz</b></p>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Plataforma</th>
                                        <th>Hora</th>
                                        <th>Acesso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>---</td>
                                        <td>{{$finde->hora}}</td>
                                        <td>---</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="footbutt">
                            <a href="{{route('acento',$finde->id)}}">Avançar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">

            </div>
          </div>
        </div>
    </div>
</div>
@endsection