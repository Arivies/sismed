@extends('plantilla')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Doctores</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#CrearDoctor">Crear Doctor</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE COMPLETO</th>
                            <th>CONSULTORIO</th>
                            <th>CORREO</th>
                            <th>DOCUMENTO</th>
                            <th>TELEFONO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctores as $doctor)
                            @if ($doctor->rol == "doctor")
                        <tr>
                            <td>{{ $doctor->id }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->CON->consultorio }}</td>
                            <td>{{ $doctor->email }}</td>
                            @if ($doctor->documento != "")
                               <td>{{ $doctor->documento }}</td>
                               @else
                               <td>Documento no registrado</td>
                            @endif

                            @if ($doctor->telefono != "")
                               <td>{{ $doctor->telefono }}</td>
                               @else
                               <td>No disponible</td>
                            @endif
                            <td>
                                <button class="btn btn-danger EliminarDoctor" Did="{{ $doctor->id }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                            @endif

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>
<div id="CrearDoctor" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h4>Nombre Completo:</h4>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <h4>Sexo:</h4>
                        <select name="sexo" id="" class="form-control" required>
                            <option value="">---- Seleccionar ----</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Consultorio:</h4>
                        <select name="id_consultorio" id="" class="form-control" required>
                            <option value="">---- Seleccionar ----</option>
                            @foreach ($consultorios as $consultorio)
                            <option value="{{ $consultorio->id }}">{{ $consultorio->consultorio }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Correo</h4>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @error('email')
                                <div class="alert alert-danger">El correo ya existe</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <h4>Contraseña</h4>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
