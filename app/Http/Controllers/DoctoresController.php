<?php

namespace App\Http\Controllers;

use App\Models\Doctores;
use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->rol != "administrador" && auth()->user()->rol != "secretaria"){

            return redirect('Inicio');
        }

        $consultorios = Consultorios::all();
        $doctores = Doctores::all();

        return view('modulos.Doctores', compact('consultorios','doctores'))
                ->with('i',request()->input('page','1')-1 * 5);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' => 'required',
            'sexo' => 'required',
            'id_consultorio' => 'required',
            'password' => 'required|string|min:3',
            'email' => 'required|string|email|unique:users'
        ]);

        Doctores::create([
            'name' => $datos['name'],
            'id_consultorio' => $datos['id_consultorio'],
            'email' => $datos['email'],
            'sexo' => $datos['sexo'],
            'documento' => '',
            'telefono' => '',
            'rol' => 'doctor',
            'password' => Hash::make($datos['password'])
        ]);

        return redirect('Doctores')->with('registrado','Si');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id/*Doctores $doctores*/)
    {
        DB::table('users')->whereId($id)->delete();
        return redirect('Doctores');
    }

    public function VerDoctores($id){

        $consultorio = Consultorios::find($id);
        $doctores = DB::select('select * from users where id_consultorio='.$id);
        $horarios = DB::select('select * from horarios');
        return view('modulos.Ver-Doctores',compact('consultorio','doctores','horarios'));
    }

}
