@extends('layouts.base')
@section('macon')
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Lista de Horarios</h4>
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
                               <th>Hora de Embarque</th>
                               <th>Local de Embarque</th>
                               <th>Destino</th>
                               <th>Local de Desembarque</th>
                               <th>Opções</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($horarios as $valor)
                                <tr>
                                    <td>{{$valor->id}}</td>
                                    <td>{{Carbon\Carbon::parse($valor->hora)->format('H:i')}}</td>
                                    <td>{{$valor->rotas->partida}}</td>
                                    <td>{{$valor->rotas->destino}}</td>
                                    <td>{{$valor->local}}</td>
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
                          <h5 class="modal-title">Cadastrar Horario</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                      </div>
              <div class="modal-body">
                  <div class="container-fluid">
                     <form action="{{route('horario.store')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="id">
                          <div class="form-group">
                              <label for="hora">Hora de Embarque</label>
                              <div class="form-input">
                                <input type="time" class="form-control" name="hora" id="hora">
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label for="rota">Rota</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <select required class="form-control" name="rota" id="rota">
                                       @foreach (App\Models\Rota::all() as $pv)
                                          <option value="{{$pv->id}}">{{$pv->partida}}-{{$pv->destino}}</option>
                                       @endforeach
                                    </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="local">Local de Desembarque da Viagem</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <input type="text" required class="form-control" name="local" id="local">
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
          document.getElementById('hora').value = valor.hora;
          document.getElementById('rota').value = valor.rota;
          document.getElementById('local').value = valor.local;
      }
      function limpar() {
          document.getElementById('id').value = "";
          document.getElementById('hora').value = "";
          document.getElementById('rota').value = "";
          document.getElementById('local').value = "";
      }
  </script>
@endsection