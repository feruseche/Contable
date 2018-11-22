<?php

namespace Contable\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Contable\Producto;


class ProductosController extends Controller
{

    public function index(){

        $productos=DB::table('productos')
		->orderBy('nombre','asc')
		->get();
		
		$bodegas=DB::table('bodegas')
		->select('bodegas.*')
		->orderBy('idBodega','asc')
		->get();


		$tbodegas = DB::table('productos')
		->select(DB::raw('count(*) as p_count,idBodega'))
		->orderBy('idBodega','asc')
		->groupBy('idBodega')
		->get();

		return view('productos.index',["productos"=>$productos,"searchText"=>"","tbodegas"=>$tbodegas,"bodegas"=>$bodegas]);

    }

    public function activos(){

        $productos=DB::table('productos')
                        ->where('estado','Activo')
	        			->orderBy('nombre','asc')
						->get();
						
						$bodegas=DB::table('bodegas')
						->select('bodegas.*')
						->orderBy('idBodega','asc')
						->get();
				
				
						$tbodegas = DB::table('productos')
						->select(DB::raw('count(*) as p_count,idBodega'))
						->orderBy('idBodega','asc')
						->groupBy('idBodega')
						->get();
				
						return view('productos.index',["productos"=>$productos,"searchText"=>"","tbodegas"=>$tbodegas,"bodegas"=>$bodegas]);
    }

    public function inactivos(){

        $productos=DB::table('productos')
                        ->where('estado','Inactivo')
	        			->orderBy('nombre','asc')
	            		->get();

						$bodegas=DB::table('bodegas')
						->select('bodegas.*')
						->orderBy('idBodega','asc')
						->get();
				
				
						$tbodegas = DB::table('productos')
						->select(DB::raw('count(*) as p_count,idBodega'))
						->orderBy('idBodega','asc')
						->groupBy('idBodega')
						->get();
				
						return view('productos.index',["productos"=>$productos,"searchText"=>"","tbodegas"=>$tbodegas,"bodegas"=>$bodegas]);
    }

    public function pendientes(){

        $productos=DB::table('productos')
                        ->where('estado','Pendiente')
	        			->orderBy('nombre','asc')
	            		->get();

						$bodegas=DB::table('bodegas')
						->select('bodegas.*')
						->orderBy('idBodega','asc')
						->get();
				
				
						$tbodegas = DB::table('productos')
						->select(DB::raw('count(*) as p_count,idBodega'))
						->orderBy('idBodega','asc')
						->groupBy('idBodega')
						->get();
				
						return view('productos.index',["productos"=>$productos,"searchText"=>"","tbodegas"=>$tbodegas,"bodegas"=>$bodegas]);

    }


	public function filtro(Request $request)
    {

		if ($request)
		        {
		            $query=trim($request->get('searchText'));
		            $productos=DB::table('productos')
									->where('nombre','LIKE','%'.$query.'%')
									->orderBy('nombre','Asc')
									->get();

			        $nr=$productos->count();

					return view('productos.index',["productos"=>$productos,"searchText"=>$query,"nr"=>$nr]);
					
		        }


    }   

	public function create(){

    return view("productos.create");
    
    }

	public function insert(Request $r){

        Producto::insert(['nombre'=>$r->nombre,
                          'codigo'=>$r->codigo,
                          'existencia'=>$r->existencia,
                          'idBodega'=>$r->bodega,
                          'descripcion'=>$r->descripcion,
                          'estado'=>$r->estado
                        ]);

        $productos=DB::table('productos')
                        ->orderBy('nombre','Asc')
                        ->get();
                    
        $nr=$productos->count();

        return back();
        
    }

	public function edita(Request $id){

		$idp = $id->get('id');
        $productos=DB::table('productos')
        				->where('id',$idp)
                        ->get();

        return view("productos.edit",["productos"=>$productos]);
        
    }

	public function update(Request $data){

		$id=$data->get('idproducto');
    	$producto = producto::find($id);
    	$producto->nombre=$data->get('nombre');
    	$producto->codigo=$data->get('codigo');
    	$producto->existencia=$data->get('existencia');
    	$producto->idBodega=$data->get('bodega');
        $producto->descripcion=$data->get('descripcion');
        $producto->estado=$data->get('estado');
    	$producto->update(); 
		
		return redirect('productos');


	}
    

}
