<?php

namespace App\Http\Controllers;

use App\Models\Graine;
use Illuminate\Http\Request;

class GraineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graine = Graine::all();
        return view('graine.index', ['graines' => $graine]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('graine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate(
            $request,
                [
                    'nom' => 'required',
                    'famille' => 'required',
                    'periode_plantation' => 'required',
                    'periode_recolte' => 'required',
                    'conseil' => 'required',
                    'visuel' => 'required',
                    'quantite' => 'required',
                ]
        );
        $graine = new Graine();

        $graine->nom = $request->nom;
        $graine->famille = $request->famille;
        $graine->periode_plantation = $request->periode_plantation;
        $graine->periode_recolte = $request->periode_recolte;
        $graine->conseil = $request->conseil;
        $graine->visuel = $request->visuel;
        $graine->quantite = $request->quantite;


        // insertion de l'enregistrement dans la base de données
        $graine->save();
        return redirect()->route("graine.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $action = $request->query('action', 'show');
        $graine = Graine::find($id);
        return view('graine.show', ['graine' => $graine,'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $graine = Graine::find($id);

        $this->validate(
            $request=
                [
                    'nom' => 'required',
                    'famillet' => 'required',
                    'periode_plantation' => 'required',
                    'periode_recolte' => 'required',
                    'conseil' => 'required',
                    'visuel' => 'required',
                    'quantite' => 'required',
                ]
        );
        $graine->nom = $request->nom;
        $graine->famille = $request->famille;
        $graine->periode_plantation= $request->periode_plantation;
        $graine->periode_recolte = $request->periode_recolte;
        $graine->conseil = $request->conseil;
        $graine->visuel = $request->visuel;
        $graine->quantite = $request->quantite;
        $graine->save();
        return redirect()->route("graine.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if ($request->delete == 'valide') {
            $graine = Graine::find($id);
            $graine->delete();
        }
        return redirect()->route("graine.index");
    }
    public function exportCsv(Request $request)
    {
        $fileName = 'graine.csv';
        $graine = Graine::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('nom', 'famile','periode_plantation', 'periode_recolte', 'conseil', 'visuel','quantite');

        $callback = function() use($graine, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($graine as $task) {
                $row['nom']  = $task->nom;
                $row['famile']    = $task->famille;
                $row['periode_plantation']    = $task->periode_plantation;
                $row['periode_recolte']  = $task->periode_recolte;
                $row['conseil']  = $task->conseil;
                $row['visuel']  = $task->visuel;
                $row['quantite']  = $task->quantite;


                fputcsv($file, array($row['nom'], $row['famile'], $row['periode_plantation'], $row['periode_recolte'], $row['conseil'], $row['visuel'],$row['quantite']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
