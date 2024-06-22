<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bilhete</title>
    {{-- <link rel="stylesheet" href="{{asset('css/bilhete.css')}}"> --}}
    <style>
        .base{
            width: 100%;
            display: flex;
            justify-content: center;
            padding-top: 30px;
            padding-bottom: 30px;
            .bilhete{
                width: 40%;
                border: 1px solid dimgray;
                border-radius: 8px;
                .baseTop{
                    background: rgb(0, 17, 255);
                    color: rgb(228, 18, 18);
                    border-top-left-radius: 8px;
                    border-top-right-radius: 8px;
                    padding: 5px;
                    text-align: center
                    margin-bottom: 20px;
                    h5{
                        color: white;
                        margin-left: 10px;
                        margin-right: 10px;
                        font-size: 25px;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                }
                .corpo{
                    width: 100%;
                    padding-left: 20px;
                    padding-right: 20px;
                    font-size: 16px;
                    font-weight: 400;
                    color: dimgray;
                    p{
                        font-size: 20px;
                    }
                    table{
                        width: 100%;
                        thead{
                            
                            tr{
                                th{
                                    text-align: center;
                                }
                            }
                        }
                        tbody{
                            tr{
                               
                                td{
                                    text-align: center;
                                }
                            }
                        }
                    }
                }
                .musaico{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 20px;
                    font-size: 40px;
                }
            }
        }
    </style>
</head>
<body>
    <div class="baseTo">
        <div class="container-fluid">
                <div class="head-body">
                    <div class="container-fluid base">
                        <div class="bilhete">
                            <div class="baseTop" style="text-align: center;">
                                <i class="fa fa-bus"></i><h5>Bilhete Macon</h5><i class="fa fa-bus"></i>
                            </div>
                             <div class="corpo">
                               <p>Nome: <b>{{Auth::user()->cliente->nome}}</b></p>
                                <p>Partida: <b>{{$valor->viagen->horario->rotas->partida}}</b></p>
                                <p>Destino: <b>{{$valor->viagen->horario->rotas->destino}} - {{$valor->viagen->horario->local}}</b></p>
                                <p>Preço: <b>{{number_format($valor->viagen->horario->rotas->preco,0,',',' ')}} Kz</b></p>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Embarque</th>
                                            <th>Acento</th>
                                            <th>Carro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center;">
                                            <td>{{Carbon\Carbon::parse($valor->viagen->horario->hora)->format('Y-m-d / H:i') }}</td>
                                            <td>{{$valor->acento}}</td>
                                            <td>{{$valor->viagen->carro->numero}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
