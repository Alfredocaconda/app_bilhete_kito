@extends('layouts.base')
@section('macon')
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Lista de viagens</h4>
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
                               <th>Motoristas</th>
                               <th>Carro</th>
                               <th>Hora de Embarque</th>
                               <th>Local de Embarque</th>
                               <th>Destino</th>
                               <th>Local de Desembarque</th>
                               <th>Preço</th>
                               <th>Opções</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($viagen as $valor)
                                <tr>
                                    <td>1º {{$valor->motorista1->nome}} <br> 2º {{$valor->motorista1->nome}}</td>
                                    <td>{{$valor->carro->numero}} <br> {{$valor->carro->matricula}}</td>
                                    <td>{{Carbon\Carbon::parse($valor->horario->hora)->format('H:i')}}</td>
                                    <td>{{$valor->horario->rotas->partida}}</td>
                                    <td>{{$valor->horario->rotas->destino}}</td>
                                    <td>{{$valor->horario->local}}</td>
                                    <td><b>{{number_format($valor->horario->rotas->preco,0,',',' ')}} Kz</b></td>
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
                          <h5 class="modal-title">Cadastrar da Viagem</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                      </div>
              <div class="modal-body">
                  <div class="container-fluid">
                     <form action="{{route('viagen.store')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="id">
                                                  
                          <div class="form-group">
                              <label for="moto1_id">Motorista de Inicio</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <select required class="form-control" name="moto1_id" id="moto1_id">
                                       @foreach (App\Models\Motorista::all() as $pv)
                                          <option value="{{$pv->id}}">{{$pv->nome}}</option>
                                       @endforeach
                                    </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="moto2_id">Motorista de Fim</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <select required class="form-control" name="moto2_id" id="moto2_id">
                                       @foreach (App\Models\Motorista::all() as $pv)
                                          <option value="{{$pv->id}}">{{$pv->nome}}</option>
                                       @endforeach
                                    </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="carro_id">Carro</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <select required class="form-control" name="carro_id" id="carro_id">
                                       @foreach (App\Models\Carro::all() as $pv)
                                          <option value="{{$pv->id}}">{{$pv->numero}}-{{$pv->matricula}}</option>
                                       @endforeach
                                    </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="horario_id">Rota da Viagem</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <select required class="form-control" name="horario_id" id="horario_id">
                                       @foreach (App\Models\Horario::all() as $pv)
                                          <option value="{{$pv->id}}">{{Carbon\Carbon::parse($pv->hora)->format('H:i')}}-{{$pv->rotas->partida}}-{{$pv->rotas->destino}}-{{$pv->local}}</option>
                                       @endforeach
                                    </select>
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
          document.getElementById('moto_1').value = valor.moto_1;
          document.getElementById('moto_2').value = valor.moto_2;
          document.getElementById('carro_id').value = valor.carro_id;
          document.getElementById('horario_id').value = valor.horario_id;
      }
      function limpar() {
        document.getElementById('id').value = ""
          document.getElementById('moto_1').value ="";
          document.getElementById('moto_2').value = "";
          document.getElementById('carro_id').value = "";
          document.getElementById('horario_id').value = "";
      }
  </script>
@endsection