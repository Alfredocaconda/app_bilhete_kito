@extends('layouts.base')
@section('macon')
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Lista de Rotas</h4>
                      <a href="#Cadastrar" onclick="limpar()" data-toggle="modal"><i class="fa fa-plus-circle"></i></a>
                   </div>
                </div>
                @if(session('Error'))
                     <div class="alert alert-danger">
                        <p>{{session('Error')}}</p>
                     </div>
                  @endif
                  @if(session('Sucesso'))
                     <div class="alert alert-success">
                        <p>{{session('Sucesso')}}</p>
                     </div>
                  @endif
                <div class="card-body">
                   <div class="table-responsive">
                      <table id="datatable" class="data-table table-striped" >
                         <thead>
                            <tr>
                               <th>Nº</th>
                               <th>Partida</th>
                               <th>Destino</th>
                               <th>Preço</th>
                               <th>Opções</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($rotas as $valor)
                                <tr>
                                    <td>{{$valor->id}}</td>
                                    <td>{{$valor->partida}}</td>
                                    <td>{{$valor->destino}}</td>
                                    <td><b>{{ number_format($valor->preco,0,',',' ') }} kz</b></td>
                                    <td>
                                       <a href="#Cadastrar" data-toggle="modal" onclick="editar({{$valor}})" class="btn text-primary"><i class="fa fa-edit"></i></a>
                                       <a href="{{route('rota.apagar',$valor->id)}}" class="btn text-danger"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="Cadastrar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
                  <div class="modal-header">
                          <h5 class="modal-title">Cadastrar Carros</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                      </div>
              <div class="modal-body">
                  <div class="container-fluid">
                     <form action="{{route('rota.store')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="id">
                          <div class="form-group">
                              <label for="partida">Local de Partida</label>
                              <div class="form-input">
                                 <select class="form-control" required name="partida" id="partida">
                                    @foreach ($pontos as $pv)
                                       <option value="{{$pv}}">{{$pv}}</option>
                                    @endforeach
                                 </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="destino">Destino</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <select required class="form-control" name="destino" id="destino">
                                       @foreach ($pontos as $pv)
                                          <option value="{{$pv}}">{{$pv}}</option>
                                       @endforeach
                                    </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="preco">Preço da Viagem</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <input type="text" required class="form-control" name="preco" id="preco">
                                </div>
                              </div>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </form>
              </div>
          </div>
      </div>
  </div>

  <script>
      function editar(valor) {
          document.getElementById('id').value = valor.id;
          document.getElementById('partida').value = valor.partida;
          document.getElementById('destino').value = valor.destino;
          document.getElementById('preco').value = valor.preco;
      }
      function limpar() {
          document.getElementById('id').value ="";
          document.getElementById('partida').value = "";
          document.getElementById('destino').value = "";
          document.getElementById('preco').value = "";
      }
  </script>
@endsection