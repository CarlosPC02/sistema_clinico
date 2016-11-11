<?php

namespace App\Http\Controllers\Administracion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Administracion\BitacoraControlador;

use App\User;
use App\Models\UsuarioPersona;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Carbon\Carbon;

class UsuariosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = User::all();
        return view('Usuario.LstUsuarios',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $codigo_transaccion = "1000";
        session(['codigo_transaccion' =>$codigo_transaccion]);
        return redirect()->route('persona.show',[$codigo_transaccion]);
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
        $bitacora=new BitacoraControlador;
        $id_bitacora= $bitacora->generar_bitacora($request,'1000');

        $usuario=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'codigo_institucion' =>$request['codigo_institucion'],
        ]);
        
        $fechaA = Carbon::now()->format('Y-m-d');
        $usuariopersona= new UsuarioPersona;
        $usuariopersona->id_usuario=$usuario->id;
        $usuariopersona->id_persona= session('id_persona');
        $usuariopersona->fecha=$fechaA;
        $usuariopersona->estado="AC";
        $usuariopersona->save();
        
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_persona)
    {
        //
        return view('Usuario.FrmCrearUsuario',['id_persona'=>$id_persona]);
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
    }
}
