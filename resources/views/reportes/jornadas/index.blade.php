@extends('inicio.app')
@section('contenido')
<div class="row" id="search" style="display: true">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Indique la fecha para la consulta</h3>
		@include('reportes.jornadas.search')
	</div>


		<?php 
$c1=0;$c2=0;$c3=0;$c4=0; ?>


				@foreach($data as $datos)
	<?php
		if($datos->cabina == 1) {  echo "entro"; $c1=($c1+$datos->Msis); } 
		if($datos->cabina == 2) {  echo "entro"; $c2=($c2+$datos->Msis); } 
		if($datos->cabina == 3) {  echo "entro"; $c3=($c3+$datos->Msis); } 
		if($datos->cabina == 4) {  echo "entro"; $c4=($c4+$datos->Msis); } ?>
		
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">				
						<div class="info-box">
						
								<span>Cabina: {{ $datos->cabina }}</span><br/>
								<span>Bloque: {{ $datos->bloque }}</span><br/>
								<span>Monto Sistema: {{ $datos->Msis }}</span><br/>
								<span>Monto Manual: {{ $datos->Mman }}</span><br/>
								<span>Sobrante: {{ $datos->sobra }}</span><br/>
								<span>Faltante: {{ $datos->falta }}</span><br/>

						</div><!-- /.info-box -->
					</div>				

				@endforeach

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">				
						<div class="info-box">
						
								<span>Cabina1: <?php echo $c1; ?></span><span>Cabina2: <?php echo $c2; ?></span><span>Cabina3: <?php echo $c3; ?></span><span>Cabina4: <?php echo $c4; ?></span><br/>	
								<span>total jornada: {{($c1+$c2+$c3+$c4)}}</span>
						</div><!-- /.info-box -->
					</div>
			

</div>


@endsection
