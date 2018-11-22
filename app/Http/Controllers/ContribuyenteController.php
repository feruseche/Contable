<?php

namespace Contable\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Contable\Contribuyente;
use Contable\User;;
use Auth;
class ContribuyenteController extends Controller
{
    public	function __construct()	{
	
		$this->middleware('auth');
	
    }
    
    public function index(){

        $userId=Auth::user()->id;
    	$userData = User::find($userId);
    	$userData->vista='2';
        $userData->update();
        
        $contribuyentes = Contribuyente::orderBy('contribuyente','ASC')
                                        ->get();
        
        $nRegistros = Contribuyente::count();

		return view('contribuyentes.index',["contribuyentes"=>$contribuyentes,"searchText"=>"","nRegistros"=>$nRegistros]);

    }

    public function indexListado(){

        $userVista=Auth::user()->id;
    	$actualizarVista = User::find($userVista);
    	$actualizarVista->vista='1';
        $actualizarVista->update();

        $contribuyentes = Contribuyente::orderBy('contribuyente','ASC')
                            ->get();

        $nRegistros = Contribuyente::count();

        return view('contribuyentes.listado',["contribuyentes"=>$contribuyentes,"searchText"=>"","nRegistros"=>$nRegistros]);
    }

    public function filtro(Request $request){

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $contribuyentes=Contribuyente::
                            where('contribuyente','LIKE','%'.$query.'%')
                            ->orderBy('contribuyente','Asc')
                            ->get();

            $nr=$contribuyentes->count();
            
            $nRegistros = Contribuyente::count();

            return view('contribuyentes.index',["contribuyentes"=>$contribuyentes,"searchText"=>$query,"nr"=>$nr,"nRegistros"=>$nRegistros]);
        }

    }

    public function filtroListado(Request $request){

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $contribuyentes=Contribuyente::where('contribuyente','LIKE','%'.$query.'%')
                            ->orderBy('contribuyente','Asc')
                            ->get();

            $nr=$contribuyentes->count();

            $nRegistros = Contribuyente::count();

            return view('contribuyentes.listado',["contribuyentes"=>$contribuyentes,"searchText"=>$query,"nr"=>$nr,"nRegistros"=>$nRegistros]);
        }

    }

    public function create(){

        return view('contribuyentes.create');

    }

    public function insert(Request $req){

        Contribuyente::insert([
            'contribuyente'=>$req->nombreContribuyente,
            'rif'=>$req->rifContribuyente,
            'nit'=>$req->nitContribuyente,
            'direccion'=>$req->direccionContribuyente,
            'email'=>$req->emailContribuyente,
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

        $contribuyentes = Contribuyente::orderBy('contribuyente','ASC')
                            ->get();
		
        //return view('contribuyentes.index',["contribuyentes"=>$contribuyentes,"searchText"=>""]);
        $userVista=Auth::user()->vista;
        if($userVista=='2'){
            return redirect('contribuyentes');
        }else{
            return redirect('contribuyentes.listado');
        };


    }

    public function edita(Request $req){

        $idC = $req->get('id');
        $contribuyentes = Contribuyente::where('idContribuyente',$idC)
                            ->get();

        return view("contribuyentes.edit",["contribuyentes"=>$contribuyentes]);

    }

    public function update(Request $data){

        $id=$data->get('idContribuyente');
    	$contribuyente = Contribuyente::find($id);
    	$contribuyente->contribuyente=$data->get('nombreContribuyente');
    	$contribuyente->rif=$data->get('rifContribuyente');
    	$contribuyente->nit=$data->get('nitContribuyente');
    	$contribuyente->direccion=$data->get('direccionContribuyente');
        $contribuyente->email=$data->get('emailContribuyente');

        $contribuyente->contacto=$data->get('contacto');
        $contribuyente->telefonoFijo=$data->get('telefonoFijo');
        $contribuyente->celular=$data->get('celular');
        $contribuyente->website=$data->get('webSite');

        $contribuyente->usuario=$data->get('usuarioPortal');
        $contribuyente->clave=$data->get('clavePortal');
        $contribuyente->ciudad=$data->get('ciudad');
        $contribuyente->estado=$data->get('estado');
        $contribuyente->actividad=$data->get('actividad');
        $contribuyente->ultimoDiaImposicion=$data->get('udi');
        $contribuyente->exedenteCreditosFiscales=$data->get('exedente');
        $contribuyente->retencionesAcumuladas=$data->get('retencionesAcumuladas');
        $contribuyente->fechaElaboracion=$data->get('fechaElaboracion');        
        $contribuyente->alicuotaGeneral=$data->get('alicuotaG');
        $contribuyente->alicuotaReducida=$data->get('alicuotaR');
        $contribuyente->observaciones=$data->get('observaciones');
        $contribuyente->estatus=$data->get('estatus');    
    	$contribuyente->update(); 
        
        $userVista=Auth::user()->vista;
        if($userVista=='2'){
            return redirect('contribuyentes');
        }else{
            return redirect('contribuyentes.listado');
        };


    }


}
