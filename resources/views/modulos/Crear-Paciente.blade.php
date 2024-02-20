@extends('plantilla')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Crear Paciente</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <h4>Nombre Completo</h4>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <h4>Documento</h4>
                                <input type="text" class="form-control" name="documento" >
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
                            <br>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
            </div>
        </div>
            </div>
        </div>
    </section>
</div>

@endsection
