<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Consultorios;
use App\Models\Pacientes;
use App\Models\Doctores;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if(auth()->user()->rol == "doctor" && $id != auth()->user()->id){

            return redirect('Inicio');
        }

        $horarios = DB::select('select * from horarios where id_doctor ='.$id);
        $pacientes = Pacientes::all();
        $citas = Citas::all()->where('id_doctor',$id);
        $doctor = Doctores::find($id);

        return view('modulos.Citas', compact('horarios','pacientes','citas','doctor'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function HorarioDoctor(Request $request)
    {
        $datos = request();

        DB::table('horarios')->insert(
                                ['id_doctor' => auth()->user()->id,
                                 'horaInicio' => $datos['horaInicio'],
                                 'horaFin' => $datos['horaFin'],
                                ]);

        return redirect('Citas/'.auth()->user()->id);
    }

    public function EditarHorario(Request $request)
    {
        $datos = request();

        DB::table('horarios')->where('id',$datos['id'])
                             ->update(['horaInicio' => $datos['horaInicioE'],
                                       'horaFin' => $datos['horaFinE']]);

        return redirect('Citas/'.auth()->user()->id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function CrearCita(Request $id_doctor)
    {
        Citas::create(['id_doctor' => request('id_doctor'),
                       'id_paciente'=>request('id_paciente'),
                       'FyHInicio' => request('FyHInicio'),
                       'FyHFinal' =>request('FyHFinal') ]);

        return redirect('Citas/'.request('id_doctor'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citas $citas)
    {
        DB::table('citas')->whereId(request('idCita'))->delete();

        return redirect('Citas/'.request('idDoctor'));
    }

    public function historial(){

        if(auth()->user()->rol != "paciente"){

            return view('modulos.Inicio');

        }

        $citas = Citas::all()->where('id_paciente',auth()->user()->id);
        $doctores = User::all()->where('rol','doctor');
        $consultorios = Consultorios::all();

        return view('modulos.Historial',compact('citas','doctores','consultorios'));
    }
}
