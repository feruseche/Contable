@extends('inicio.app')
@section('contenido')

<div class="content">
<div class="row">

	<section class="content-header">
		<h1>
			<a href="terceros.listado"><button type="button" class="btn btn-info"><i class="fa fa-table"></i></button></a>
			<a href="terceros"><button type="button" class="btn btn-info"><i class="fa fa-th-large"></i></button></a>
			 {{ $nRegistros }}
			 Terceros
			<small>personas naturales y jurídicas</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="home"><i class="fa fa-dashboard"></i> Principal</a></li>
			<li><a href="terceros">Terceros</a></li>
			<li class="active">Listado de Terceros</li>
		</ol>
	</section>

	<section class="content-header">
		@if ($searchText)
			La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" coincidencia(s).
		@endif 
		@include('terceros.search')
	</section>

	@foreach($terceros as $tercero)
		<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">					
			<div class="info-box">
				<a href="editaTercero?id={{$tercero->idTercero}}">
					<span class="info-box-icon bg-blue"><i class="fa fa-folder-o"></i></span>		  
				</a>							
				<div class="info-box-content">
					<span class="info-box-text">{{ $tercero->rif }}</span>
					<a href="editaTercero?id={{$tercero->idTercero}}">
						<span class="info-box-number">{{ $tercero->tercero }}</span>
					</a>							
				</div>
			</div>
		</div>
	@endforeach

	</div>
</div>
@endsection