@extends('plantilla')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Secretarias</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearSecretaria">Crear Secretaria</button>
            </div>
            <div class="box-body">
                <table class="table table-hover table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                            <th>DOCUMENTO</th>
                            <th>TELEFONO</th>
                            <th>EDITAR | ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($secretarias as $secretaria)
                            <tr>
                                <td>{{ $secretaria->id }}</td>
                                <td>{{ $secretaria->name }}</td>
                                <td>{{ $secretaria->email }}</td>

                                @if ($secretaria->documento != "")
                                    <td>{{ $secretaria->documento }}</td>
                                @else
                                    <td>No Disponible</td>
                                @endif

                                @if ($secretaria->telefono != "")
                                    <td>{{ $secretaria->telefono }}</td>
                                @else
                                    <td>Sin registrar</td>
                                @endif

                                <td>
                                    <a href="{{ url('Editar-Secretaria/'.$secretaria->id) }}">
                                        <button class="btn btn-success AbreEditSecretaria" Sid="{{ $secretaria->id }}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>

                                    <button class="btn btn-danger EliminarSecretaria" Sid="{{ $secretaria->id }}" data-dismiss="modal">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="CrearSecretaria">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        @csrf
                        <div class="form-group">
                            <h4>NOMBRE COMPLETO</h4>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <h4>CORREO</h4>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">
                                    El correo ya existe
                                </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <h4>CONTRASEÑA</h4>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="EditarSecretaria">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('actualizar-secretaria/'.$secretaria->id) }}" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <h4>NOMBRE COMPLETO</h4>
                            <input type="text" class="form-control input-lg" name="name" value="{{ $secretaria->name }}">
                        </div>
                        <div class="form-group">
                            <h4>CORREO</h4>
                            <input type="email" class="form-control input-lg" name="email" value="{{ $secretaria->email }}">
                            @error('email')
                                <div class="alert alert-danger">
                                    El correo ya existe
                                </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <h4>NUEVA CONTRASEÑA</h4>
                            <input type="password" class="form-control input-lg" name="passwordN" value="">
                            <input type="hidden" name="password" value="{{ $secretaria->password }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
