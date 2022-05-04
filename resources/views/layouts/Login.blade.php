@extends('index')
@section('app')
    @include('components.notificacion')
	<div class="container w-75 mt-4 rounded shadow">
        <div class="row align-items-stretch">
            <!-- Image Login -->
            <div class="col bg d-none d-lg-block col-md-5 col-log-5 col-xl-6 rounded" style="background-image: url({{ asset('img/fondo.jpg')  }})">
            
            </div>
            <div class="col bg-light p-5 rounded-end">
                <div class="row">
                    <div class="col">
                        <div class="text-start">
                            <img src="{{ asset('img/large-logo.jpg') }}" width="128"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-end">
                            <img src="{{ asset('img/logo.jpg') }}" width="48"/>
                        </div>
                    </div>    
                </div>

                <h2 class="fw-bold text-center py-5">Bienvenido</h2>
                
                <!-- Formulario - Login -->
                <form id="fmLogin" method="POST" action="{{ route('login') }}">
                    @csrf()
                    <div class="mb-4">
                        <label for="inpMail" class="form-label">Correo</label>
                        <input name="inpMail" type="mail" class="form-control" placeholder="example@example.ts" required/>
                    </div>
                    <div class="mb-4">
                        <label for="inpPasswrd" class="form-label">Contraseña</label>
                        <input name="inpPasswrd" type="password" class="form-control" placeholder="***************" required/>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Acceder
                        </button>
                    </div>
                </form>
                <div class="my-2 text-center">
                    <button id="btnRegistrarte" type="button" class="btn btn-light" onclick="showForm(this)">
                        Registrarte
                    </button>
                </div>

                <!-- Formulario - Register -->
                <form id="fmRegister" method="POST" action="{{ route('register') }}" style="display:none;">
                    @csrf()
                    <div class="mb-4">
                        <label for="inpNombre" class="form-label">Nombre</label>
                        <input name="inpNombre" type="text" class="form-control" placeholder="Nombre" required/>
                    </div>
                    <div class="mb-4">
                        <label for="inpPrimeroAp" class="form-label">Primer apellido</label>
                        <input name="inpPrimeroAp" type="text" class="form-control" placeholder="Primer apellido" required/>
                    </div>
                    <div class="mb-4">
                        <label for="inpSegundoAp" class="form-label">Segundo apellido</label>
                        <input name="inpSegundoAp" type="text" class="form-control" placeholder="Segundo apellido" required/>
                    </div>
                    <div class="mb-4">
                        <label for="inpEMail" class="form-label">Correo</label>
                        <input name="inpEMail" type="mail" class="form-control" placeholder="example@example.ts" required/>
                    </div>
                    <div class="mb-4">
                        <label for="inpPassword" class="form-label">Contraseña</label>
                        <input name="inpPassword" type="password" class="form-control" placeholder="***************" required/>
                    </div>
                    <div class="mb-4">
                        <label for="inpTelefono" class="form-label">Telefono</label>
                        <input name="inpTelefono" maxlength="10" type="text" class="form-control" placeholder="272 248 9823"/>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            Registrar
                        </button>
                    </div>
                </form>
                <div class="my-2 text-center">
                    <button id="btnIniciarSesion" type="button" class="btn btn-light" style="display:none;" onclick="showForm(this)">
                        Iniciar sesion
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        showForm = (formulario) => {
            if(formulario.id === 'btnRegistrarte'){
                $('#fmRegister').css('display','');
                $('#fmLogin').css('display','none');

                $('#btnRegistrarte').css('display','none');
                $('#btnIniciarSesion').css('display','');
            }
            else{
                $('#fmRegister').css('display','none');
                $('#fmLogin').css('display','');

                $('#btnRegistrarte').css('display','');
                $('#btnIniciarSesion').css('display','none');
            }
        }
    </script>
@endsection