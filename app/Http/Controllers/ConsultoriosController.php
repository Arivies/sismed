<?php

namespace App\Http\Controllers;

use App\Models\Consultorios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ConsultoriosController extends Controller
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

        return view('modulos.Consultorios')->with('consultorios', $consultorios);
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
        Consultorios::create([
            'consultorio'=> request('consultorio')
        ]);

        return redirect('Consultorios');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultorios $consultorios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultorios $consultorios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultorios $consultorios)
    {
        DB::table('consultorios')->where('id',request('id'))->update(['consultorio' => request('consultorioE')]);
        //Consultorios::where('id',$request->id)->update(['consultorio'=>$request->consultorioE]);

        return redirect('Consultorios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id/*Consultorios $consultorios*/)
    {
        DB::table('consultorios')->whereId($id)->delete();

        return redirect('Consultorios');
    }

    public function verConsultorios(){

        $consultorios = Consultorios::all();

        return view('modulos.Ver-Consultorios')->with('consultorios',$consultorios);

    }

}
