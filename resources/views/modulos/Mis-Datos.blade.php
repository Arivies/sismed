@extends('plantilla')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Mis Datos Personales</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <h4>NOMBRE COMPLETO</h4>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">

                            <h4>CORREO</h4>
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">

                            @error('email')
                                <p class="alert alert-danger">El Correo ya existe.</p>
                            @enderror

                            <h4>NUEVA CONTRASEÑA</h4>
                            <input type="text" class="form-control" name="passwordN" value="">
                        </div>

                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <h4>DOCUMENTO</h4>
                            <input type="text" class="form-control" name="documento" value="{{ auth()->user()->documento }}">

                            <h4>TELEFONO</h4>
                            <input type="text" class="form-control" name="telefono" value="{{ auth()->user()->telefono }}">

                            <br><br>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection
