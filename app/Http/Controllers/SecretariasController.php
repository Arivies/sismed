<?php

namespace App\Http\Controllers;

use App\Models\Secretarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SecretariasController extends Controller
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
        if(auth()->user()->rol != "administrador"){

            return redirect('Inicio');
        }

        $secretarias = Secretarias::all()->where('rol','secretaria');

        return view('modulos.Secretarias')->with('secretarias',$secretarias);
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
        $datos = request()->validate([
                        'name'  =>  'required|string|max:255',
                        'email' =>  'required|string|max:255|email|unique:users',
                        'password' => 'required|string|min:3'
                    ]);
        $secretarias = Secretarias::create([
                        'name' => $datos['name'],
                        'email' => $datos['email'],
                        'id_consultorio' => 0,
                        'sexo' => '',
                        'telefono' => '',
                        'documento' => '',
                        'rol'   =>'secretaria',
                        'password' => Hash::make($datos['password'])
        ]);

        return redirect('Secretarias')->with('SecretariaCreada','Si');
    }

    /**
     * Display the specified resource.
     */
    public function show($id /*Secretarias $secretarias*/)
    {

        if(auth()->user()->rol != "administrador"){

            return redirect('Inicio');
        }

        $secretarias = Secretarias::all()->where('rol','secretaria');
        $secretaria = Secretarias::find($id);

        return view('modulos.Secretarias',compact('secretarias','secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secretarias $secretarias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Secretarias $id)
    {
        if($id['email'] != request('email') && request('passwordN') != ""){

            $datos = request()->validate([
                'name'  =>  'required|string|max:255',
                'email' =>  'required|string|max:255|email|unique:users',
                'passwordN' => 'required|string|min:3'
            ]);

            DB::table('users')->where('id',$id['id'])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['passwordN'])
            ]);
        }
        elseif($id['email'] != request('email') && request('passwordN') == ""){

            $datos = request()->validate([
                'name'  =>  'required|string|max:255',
                'email' =>  'required|string|max:255|email|unique:users',
                'password' => 'required|string|min:3'
            ]);

            DB::table('users')->where('id',$id['id'])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password'])
            ]);

        }elseif($id['email'] == request('email') && request('passwordN') != ""){

            $datos = request()->validate([
                'name'  =>  'required|string|max:255',
                'email' =>  'required|string|max:255|email',
                'passwordN' => 'required|string|min:3'
            ]);

            DB::table('users')->where('id',$id['id'])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['passwordN'])
            ]);
        }
        else{

            $datos = request()->validate([
                'name'  =>  'required|string|max:255',
                'email' =>  'required|string|max:255|email',
                'password' => 'required|string|min:3'
            ]);

            DB::table('users')->where('id',$id['id'])->update([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => $datos['password']
            ]);
        }

        return redirect('Secretarias');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id/*Secretarias $secretarias*/)
    {
        Secretarias::destroy($id);

        return redirect('Secretarias');
    }
}
