@extends('layouts.base')
@section('macon')
<div class="container-fluid">
    <div class="d-grid grid-cols-2 custom-grid-media">
        <div class="">
            <div class="card border subs-card pb-2">
                <div class="card-body">
                <div class="">
                    <div class="">
                        <h2 class="mb-2">MACON , o seu destino é o nosso objectivo</h2>
                        <p class="pb-3">SEJA BEM VINDO!</p>
                    </div>

                </div>
                <div class="subs-image">
                    <img src="images/layouts/LOGO-MACON.png" alt="user-image" class="img-fluid">
                </div>
                </div>
            </div>
        </div>
        <div class="right-list index-list-scrollbar">
            <a href="" title="">
                <div class="media iq-option border align-items-center p-3">
                <div class="bg-success-light rounded p-4">
                    <img src="images/user/04.jpg" class="img-fluid avatar-50" alt="image">
                </div>
                <div class="media-body">
                    <h4 class="mb-2">FUNCIONÁRIO</h4>
                    <p class="mb-0">
                        {{App\Models\Funcionario::count()}}
                    </p>
                </div>
                </div>
            </a>
            <a href="" title="">
                <div class="media iq-option border align-items-center p-3">
                <div class="bg-danger-light rounded p-4">
                    <img src="images/user/macon.jpg" class="img-fluid avatar-50" alt="image">
                </div>
                <div class="media-body">
                    <h4 class="mb-2">CARROS</h4>
                    <p class="mb-0">{{App\Models\Carro::count()}}</p>
                </div>
                </div>
            </a>
            <a href="" title="">
                <div class="media iq-option active border align-items-center p-3">
                <div class="bg-success-light rounded p-4">
                    <img src="images/user/user-1.jpg" class="img-fluid avatar-50" alt="image">
                </div>
                <div class="media-body">
                    <h4 class="mb-2">CLIENTES</h4>
                    <p class="mb-0">{{App\Models\Cliente::count()}}</p>
                </div>
                </div>
            </a>
            <a href="" title="">
                <div class="media iq-option border align-items-center p-3">
                <div class="bg-info-light rounded p-4">
                    <img src="images/options/04.png" class="img-fluid avatar-50" alt="image">
                </div>
                <div class="media-body">
                    <h4 class="mb-2">BILHESTES</h4>
                    <p class="mb-0">{{App\Models\Bilhete::count()}}</p>
                </div>
                </div>
            </a>
            <a href="" title="">
                <div class="media iq-option border align-items-center p-3">
                <div class="bg-warning-light rounded p-4">
                    <img src="images/user/12.jpg" class="img-fluid avatar-50" alt="image">
                </div>
                <div class="media-body">
                    <h4 class="mb-2">MOTORISTA</h4>
                    <p class="mb-0">{{App\Models\Motorista::count()}}</p>
                </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Page end  -->
    </div>
@endsection
