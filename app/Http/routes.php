<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome'); //generado por php artisan
});


Route::group(['middleware' => ['web','revalidate']], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['auth']],function(){
	
	//Menu inicial
    //Route::get('/lstcalendario', function () { return view('LstCalendario'); }); //redirecciona a ver el calendario o agenda de citas...

    //---------------------------------------------------- USUARIOS --------------------------
    route::resource('usuario','Administracion\UsuariosControlador');

    //---------------------------------------------------- SEGUROS --------------------------
    route::resource('seguro','Seguro\SeguroControlador'); //Manda al controlador la variable para buscar y llenar el combobox dependiente
    route::get('seguro/editar/{id_seguro}','Seguro\SeguroControlador@edit'); //Manda al controlador la variable para buscar y llenar el combobox dependiente
    route::get('seguro/eliminar/{id_seguro}','Seguro\SeguroControlador@delete');
    //route::post('/seguro','Seguro\SeguroControlador@ObtenerSeguros'); //Manda al controlador la variable para buscar y llenar el combobox dependiente
    
    //---------------------------------------------------- INSTITUCIONES --------------------
    route::resource('institucion','Administracion\InstitucionControlador');
    route::get('institucion/editar/{id_institucion}','Administracion\InstitucionControlador@edit'); //Manda al controlador la variable para buscar y llenar el combobox dependiente
    route::get('institucion/eliminar/{id_institucion}','Administracion\InstitucionControlador@delete'); //Manda al controlador la variable para buscar y llenar el combobox dependiente

    //---------------------------------------------------- PERSONAS -------------------------
    route::resource('persona','Persona\PersonaControladorABM');
    route::post('/BuscarPersona','Persona\PersonaControlador@BuscarPersona');
    
    route::get('/SeleccionarPersona/{id_persona}/{codigo_transaccion}',['as'=>'SeleccionarPersona','uses'=>'Persona\PersonaControlador@SeleccionarPersona']);

    //---------------------------------------------------- PACIENTES -------------------------
    route::resource('paciente','Paciente\PacienteControladorABM');
    
    //---------------------------------------------------- MEDICO ---------------------------
    route::resource('medico','Medico\MedicoControladorABM');

    //---------------------------------------------------- CITAS ---------------------------
    route::resource('cita','Cita\CitaControladorABM');
    route::post('/BuscarCita','Cita\CitaControlador@BuscarCita');
    route::get('/CancelarCita/{id}','Cita\CitaControlador@CancelarCita');
    route::get('/ConfirmaCancelacion/{id}','Cita\CitaControlador@Confirmar');

    //---------------------------------------------------- HISTORIA ------------------------
    route::resource('historia','Historia\HistoriaControladorABM');
    
    //---------------------------------------------------- ALERGIAS ------------------------
    route::resource('alergia','Alergia\AlergiaControladorABM');

    //---------------------------------------------------- DIAGNOSTICOS HISTORIA -----------
    route::resource('diagnosticosH','DiagnosticoHistoria\DiagnosticoHControlador');

    //---------------------------------------------------- TRATAMIENTOS HISTORIA -----------
    route::resource('tratamientosH','TratamientosHistoria\TratamientosHistoriaABM');

    //---------------------------------------------------- ANTECEDENTES HISTORIA -----------
    route::resource('antecedentesH','AntecedenteHistoria\AntecedenteHistoriaABM');

    //---------------------------------------------------- NO PATOLOGICOS HISTORIA -----------
    route::resource('nopatologicosH','NopatoHistoria\NopatoHistoriaABM');

    //---------------------------------------------------- SIGNOS VITALES -----------
    route::resource('medicion','Medicion\MedicionControladorABM');

    //---------------------------------------------------- CONSULTA    -----------
    route::resource('consulta','Consulta\ConsultaControladorABM');

    //---------------------------------------------------- REVISION CONSULTA    -----------
    route::resource('revisionconsulta','RevisionConsulta\RevisionConsultaControladorABM');

    //---------------------------------------------------- EVALUACION CONSULTA    -----------
    route::resource('evaluacion','Evaluacion\EvaluacionControladorABM');

    //---------------------------------------------------- DIAGNOSTICOS CONSULTA    -----------
    route::resource('diagnosticosC','DiagnosticoConsulta\DiagnosticoConsultaControladorABM');

    //---------------------------------------------------- ORDENES LABORATORIO CONSULTA Y RESPUESTA   -----------
    route::resource('ordenesL','OrdenesL\OrdenesLControladorABM');
    route::resource('ordenLRespuesta','OrdenesL\ResultadoLControladorABM');

    //---------------------------------------------------- ORDENES GABINETE CONSULTA Y RESPUESTA   -----------
    route::resource('ordenesG','OrdenesG\OrdenesGControladorABM');
    route::resource('ordenGRespuesta','OrdenesG\ResultadoGControladorABM');

    //---------------------------------------------------- TRATAMIENTOS CONSULTA    -----------
    route::resource('tratamientosC','TratamientosConsulta\TratamientosConsultaControladorABM');
});