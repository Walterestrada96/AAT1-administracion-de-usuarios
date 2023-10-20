<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Administracion de Usuarios</title>
</head>

<body style="background-color:aliceblue">
    <div>
        <h1 class="text-center p-5">Control de Usuarios</h1>
    </div>
    @if (session('correcto'))
        <div>{{ session('correcto') }} </div>
    @endif
    <div class="container-fluid p-5 table-responsive">
        <div>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#Modalcrearusuario">Crear
                Usuario</button>
            <div class="modal fade" id="Modalcrearusuario" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:aquamarine">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar datos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('usuarios.create') }} "method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">

                                    <div class="mb-3">
                                        <label class="form-label">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Usuario</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="pass" name="pass">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rol</label>
                                        <input type="text" class="form-control" id="rol" name="rol">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $row)
                    <tr>
                        <th scope="row">{{ $row->id }} </th>
                        <td>{{ $row->nombre }}</td>
                        <td>{{ $row->apellido }}</td>
                        <td>{{ $row->usuario }}</td>
                        <td>{{ $row->pass }}</td>
                        <td>{{ $row->rol }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal"
                                data-bs-target="#ModalEditar{{ $row->id }}"><button type="button"
                                    class="btn btn-outline-warning">Editar</button>
                            </a>
                            <a href="{{ route('usuarios.delete', $row->id) }} "><button type="button"
                                    class="btn btn-outline-danger">Eliminar</button>
                            </a>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalEditar{{ $row->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: aquamarine">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('usuarios.update') }} "method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Id</label>
                                                <input type="text" class="form-control" id="id"
                                                    name="id" value="{{ $row->id }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre"
                                                    name="nombre"value="{{ $row->nombre }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Apellido</label>
                                                <input type="text" class="form-control" id="apellido"
                                                    name="apellido" value="{{ $row->apellido }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Usuario</label>
                                                <input type="text" class="form-control" id="usuario"
                                                    name="usuario" value="{{ $row->usuario }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Contraseña</label>
                                                <input type="text" class="form-control" id="pass"
                                                    name="pass" value="{{ $row->pass }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Rol</label>
                                                <input type="text" class="form-control" id="rol"
                                                    name="rol" value="{{ $row->rol }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
