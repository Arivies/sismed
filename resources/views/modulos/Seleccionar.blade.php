@extends('plantilla')

@section('contenido')

<section class="content">
    <center>
        <h2>Seleccione el perfil que desea ingresar al sistema</h2>
    </center>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-fuchsia">
                <div class="inner">
                    <h3>Secretaria</h3>
                    <p>Inicie sesion</p>
                </div>
                <div class="icon">
                    <i class="fa fa-female"></i>
                </div>
                <a href="Ingresar" class="small-box-footer">
                   Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-primary" >
                <div class="inner">
                    <h3>Doctor</h3>
                    <p>Inicie sesion</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-md"></i>
                </div>
                <a href="Ingresar" class="small-box-footer">
                   Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Paciente</h3>
                    <p>Inicie sesion</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="Ingresar" class="small-box-footer">
                   Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>Administrador</h3>
                    <p>Inicie sesion</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
                <a href="Ingresar" class="small-box-footer">
                   Ingresar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>


    </div>
</section>
@endsection
