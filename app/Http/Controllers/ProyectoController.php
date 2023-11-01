<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use PDF;
use Carbon\Carbon;


class ProyectoController extends Controller
{
        public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $proyecto = new Proyecto($request->all());
        $proyecto->save();

        return redirect()->route('proyectos.index');
    }

    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->update($request->all());

        return redirect()->route('proyectos.index');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index');
    }


    public function informe_todos(){
        $hoy = getdate();
        $estampa = "$hoy[month]_$hoy[mday]_$hoy[year]";
        $fecha_modificado = Carbon::now()->format('d-m-Y');
        $todos   = Proyecto::all();
        $informe = PDF::loadView('informe', ['lista_de_proyectos' => $todos, 'fecha' => $fecha_modificado]);
        return $informe->stream("informe_$estampa.pdf");
    }

    public function informe($identifier){
        $hoy = getdate();
        $estampa = "$hoy[month]_$hoy[mday]_$hoy[year]";
        $fecha_modificado = Carbon::now()->format('d-m-Y');
        $seleccion = [Proyecto::find($identifier)];
        $informe = PDF::loadView('informe', ['lista_de_proyectos' => $seleccion, 'fecha' => $fecha_modificado]);
        return $informe->stream("informe_individual_$estampa.pdf");

    }

}







