@extends('plantilla')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de Consultorios</h1>
        </section>
        <section class="content">
            <div class="box">
                <br>
                <div class="row">
                    <form action="" method="post">
                        @csrf
                        <div class="col-lg-6 col-md-6 col-xs-7">
                            <input type="text" name="consultorio" class="form-control" placeholder="Ingrese Nuevo Consultorio"
                                required>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-1">
                            <button type="submit" class="btn btn-primary">Agregar Consultorio</button>
                        </div>
                    </form>
                </div>
                <br><br>
                <div class="box-body">
                    @foreach ( $consultorios as $consultorio)
                    <div class="row">
                        <form action="{{ url('Consultorio/'.$consultorio->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-7">
                                <input type="text" class="form-control" name="consultorioE" value="{{ $consultorio->consultorio }}">
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                <button class="btn btn-success" type="submit">Editar</button>
                            </div>
                        </form>
                        <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                            <form action="{{ url('borrar-Consultorio/'.$consultorio->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
