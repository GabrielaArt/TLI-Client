@if(count($publicaciones) > 0)
    @foreach($publicaciones as $publicacion)
        <div class="card overflow-hidden p-2 mb-3">
            <div class="row g-0">
                <!-- Input onload -->
                <input id="{{ $publicacion->_id }}" oonload="getComments(this)"/>
                <!-- ImagenPost -->
                <div class="col-md-3 d-flex justify-content-center">
                    <img src="img/fondo.jpg"  height="300px" class="img-fluid rounded-center rounded-0"/>
                </div>
                <div class="col-md-9 border">
                    <div class="card-body">
                        <div class="row">
                            <!-- Info del creador-->
                            <div class="row">
                                <h3 class="text-center bg-danger">
                                    {{ $publicacion->Usuario->nombre }} {{ $publicacion->Usuario->primerApellido }} {{ $publicacion->Usuario->segundoApellido }}
                                </h3>
                            </div>
                            <!-- contenido de la publicacion-->
                            <div class="row">
                                <h5>{{ $publicacion->encabezado }}</h5>
                                <p>{{ $publicacion->created_at }}</p>
                                <p>{{ $publicacion->contenido }}</p>
                            </div>
                        </div>
                        <div class="row caja-comentarios">
                            <!-- Cajita de comentarios -->
                            @include('components.comments.comment-reader')
                            <!-- Campo de comentario -->
                            <div class="col-md-12 d-flex align-items-center h-25 py-2">
                                @include('components.comments.comment-input')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <h1>Aun no hay publicaciones</h1>
@endif
@section('scripts')
    <script type="text/javascript">
        getComments = async(_id) => {
            try{
                //Read comments
                let _comentarios = await readComments(_id);

                //Iterar los comentarios
                if(_comentarios.length > 0){
                    _comentarios.imap(Comentario => {
                        $('.caja-comentarios').append(`
                            <div class="col-md-12 col-reader">
                                <div class="d-flex my-2 p-2">
                                    <!-- Foto de perfil del comentador -->
                                    <img src="img/cheems.jpg" class="avatar-sm rounded-circle mx-3" height="50" alt="Avatar"/>

                                    <!-- Comentador Info. -->
                                    <div id="dvComment" class="message flex-grow-1">
                                        <div class="d-flex">
                                            <!-- NombreComentador -->
                                            <p id="lblUser" class="mb-1 text-title text-16 flex-grow-1">
                                                `+Comentario.Usuario.nombre+` `+Comentario.Usuario.primerApellido+` `+Comentario.segundoApellido+`
                                            </p>
                                            <!-- FechaCreacion -->
                                            <span id="lblCreatedAt" class="text-small text-muted">
                                                `+Comentario.created_at+`
                                            </span>
                                        </div>
                                        <!-- ContenidoComentario -->
                                        <p id="lblContenido" class="m-0">
                                            `+Comentario.contenido+`
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                }
            }
            catch(error){
                console.log(error);
            }
        }

        readComments = (id) => {
            return new Promise((resolve, reject) => {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: 'POST',
                    url: 'sigIn/comments',
                    data: { "_id": id.id },
                    dataType: 'json',
                    success: function(respuesta){
                        resolve(respuesta);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        }

        fullControls = () => {};
    </script>
@endsection