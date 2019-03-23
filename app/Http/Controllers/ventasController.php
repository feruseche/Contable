<?php

namespace Contable\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ventasController extends Controller
{
    //

	public function buscaFacturaManual(request $request){

		$tercero   = trim(request()->get('idtercero')); 
		$numeroDoc = trim(request()->get('numeroFactura')); 

		$facturaManual=DB::table('facturasVentasManuales')
					   ->where('numeroDoc',$numeroDoc)
					   ->where('idTercero',$tercero)
	        		   ->get();

	    if($request->ajax()){
		
				return response()->json($facturaManual);
		
		}

		

	}
		
}

