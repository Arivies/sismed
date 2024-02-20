@extends('plantilla')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar el Paciente: {{ $paciente->name }}</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Pacientes') }}">
                    <button class="btn btn-primary btn-md">Volver a Pacientes</button>
                </a>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ url('Actualizar-Paciente/'.$paciente->id) }}" method="post">
                            @csrf
                            @method('put')

                            <h4>Nombre Completo:</h4>
                            <input type="text" class="form-control" name="name" value="{{ $paciente->name }}">

                            <h4>Documento:</h4>
                            <input type="text" class="form-control" name="documento" value="{{ $paciente->documento }}">

                            <h4>Correo:</h4>
                            <input type="email" class="form-control" name="email" value="{{ $paciente->email }}">

                            <h4>Nueva Contraseña:</h4>
                            <input type="password" class="form-control" name="passwordN" value="">
                            <input type="hidden" name="password" value="{{ $paciente->password }}">

                            <h4>Telefono:</h4>
                            <input type="text" class="form-control" name="telefono" value="{{ $paciente->telefono }}">
                            <br />
                            <button class="btn btn-success" type="submit">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
