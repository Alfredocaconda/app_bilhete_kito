@extends('layouts.base')
@section('macon')
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="card">
                <div class="card-header d-flex justify-content-between">
                   <div class="header-title">
                      <h4 class="card-title">Lista de Utilizadores</h4>
                      <a href=""><i class="fa fa-plus-circle"></i></a>
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
                      <table id="datatable" class="data-table" >
                         <thead>
                            <tr>
                               <th>Nº</th>
                               <th>Nome</th>
                               <th>Email</th>
                               <th>Tipo</th>
                               <th>Opções</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($user as $valor)
                                <tr>
                                    <td>{{$valor->id}}</td>
                                    <td>{{$valor->name}}</td>
                                    <td>{{$valor->email}}</td>
                                    <td>{{$valor->tipo}}</td>
                                    <td>
                                        <a href="{{route('user.apagar',$valor->id)}}" class="btn text-danger"><i class="fa fa-trash"></i></a>
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