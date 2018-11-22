@extends('inicio.app')
@section('contenido')
<div class="row" id="search" style="display: true">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Indique la fecha para la consulta</h3>
		@include('reportes.jornadas.search2')
	</div>


	


				@foreach($data as $datos)
		
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">				
						<div class="info-box">
						
								<span>Cabina: {{ $datos->cabina }}</span><br/>
								<span>Bloque: {{ $datos->bloque }}</span><br/>
								<span>Monto Sistema: {{ $datos->montoSistema }}</span><br/>
								<span>Monto Manual: {{ $datos->montoManual }}</span><br/>
								<span>Sobrante: {{ $datos->sobrante }}</span><br/>
								<span>Faltante: {{ $datos->faltante }}</span><br/>
								<span>Operador: {{ $datos->operador }}</span><br/>
								<span>Supervisor: {{ $datos->supervisor }}</span><br/>
							
						</div><!-- /.info-box -->
					</div>				

				@endforeach

			

</div>


@endsection