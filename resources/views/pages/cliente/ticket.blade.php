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
                            <i class="fa fa-bus"></i>
                            <h5 style="text-align: center;">Bilhete Macon</h5>
                            <i class="fa fa-bus"></i>
                        </div>
                        <div class="corpo">
                            <p>Nome: <b>{{Auth::user()->cliente->nome}}</b></p>
                            <p>Partida: <b>{{$valor->viagen->horario->rotas->partida}}</b></p>
                            <p>Destino: <b>{{$valor->viagen->horario->rotas->destino}} - {{$valor->viagen->horario->local}}</b></p>
                            <p>Preço: <b>{{number_format($valor->viagen->horario->rotas->preco,0,',',' ')}} Kz</b></p>
                                <div class="valores">
                                    <p>Data e Hora </p>
                                    <b>{{Carbon\Carbon::parse($valor->viagen->horario->hora)->format('Y-M-d-H:i') }}</b>
                                    <p >Acento </p>
                                    <b>{{$valor->acento}}</b>
                                    <p>Carro</p>
                                    <b>{{$valor->viagen->carro->numero}}</b>
                                </div>
                                <p>Caro Cliente a sua reserva tem duração de 24h.</p>
                                <p>Para efeito de pagamento dirija-se a uma agência mas próxima.</p>
                                <h2>Bilhete Reservado</h2>
                        </div>
                        {{-- <div class="footbutt">
                            <a href="{{route('acento',$finde->id)}}">Avançar</a>
                        </div> --}}
                    </div>
                </div>

                <div class="acentos">
                    <div class="container-fluid base">

                      <form action="{{route('bilhete.store')}}" method="post">
                        @csrf
                        @if(session('Error'))
                            <div class="alert" style="background-color: red; color: white">
                                <p>{{session('Error')}}</p>
                            </div>
                        @endif
                        <input type="hidden" value="{{$finde->id}}" name="viagen_id">
                        <input type="hidden" value="{{Auth::user()->cliente->id}}" name="cliente_id">
                        <input type="hidden" name="acento" id="acento">
                        <div class="form-group">
                            <label for="">Data de Viagem</label>
                            <input type="date" min="{{date("Y-m-d")}}" name="data_viagem" class="form-control">
                        </div>
                        <div class="bilhete">
                            <div class="baseTop">
                                <i class="fa fa-bus"></i><h5>Acentos Para Viagem de Hoje</h5><i class="fa fa-bus"></i>
                            </div>
                            <div class="acentos">
                                <div class="row" id="lugarBase">
                                    @for ($i =1 ; $i <= $finde->carro->lotacao; $i++)
                                        <div class="col-4 col-md-2 col-lg-2 lugarBase" >
                                            <div class="lugar" >
                                                {{$i}}
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="musaico">
                                0
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Informações sobre o Bilhete (Opcional) </label>
                            <textarea disabled name="descricao" id="descricao" class="form-control" cols="30" rows="3">
                                Caro Cliente a sua reserva tem duração de 24h.
                             Para efeito de pagamento dirija-se a agência mas próxima.
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Comprar</button>
                            <a href="{{route('client.index')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('.lugarBase').on('click', '.lugar', function(event) {
                $(".musaico").html(event.target.innerText)
                $('#acento').val(event.target.innerText)
            });
        });
    </script>
@endpush
@endsection
