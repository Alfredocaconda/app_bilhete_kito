@extends('layouts.base')
@section('macon')
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Lista de Motoristas</h4>
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
                               <th>Nome</th>
                               <th>Província</th>
                               <th>Munícipio</th>
                               <th>Contacto</th>
                               <th>Data Nascimento</th>
                               <th>Opções</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($motorista as $valor)
                                <tr>
                                    <td>{{$valor->id}}</td>
                                    <td>{{$valor->nome}}</td>
                                    <td>{{$valor->provincia}}</td>
                                    <td>{{$valor->municipio}}</td>
                                    <td>{{$valor->contacto}}</td>
                                    <td>{{$valor->data_nascimento}}</td>
                                    <td>
                                       <a href="#Cadastrar" data-toggle="modal" onclick="editar({{$valor}})" class="btn text-primary"><i class="fa fa-edit"></i></a>
                                       <a href="{{route('motorista.apagar',$valor->id)}}" class="btn text-danger"><i class="fa fa-trash"></i></a>
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
         <!-- Modal -->
         <div class="modal fade" id="Cadastrar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Cadastrar Motoristas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                           <form action="{{route('motorista.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label for="nome">Nome do motorista</label>
                                    <div class="form-input">
                                        <input type="text" class="form-control" name="nome" id="nome">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="provincia">Província do motorista</label>
                                    <div class="form-input">
                                        <input type="text" class="form-control" name="provincia" id="provincia">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="municipio">Munícipio do motorista</label>
                                    <div class="form-input">
                                        <input type="text" class="form-control" name="municipio" id="municipio">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contacto">Contacto do motorista</label>
                                    <div class="form-input">
                                        <input type="text" class="form-control" name="contacto" id="contacto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="data_nascimento">Data de nascimento</label>
                                    <div class="form-input">
                                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
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
                document.getElementById('nome').value = valor.nome;
                document.getElementById('provincia').value = valor.provincia;
                document.getElementById('municipio').value = valor.municipio;
                document.getElementById('contacto').value = valor.contacto;
                document.getElementById('data_nascimento').value = valor.data_nascimento;
            }
            function limpar() {
                document.getElementById('id').value = "";
                document.getElementById('nome').value = "";
                document.getElementById('provincia').value = "";
                document.getElementById('municipio').value = "";
                document.getElementById('contacto').value = "";
                document.getElementById('data_nascimento').value = "";
            }
        </script>
@endsection