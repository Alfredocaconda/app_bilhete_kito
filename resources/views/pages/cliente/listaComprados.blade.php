@extends('layouts.base')
@section('macon')
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Lista de Bilhetes Comprados</h4>
                      <a href="{{route('client.index')}}" ><i class="fa fa-plus-circle"></i></a>
                   </div>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table id="datatable" class="data-table table-striped" >
                         <thead>
                            <tr>
                               <th>Data</th>
                               <th>Hora de Embarque</th>
                               <th>Local de Embarque</th>
                               <th>Destino</th>
                               <th>Local de Desembarque</th>
                               <th>Acento</th>
                               <th>Preço</th>
                               <th>Estado</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach (App\Models\Bilhete::where('cliente_id',Auth::user()->cliente->id)->get() as $valor)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($valor->data_viagem)->format('d-m')}}</td>
                                    <td>{{Carbon\Carbon::parse($valor->viagen->horario->hora)->format('H:i')}}</td>
                                    <td>{{$valor->viagen->horario->rotas->partida}}</td>
                                    <td>{{$valor->viagen->horario->rotas->destino}}</td>
                                    <td>{{$valor->viagen->horario->local}}</td>
                                    <td>{{$valor->acento}}</td>
                                    <td><b>{{number_format($valor->viagen->horario->rotas->preco,0,',',' ')}} Kz</b></td>
                                    <td>
                                       @if($valor->estado == "Desativo")
                                          <button class="btn text-white" style="background-color: green">Comprado</button>
                                       @else
                                          <button  class="btn btn-primary " >Reservado</button>
                                       @endif
                                    </td>
                                </tr>
                            @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>

   
@endsection