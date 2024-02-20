@extends('plantilla')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>Elija un Consultorio</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                @foreach ($consultorios as $consultorio)
                <div class="col-lg-3 col-xs-6">
                    <a href="Ver-Doctores/{{ $consultorio->id }}">
                        <div class="small-box text-center" style="background-color: #6d6d6d; color:white;">
                            <div class="inner">
                                <h4>{{ $consultorio->consultorio }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@endsection
