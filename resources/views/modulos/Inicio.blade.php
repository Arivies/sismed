@extends('plantilla')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h2>Bienvenidos</h2>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8 ">
                    <h4>Horario: {{ $inicio->dias }}<br>De: {{ $inicio->horaInicio }} a {{ $inicio->horaFin }}</h4>
                    <hr style="border-color: #6d6d6d;">

                    <h4>Direccion: </h4>
                    <h4>{{ $inicio->direccion }}</h4>
                    <hr style="border-color: #6d6d6d;">

                    <h4>Contactos: </h4>
                    <h4>Telefono: {{ $inicio->telefono }} <br>Correo: {{ $inicio->email }} </h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-4">
                    <img src="img_inicio/{{ $inicio->logo }}" class="img-responsive"  width="200px">
                </div>

            </div>

        @if (auth()->user()->rol == "administrador")
            <div class="box-footer">
                <a href="{{ url('Inicio-Editar') }}">
                    <button class="btn btn-success btn-md">Editar</button>
                </a>
            </div>
        @endif
        </div>
    </section>
</div>

@endsection
