@extends('layouts.base')
@section('macon')
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Lista de Carros</h4>
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
                      <table id="datatable" class=" data-table table-striped" >
                         <thead>
                            <tr>
                               <th>Nº</th>
                               <th>Matricula</th>
                               <th>Lotação</th>
                               <th>Estado</th>
                               <th>Opções</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($carro as $valor)
                                <tr>
                                    <td>{{$valor->numero}}</td>
                                    <td>{{$valor->matricula}}</td>
                                    <td>{{$valor->lotacao}}</td>
                                    <td>{{$valor->estado}}</td>
                                    <td>
                                       <a href="#Cadastrar" data-toggle="modal" onclick="editar({{$valor}})" class="btn text-primary"><i class="fa fa-edit"></i></a>
                                       <a href="{{route('carro.apagar',$valor->id)}}" class="btn text-danger"><i class="fa fa-trash"></i></a>
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
                     <form action="{{route('carro.store')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="id">
                          <div class="form-group">
                              <label for="numero">Número do Carro</label>
                              <div class="form-input">
                                  <input type="text" class="form-control" required name="numero" id="numero">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="matricula">Matricula do Carro</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <input type="text" maxlength="13" required class="form-control" name="matricula" id="matricula">
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="lotacao">Número de lotação do Carro</label>
                              <div class="form-input">
                                 <div class="form-input">
                                    <input type="text" required class="form-control" name="lotacao" id="lotacao">
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
          document.getElementById('numero').value = valor.numero;
          document.getElementById('matricula').value = valor.matricula;
          document.getElementById('lotacao').value = valor.lotacao;
      }
      function limpar() {
          document.getElementById('id').value = "";
          document.getElementById('numero').value = "";
          document.getElementById('matricula').value = "";
          document.getElementById('lotacao').value = "";
      }
  </script>
@endsection
