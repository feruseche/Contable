@extends('inicio.app')
@section('contenido')

<div class="content">    		
	<div class="box box-primary"> 	
		<div class="box-header with-border">
		    <h3 class="box-title">Productos</h3>
		</div>
		<div class="box-body">
			@if ($searchText)
				La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" Productos.
			@endif 
			@include('productos.search')
			<div class="col-lg-12 col-md-12 col-sm-12">				
				<div class="table-responsive">
					<table class="table table-condensed table-striped">
						<tr>
							<td>RF</td>
							<td>Nombre del Producto</td>
							<td>Código</td>
							<td>Existencia</td>
							<td>Bodega</td>
							<td>Descripción</td>
							<td>Editar</td>
							<td>Estado</td>
						</tr>
						@foreach($productos as $producto)
							<tr>
								<td>
									<?php 
										$ruta_img = "img/productos/o".$producto->id.".jpg";
										if(file_exists($ruta_img)){$ruta_foto = $ruta_img;}else{$ruta_foto = "img/productos/o0.jpg";}
									?>            
									<a href="editaProducto?id={{$producto->id}}">
										<img src="{{ $ruta_foto }}" style="height: 48px" alt="foto del producto" class="img img-circle">
									</a>
								</td>
								<td>
									<span>{{ $producto->nombre }}</span>
								</td>
								<td>
									<span><small>{{ $producto->codigo }}</small></span>
								</td>
								<td>
									<span><small>{{ $producto->existencia }}</small></span>
								</td>
								<td>
									<span><small>{{ $producto->idBodega }}</small></span>
								</td>
								<td>
									<span><small>{{ $producto->descripcion }}</small></span>
								</td>
								<td>
									<a href="editaProducto?id={{$producto->id}}">
									<span><small>
										<img src="img/editar.png" style="height: 24px" alt="foto del producto">
									</small></span>
									</a>

																
								</td>
								<td>
									<span><small>{{ $producto->estado }}</small></span>							
								</td>
							</tr>
						@endforeach
					</table>					
				</div>
			</div>

			@if($searchText)
			@else
				<div>
					Estadísticas Generales
					@foreach($bodegas as $bodega)
					<div>
						@foreach($tbodegas as $tbodega)
							@if ($tbodega->idBodega==$bodega->idBodega)
								{{ $tbodega->p_count }} productos en la Bodega {{ $bodega->nombreBodega }}
							@endif
						@endforeach
					</div>
					@endforeach
				</div>
			@endif

			<div class="box-footer">
				<div class="pull-right">
					<small>Avances Software</small>
				</div>
			</div>
	  	</div><!-- box -->
	</div>
</div><!-- content -->

@endsection
