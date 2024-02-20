<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sismed</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style-->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">


  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load.-->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">


  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/responsive.bootstrap.min.css')}}">


  <!-- FullCalendar -->
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">


  <!-- Select 2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">


@if (Auth::user())
<div class="wrapper">

    @include('modulos.cabecera')

    @if (auth()->user()->rol == "secretaria")

        @include('modulos.menuSecretaria')

        @elseif (auth()->user()->rol == "doctor")

        @include('modulos.menuDoctor')

        @elseif (auth()->user()->rol == "paciente")

        @include('modulos.menuPaciente')

        @else

        @include('modulos.menuAdministrador')

    @endif

    @yield('content')
</div>
<!-- ./wrapper -->
@else
    @yield('contenido')
@endif


{{-- @yield('contenido') --}}

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>

<!-- AdminLTE App-->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes)-->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>

<!-- AdminLTE for demo purposes-->
<script src="{{ asset('dist/js/demo.js')}}"></script>

<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- FullCalendar -->
<script src="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{ asset('bower_components/fullcalendar/dist/locale/es.js')}}"></script>
<script src="{{ asset('bower_components/moment/moment.js')}}"></script>


<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.js')}}"></script>



<script type="text/javascript">
    $(".table").DataTable({
        "language": {
            "sSearch": "Buscar:",
            "sEmptyTable": "No hay datos en la Tabla",
            "sZeroRecords": "No se encontraron resultados",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
            "SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sLoadingRecords": "Cargando...",
            "sLengthMenu": "Mostrar _MENU_ registros"
        }
    });

    $("#select2").select2();


</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('registrado') == "Si")

    <script type="text/javascript">
        Swal.fire('El Doctor ha sido Registrado',
                  '',
                  'success')
    </script>

@elseif (session('agregado') == "Si")

    <script type="text/javascript">
        Swal.fire('El Paciente ha sido Registrado',
                  '',
                  'success')
    </script>


@elseif (session('actualizadoP') == "Si")

    <script type="text/javascript">
        Swal.fire('El Paciente ha sido Actualizado',
                  '',
                  'success')
    </script>

@elseif (session('SecretariaCreada') == "Si")

    <script type="text/javascript">
        Swal.fire('La Secretaria ha sido Registrada',
                  '',
                  'success')
    </script>

@endif


<script type="text/javascript">

    $('.table').on('click','.EliminarDoctor',function(){

        var Did=$(this).attr('Did');
        Swal.fire({
            title:'¿Seguro que Desea Eliminar este Doctor?',
            icon:'warning',
            showCancelButton: true,
            cancelButonText: 'Cancelar',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            confirmButtonColor:'#3085d6'
        }).then((result) =>{
            if(result.isConfirmed){
                window.location="Eliminar-Doctor/"+Did;
            }
        })
    })

    $('.table').on('click','.EliminarPaciente',function(){

        var Pid = $(this).attr('Pid');
        var Paciente = $(this).attr('Paciente');
        Swal.fire({
            title:'¿Seguro que Desea Eliminar el Paciente: '+Paciente+' ?',
            icon:'warning',
            showCancelButton: true,
            cancelButonText: 'Cancelar',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            confirmButtonColor:'#3085d6'
        }).then((result) =>{
            if(result.isConfirmed){
                window.location="Eliminar-Paciente/"+Pid;
            }
        })
    })


    $('.table').on('click','.EliminarSecretaria',function(){

        var Sid=$(this).attr('Sid');
        Swal.fire({
            title:'¿Seguro que Desea Eliminar esta Secretaria?',
            icon:'warning',
            showCancelButton: true,
            cancelButonText: 'Cancelar',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            confirmButtonColor:'#3085d6'
        }).then((result) =>{
            if(result.isConfirmed){
                window.location="Eliminar-Secretaria/"+Sid;
            }
        })
    })


</script>


<?php
    $exp = explode("/", $_SERVER["REQUEST_URI"]);
?>

