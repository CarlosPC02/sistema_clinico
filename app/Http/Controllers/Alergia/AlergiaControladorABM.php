<?php

namespace App\Http\Controllers\Alergia;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\BitacoraControlador;

use App\Models\Alergia;

class AlergiaControladorABM extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        $id=$request->id_historia;
        $alergias=Alergia::where('id_historia','=',$id)
            ->where('estado','=','AC')
            ->get();

        return view('Alergia.LstAlergias',['alergias'=>$alergias]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->ajax())
        {
            $bitacora = new BitacoraControlador;
            $id_bitacora= $bitacora->generar_bitacora($request,'210');
            $request->merge(['id_bitacora' => $id_bitacora]);

            $resultado=Alergia::create($request->all());

            if($resultado)
            {
                return response()->json(['success'=>'true']);
            }
            else
            {
                return response()->json(['success'=>'false']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_historia)
    {
        //
        
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $registro = Alergia::FindOrFail($id);
        $registro->estado = 'DC';
        $registro->save();

        if($registro)
        {
            return response()->json(['success'=>'true']);
        }
        else
        {
            return response()->json(['success'=>'false']);
        }
    }
}
