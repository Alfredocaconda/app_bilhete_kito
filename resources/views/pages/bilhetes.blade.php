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
                      <table id="datatable" class="data-table table-striped table-responsive" >
                         <thead>
                            <tr style="font-size:13px">
                               <th>Cliente</th>
                               <th>Data</th>
                               <th>Hora de Embarque</th>
                               <th>Local de Embarque</th>
                               <th>Destino</th>
                               <th>Local de Desembarque</th>
                               <th>Acento</th>
                               <th></th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($bilhete as $valor)
                                <tr style="font-size:13px">
                                    <td>{{$valor->cliente->nome}}</td>
                                    <td>{{ Carbon\Carbon::parse($valor->data_viagem)->format('d-m')}}</td>
                                    <td>{{Carbon\Carbon::parse($valor->viagen->horario->hora)->format('H:i')}}</td>
                                    <td>{{$valor->viagen->horario->rotas->partida}}</td>
                                    <td>{{$valor->viagen->horario->rotas->destino}}</td>
                                    <td>{{$valor->viagen->horario->local}}</td>
                                    <td>{{$valor->acento}}</td>
                                    <td>
                                       @if($valor->estado == "Desativo")
                                          <button class="btn text-white" style="background-color: green">Comprado</button>
                                       @else
                                          <a href="#Comprar" data-toggle="modal" onclick="comprar({{$valor->id}})"
                                             class="btn btn-primary " >Reservado</a>
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
 <div class="modal fade" id="Comprar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
                  <div class="modal-header">
                          <h5 class="modal-title">Compara o Bilhete</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                      </div>
              <div class="modal-body">
                  <div class="container-fluid">
                     <div class="presentar bg-primary p-3 mb-2 d-flex align-items-center" style="border-radius: 8px"  >
                        Desejas realmente realizar a compra deste bilhete reservado ?
                     </div>
                     <form action="{{route('bilhete.compra')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="compra d-flex justify-content-between">
                           <a href="" data-dismiss="modal" class="btn text-white" style="background-color: red">Cancelar</a>
                           <button type="submit" class="btn text-white" style="background-color: green">Comprar</button>
                        </div>
                     </form>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>

  <script>
      function comprar(valor) {
          document.getElementById('id').value = valor;
      }
  </script>

@endsection
