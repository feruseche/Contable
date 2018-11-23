<?php
 
namespace Contable\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Contable\Tercero;
use Contable\User;
use Auth;

class terceroController extends Controller
{
public	function __construct()	{
	
		$this->middleware('auth');
	
    }
    
    public function index(){

        $userId=Auth::user()->id;
    	$userData = User::find($userId);
    	$userData->vista='2';
        $userData->update();
        
        $terceros = Tercero::orderBy('tercero','ASC')
                                        ->get();
        
        $nRegistros = Tercero::count();

		return view('terceros.index',["terceros"=>$terceros,"searchText"=>"","nRegistros"=>$nRegistros]);

    }

    public function indexListado(){

        $userVista=Auth::user()->id;
    	$actualizarVista = User::find($userVista);
    	$actualizarVista->vista='1';
        $actualizarVista->update();

        $terceros = Tercero::orderBy('tercero','ASC')
                            ->get();

        $nRegistros = Tercero::count();

        return view('terceros.listado',["terceros"=>$terceros,"searchText"=>"","nRegistros"=>$nRegistros]);
    }

    public function filtro(Request $request){

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $terceros=Tercero::
                            where('tercero','LIKE','%'.$query.'%')
                            ->orderBy('tercero','Asc')
                            ->get();

            $nr=$terceros->count();
            
            $nRegistros = Tercero::count();

            return view('terceros.index',["terceros"=>$terceros,"searchText"=>$query,"nr"=>$nr,"nRegistros"=>$nRegistros]);
        }

    }

    public function filtroListado(Request $request){

        if ($request)
        {
            $query=trim($request->get('searchText'));
            $terceros=Tercero::where('tercero','LIKE','%'.$query.'%')
                            ->orderBy('tercero','Asc')
                            ->get();

            $nr=$terceros->count();

            $nRegistros = Tercero::count();

            return view('terceros.listado',["terceros"=>$terceros,"searchText"=>$query,"nr"=>$nr,"nRegistros"=>$nRegistros]);
        }

    }

    public function create(){

        return view('terceros.create');

    }

    public function insert(Request $req){

        Tercero::insert([
            'tercero'=>$req->nombreTercero,
            'rif'=>$req->rifTercero
        ]);

        $terceros = Tercero::orderBy('tercero','ASC')
                            ->get();
		
        //return view('contribuyentes.index',["contribuyentes"=>$contribuyentes,"searchText"=>""]);
        $userVista=Auth::user()->vista;
        
        if($userVista=='2'){
            return redirect('terceros');
        }else{
            return redirect('terceros.listado');
        };


    }

    public function edita(Request $req){

        $idC = $req->get('id');
        $terceros = Tercero::where('idTercero',$idC)
                            ->get();

        return view("terceros.edit",["terceros"=>$terceros]);

    }

    public function update(Request $data){

        $id=$data->get('idTercero');
    	$tercero = Tercero::find($id);
    	$tercero->tercero=$data->get('nombreTercero');
    	$tercero->rif=$data->get('rifTercero');
    	$tercero->update(); 
        
        $userVista=Auth::user()->vista;
        if($userVista=='2'){
            return redirect('terceros');
        }else{
            return redirect('terceros.listado');
        };


    }
}
