@extends('plantilla')

@section('contenido')

<div class="login-box">
    <div class="login-logo">
        <b>Clinica Medica</b>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Ingresar al Sistema</p>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" required="" value="">
                <br>
                @error('email')
                    <div class="alert alert-danger">Error con el email o contraseña</div>
                @enderror

                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" required="" value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection
