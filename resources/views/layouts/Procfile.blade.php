@extends('index')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/procfile.css')}}">
@endsection
@section('app')
@include('components.nav-bar')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 text-white p-3">
                <!-- Info perfil -->
                <div class="card">
                    <div class="card-body">
                        <!-- Foto perfil -->
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="mb-2">
                                    <img src="{{ asset('img/cheems.jpg') }}" width="200" height="200" class="img-fluid rounded"/>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="mb-1">
                                    <div class="profile-card">
                                        <div class="card-header">
                                            <div class="name">{{ $perfil->nombre }} {{ $perfil->primerApellido }} {{ $perfil->segundoApellido }}</div>
                                            <div class="desc">{{ $perfil->mail }}</div>
                                            <div class="location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $perfil->celular }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 p-3">
                <!-- Publicaciones -->
                <div class="card">
                    <div class="card-body">
                        <div class="row p-3 d-flex justify-content-center">
                            <div class="col-md-8 p-2">
                                @include('components.publication')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-card{
            width: 400px;
            text-align: center;
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header{
            padding: 60px 40px;
            background: none;
        }

        .name {
            color: rgb(21, 19, 156);
            font-size: 28px;
            font-weight: 600;
            margin: 10px 0;
        }

        .desc {
            font-size: 18px;
            color: #807ECF;
        }

        .location {
            margin: 10px 0;
            color: #6C72CB;
        }
    </style>
@endsection