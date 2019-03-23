<?php

namespace Contable\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Contable\Empresa; 
use Contable\Tercero; 
use Contable\User;
use Auth;

class empresaController extends Controller
{
    public	function __construct()	{
	
		$this->middleware('auth');
	
    }
    
    public function index(){

        $userId=Auth::user()->id;
    	$userData = User::find($userId);
    	$userData->vista='2';
        $userData->update();
        
        $empresas = Empresa::orderBy('empresa','ASC')
                                        ->get();
        
        $nRegistros = Empresa::count();

		return view('empresas.index',["empresas"=>$empresas,"searchText"=>"","nRegistros"=>$nRegistros]);

    }

    public function indexListado(){

        $userVista=Auth::user()->id;
    	$actualizarVista = User::find($userVista);
    	$actualizarVista->vista='1';
        $actualizarVista->update();

        $empresas = Empresa::orderBy('empresa','ASC')
                            ->get();

        $nRegistros = Empresa::count();

        return view('empresas.listado',["empresas"=>$empresas,"searchText"=>"","nRegistros"=>$nRegistros]);
    }

    public function filtro(Request $request){

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $empresas=Empresa::
                            where('empresa','LIKE','%'.$query.'%')
                            ->orderBy('empresa','Asc')
                            ->get();

            $nr=$empresas->count();
            
            $nRegistros = Empresa::count();

            return view('empresas.index',["empresas"=>$empresas,"searchText"=>$query,"nr"=>$nr,"nRegistros"=>$nRegistros]);
        }

    }

    public function filtroListado(Request $request){

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $empresas=Empresa::where('empresa','LIKE','%'.$query.'%')
                            ->orderBy('empresa','Asc')
                            ->get();

            $nr=$empresas->count();

            $nRegistros = Empresa::count();

            return view('empresas.listado',["empresas"=>$empresas,"searchText"=>$query,"nr"=>$nr,"nRegistros"=>$nRegistros]);
        }

    }

    public function create(){

        return view('empresas.create');

    }

    public function insert(Request $req){

        Empresa::insert([
            'empresa'=>$req->nombreEmpresa,
            'rif'=>$req->rifEmpresa,
            'nit'=>$req->nitEmpresa,
            'direccion'=>$req->direccionEmpresa,
            'email'=>$req->emailEmpresa,
        /*  'usuario'=>$req->usuarioPortal,
            'clave'=>$req->clavePortal,
            'ciudad'=>$req->ciudad,
            'estado'=>$req->estado,
            'actividad'=>$req->actividad,
            'ultimoDiaImposicion'=>$req->udi,
            'exedenteCreditosFiscales'=>$req->exedente,
            'retencionesAcumuladas'=>$req->retencionesAcumuladas,
            'fechaElaboracion'=>$req->fechaElaboracion,
            'alicuotaGeneral'=>$req->alicuotaG,
            'alicuotaReducida'=>$req->alicuotaR,
            'observaciones'=>$req->observaciones,
        */
            'estatus'=>$req->estatus
        ]);

        $empresas = Empresa::orderBy('empresa','ASC')
                            ->get();
		
        //return view('contribuyentes.index',["contribuyentes"=>$contribuyentes,"searchText"=>""]);
        $userVista=Auth::user()->vista;
        if($userVista=='2'){
            return redirect('empresas');
        }else{
            return redirect('empresas.listado');
        };


    }

    public function edita(Request $req){

        $idC = $req->get('id');
        $empresas = Empresa::where('idEmpresa',$idC)
                            ->first();
        
        $terceros = Tercero::orderBy('tercero','ASC')->get();
        //dd($empresas);

        return view("empresas.edit",["empresa"=>$empresas,"terceros"=>$terceros]);

    }

    public function update(Request $data){

        $id=$data->get('idEmpresa');
    	$empresa = Empresa::find($id);
    	$empresa->empresa=$data->get('nombreEmpresa');
    	$empresa->rif=$data->get('rifEmpresa');
    	$empresa->nit=$data->get('nitEmpresa');
    	$empresa->direccion=$data->get('direccionEmpresa');
        $empresa->email=$data->get('emailEmpresa');

        $empresa->contacto=$data->get('contacto');
        $empresa->telefonoFijo=$data->get('telefonoFijo');
        $empresa->celular=$data->get('celular');
        $empresa->website=$data->get('webSite');

        $empresa->usuario=$data->get('usuarioPortal');
        $empresa->clave=$data->get('clavePortal');
        $empresa->ciudad=$data->get('ciudad');
        $empresa->estado=$data->get('estado');
        $empresa->actividad=$data->get('actividad');
        $empresa->ultimoDiaImposicion=$data->get('udi');
        $empresa->exedenteCreditosFiscales=$data->get('exedente');
        $empresa->retencionesAcumuladas=$data->get('retencionesAcumuladas');
        $empresa->fechaElaboracion=$data->get('fechaElaboracion');        
        $empresa->alicuotaGeneral=$data->get('alicuotaG');
        $empresa->alicuotaReducida=$data->get('alicuotaR');
        $empresa->observaciones=$data->get('observaciones');
        $empresa->estatus=$data->get('estatus');    
    	$empresa->update(); 
        
        $userVista=Auth::user()->vista;
        if($userVista=='2'){
            return redirect('empresas');
        }else{
            return redirect('empresas.listado');
        };


    }

}
