<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
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
        $inicio = Inicio::find(1);

        return view('modulos.Inicio')->with('inicio',$inicio);
    }

    public function DatosCreate(){

        return view('modulos.Mis-Datos');
    }


    public function DatosUpdate(Request $request){
        //$datos = request();

        if(auth()->user()->email != request('email')){

            if(isset($datos['passwordN'])){

                $datos = request()->validate([
                    'name' => 'required|string|max:255',
                    'telefono' =>'string|max:255',
                    'documento' => 'string|max:255',
                    'email' => 'required|email|string|unique:users',
                    'passwordN' => 'string|min:3|required']);
            }else{
                $datos = request()->validate([
                    'name' => 'required|string|max:255',
                    'telefono' =>'string|max:255',
                    'documento' => 'string|max:255',
                    'email' => 'required|email|string|unique:users' ]);
            }
        }else{
            if(isset($datos['passwordN'])){

                $datos = request()->validate([
                    'name' => 'required|string|max:255',
                    'telefono' =>'string|max:255',
                    'documento' => 'string|max:255',
                    'email' => 'required|email|string',
                    'passwordN' => 'string|min:3|required']);
            }else{
                $datos = request()->validate([
                    'name' => 'required|string|max:255',
                    'telefono' =>'string|max:255',
                    'documento' => 'string|max:255',
                    'email' => 'required|email|string' ]);
            }
        }

        if(isset($datos['passwordN'])){

            DB::table('users')->where('id',auth()->user()->id)->update([
                    'name' =>$datos['name'],
                    'email' =>$datos['email'],
                    'telefono' => $datos['telefono'],
                    'documento' => $datos['documento'],
                    'password' => Hash::make($datos['passwordN'])
            ]);
        }
        else{

            DB::table('users')->where('id',auth()->user()->id)->update([
                'name' =>$datos['name'],
                'email' =>$datos['email'],
                'telefono' => $datos['telefono'],
                'documento' => $datos['documento']
            ]);
        }

        return redirect('Mis-Datos');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inicio $inicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(/*Inicio $inicio*/)
    {
        $inicio = Inicio::find(1);

        return view('modulos.Inicio-Editar')->with('inicio',$inicio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inicio $inicio)
    {
        $datos = request();

        $inicio = Inicio::find(1);
        $inicio->dias = $datos['dias'];
        $inicio->horaInicio = $datos['horaInicio'];
        $inicio->horaFin = $datos['horaFin'];
        $inicio->telefono = $datos['telefono'];
        $inicio->direccion = $datos['direccion'];
        $inicio->email = $datos['email'];

        if(request('logoN')){

            $imagen=request('logoN');
            $logoN = time().'_'.strtolower($imagen->getClientOriginalName());
            $imagen->move('img_inicio',$logoN);

            $ruta_imgAnt = public_path('img_inicio/'.$datos['logoActual']);
            File::delete($ruta_imgAnt);
            $inicio->logo = $logoN;

            //$rutaImg = $request['logoN']->store('inicio','public');
            //$inicio->logo = $rutaImg;
        }

        $inicio->save();
        return redirect('Inicio-Editar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inicio $inicio)
    {
        //
    }
}