@if ($exp[1] == "Editar-Secretaria")
<script type="text/javascript">

    $(document).ready(function(){

       /* $(".AbreEditSecretaria").on("click",function(){
            $("#EditarSecretaria").modal('toggle');
        });*/

        //$('.table').on('click','.AbreEditSecretaria',function(){

            $("#EditarSecretaria").modal('toggle');
       // })



    });
</script>
@endif


@if($exp[1] == "Citas")


<script type="text/javascript">
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        a = date.getFullYear();

        $("#calendario").fullCalendar({
            defaultView: 'agendaWeek',
            hiddenDays: [0,6],
            events:[
                @foreach ($citas as $cita)
                    @if (auth()->user()->rol == "doctor")

                        {
                            id:'{{ $cita->id }}',
                            title:'{{ $cita->PAC->name }}',
                            start:'{{ $cita->FyHInicio }}',
                            end:'{{ $cita->FyHFin }}'
                        },

                    @elseif(auth()->user()->rol == "paciente")
                        @if ($cita->id_paciente == auth()->user()->id)

                        {
                            id:'{{ $cita->id }}',
                            title:'{{ $cita->PAC->name }}',
                            start:'{{ $cita->FyHInicio }}',
                            end:'{{ $cita->FyHFin }}'
                        },
                        @else

                        {
                            id:'{{ $cita->id }}',
                            title:'No Disponible',
                            start:'{{ $cita->FyHInicio }}',
                            end:'{{ $cita->FyHFin }}'
                        },


                        @endif




                    @endif
                @endforeach
            ],

            @if($horarios != null)

                scrollTime: "{{ $hora->horaInicio }}",
                minTime:    "{{ $hora->horaInicio }}",
                maxTime:    "{{ $hora->horaFin }}",
            @else
                scrollTime: null,
                minTime:    null,
                maxTime:    null,

            @endif


            dayClick:function(date,jsEvent,view){
                var fecha = date.format();
                var hora = ("01:00:00").split(":");
                fecha = fecha.split("T");

                var hora1 = (fecha[1]).split(":");

                 var HI = parseFloat(hora1[0]);
                 var HA = parseFloat(hora[0]);

                var horaFinal = HI+HA;

                if(horaFinal < 10 && horaFinal > 0){

                    var HF = "0"+horaFinal+":00:00";

                }else{
                    var HF = horaFinal+":00:00";
                }

                var n = new Date();
                var y = n.getFullYear();
                var m = n.getMonth()+1;
                var d = n.getDate();

                if(m < 10){

                    var M = "0"+m;
                    if(d < 10){
                        var D = "0"+d;

                        var diaActual= y+"-"+M+"-"+D;

                    }else{
                        var diaActual= y+"-"+M+"-"+d;
                    }
                }
                else{
                    var diaActual= y+"-"+m+"-"+d;
                }

                if(diaActual <= fecha[0]){

                    if("{{ auth()->user()->rol }}" == "doctor"){

                        $("#CitaModal").modal();

                    }else if("{{ auth()->user()->rol }}" == "paciente"){

                        $("#Cita").modal();
                    }
                }

                    $("#Fecha").val(fecha[0]);
                    $("#Hora").val(hora1[0]+":00:00");
                    $("#FyHInicio").val(fecha[0]+" "+hora1[0]+":00:00");
                    $("#FyHFinal").val(fecha[0]+" "+HF);

                    //PARAMETROS DE FECHA Y HORA EN MODAL DE CIPAS DESDE EL PERFIL PACIENTE
                    $("#FechaP").val(fecha[0]);
                    $("#HoraP").val(hora1[0]+":00:00");
                    $("#FyHInicioP").val(fecha[0]+" "+hora1[0]+":00:00");
                    $("#FyHFinalP").val(fecha[0]+" "+HF);
            },

            eventClick:function(calEvent,jsEvent,view){

                if("{{ auth()->user()->rol }}" == "doctor"){

                    $("#EventoModal").modal();
                }

                $("#paciente").html(calEvent.title);
                $("#idCita").val(calEvent.id);



            }



        });

</script>
@endif


</body>
</html>
