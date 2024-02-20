<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PacientesController extends Controller
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


        if(auth()->user()->rol != "administrador" && auth()->user()->rol != "secretaria" && auth()->user()->rol != "doctor"){

            return redirect('Inicio');
        }

          $pacientes = DB::select('select * from users where rol="paciente" ');
          return view('modulos.Pacientes')->with('pacientes',$pacientes);
        //$doctores = Doctores::all();
         //return view('modulos.Pacientes'/*,compact('consultorios','doctores')*/);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->rol != "administrador" && auth()->user()->rol != "secretaria" && auth()->user()->rol != "doctor"){

            return redirect('Inicio');
        }

        //$consultorios = Consultorios::all();
        //$doctores = Doctores::all();

         return view('modulos.Crear-Paciente'/*,compact('consultorios','doctores')*/);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'name' => 'required',
            'documento' => 'required',
            'password' => 'required|string|min:3',
            'email' => 'required|string|email|unique:users'
        ]);

        Pacientes::create([
            'name' => $datos['name'],
            'id_consultorio' => 0,
            'email' => $datos['email'],
            'sexo' => '',
            'documento' => $datos['documento'],
            'telefono' => '',
            'rol' => 'paciente',
            'password' => Hash::make($datos['password'])
        ]);

        return redirect('Pacientes')->with('agregado','Si');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pacientes $pacientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pacientes $id)
    {
        if(auth()->user()->rol != "administrador" && auth()->user()->rol != "secretaria" && auth()->user()->rol != "doctor"){

            return redirect('Inicio');
        }

        $paciente = Pacientes::find($id->id);

        return view('modulos.Editar-Paciente')->with('paciente',$paciente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pacientes $paciente)
    {
        if($paciente['email'] != request('email') && request('passwordN') != ""){
            $datos = request()->validate([
                    'name' => 'required',
                    'documento' => 'required',
                    'passwordN' => 'required|string|min:3',
                    'email' => 'required|string|email|unique:users'
                ]);

            DB::table('users')->where('id',$paciente['id'])
                              ->update(['name' => $datos['name'],
                                       'email'=> $datos['email'],
                                       'documento' => $datos['documento'],
                                       'telefono' => empty($request->telefono)?'':$request->telefono,
                                       'password' => Hash::make($datos['passwordN']) ]);
        }
        elseif($paciente['email'] != request('email') && request('passwordN') == ""){

            $datos = request()->validate([
                'name' => 'required',
                'documento' => 'required',
                'password' => 'required|string|min:3',
                'email' => 'required|string|email|unique:users'
            ]);

            DB::table('users')->where('id',$paciente['id'])
                            ->update(['name' => $datos['name'],
                                     'email'=> $datos['email'],
                                     'documento' => $datos['documento'],
                                     'telefono' => empty($request->telefono)?'':$request->telefono,
                                     'password' => Hash::make($datos['password'])]);
        }
        elseif($paciente['email'] == request('email') && request('passwordN') != ""){

            $datos = request()->validate([
                'name' => 'required',
                'documento' => 'required',
                'passwordN' => 'required|string|min:3',
                'email' => 'required|string|email'
            ]);

            DB::table('users')->where('id',$paciente['id'])
                            ->update(['name' => $datos['name'],
                                    'email'=> $datos['email'],
                                    'documento' => $datos['documento'],
                                    'telefono' => empty($request->telefono)?'':$request->telefono,
                                    'password' => Hash::make($datos['passwordN'])]);
        }else{

            $datos = request()->validate([
                'name' => 'required',
                'documento' => 'required',
                'password' => 'required|string|min:3',
                'email' => 'required|string|email'
            ]);

            DB::table('users')->where('id',$paciente['id'])
                              ->update(['name' => $datos['name'],
                                       'email'=> $datos['email'],
                                       'documento' => $datos['documento'],
                                       'telefono' => empty($request->telefono)?'':$request->telefono,
                                       'password' => Hash::make($datos['password'])]);

        }
        return redirect('Pacientes')->with('actualizadoP','Si');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id/*Pacientes $pacientes*/)
    {
       Pacientes::destroy($id);
       return redirect('Pacientes');
    }
}
