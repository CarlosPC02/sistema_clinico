<?php

namespace App\Http\Controllers\Cita;

use Illuminate\Http\Request;

use App\Models\Cita;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CitaRepository;

use Carbon\Carbon;

class CitaControlador extends Controller
{
	protected $citas;

    public function __construct(CitaRepository $citas)
    {
        $this->citas = $citas;
    }
    //

    protected function BuscarCita(Request $request)
    {
        $citas = $this->citas->RepCitaBuscar($request->user()->codigo_institucion,$request->fechaE,$request->horaE,$request->medico);

        return view('Cita.LstCitas',['citas'=>$citas,'fecha'=>$request->fechaE]);
    }

    protected function CancelarCita($id)
    {
        $cita = $this->citas->RepCitaEditar($id);

        return view('Cita.FrmCancelarCita',['cita'=>$cita,'idc'=>$id]);
    }

    protected function Confirmar($id)
    {
        $cita = Cita::FindOrFail($id);
        $cita->estado = "TCEC";
        $cita->save();

        return redirect()->route('cita.index');
    }
}
