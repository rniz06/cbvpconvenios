<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\Convenio\StoreConvenioRequest;
use App\Models\Convenio;
use App\Models\Convenio\Archivo;
use App\Models\Convenio\Estado;
use App\Models\Vistas\VtInstitucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('convenios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instituciones = VtInstitucion::select('id_institucion', 'nombre')->get();
        $estados = Estado::select('idconvenio_estado', 'estado')->get();
        return view('convenios.create', compact('instituciones', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConvenioRequest $request)
    {
        $convenio = Convenio::create([
            'cod' => (string) Str::uuid7(time: now()),
            'titulo' => $request->titulo,
            'institucion_id' => $request->institucion_id,
            'estado_id' => $request->estado_id,
            'fecha_suscrito' => $request->fecha_suscrito,
            'fecha_fin' => $request->fecha_fin,
            'presidente_id' => $request->presidente_id,
            'secretario_id' => $request->secretario_id,
            'otros_id' => null,
            'creador_id' => Auth::id(),
        ]);

        $file = $request->file('archivo');
        $titulo = Str::slug($convenio->titulo, '-');
        $ruta = 'convenios/'. date('Y'). '/' . $titulo;

        $rutaArchivo = $file->storeAs($ruta, $file->getClientOriginalName(), 'public');

        $archivo = Archivo::create([
            'convenio_id' => $convenio->id_convenio,
            'archivo_nombre' => $file->getClientOriginalName(),
            'archivo_nombre_generado' => $rutaArchivo,
            'archivo_tamano' => $file->getSize(),
            'archivo_tipo' => $file->getClientMimeType(),
            'archivo_ruta' => $rutaArchivo,
            'principal' => 1, // True
            'creador_id' => $convenio->creador_id
        ]);

        //return dd($request);
        return redirect()->route('convenios.index')->with('success', 'Registro guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Convenio $convenio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Convenio $convenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Convenio $convenio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Convenio $convenio)
    {
        //
    }
}
