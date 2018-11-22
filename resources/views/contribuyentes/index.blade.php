@extends('inicio.app')
@section('contenido')

<div class="content">
<div class="row">

	<section class="content-header">
		<h1>
			<a href="contribuyentes.listado"><button type="button" class="btn btn-info"><i class="fa fa-table"></i></button></a>
			<a href="contribuyentes"><button type="button" class="btn btn-info"><i class="fa fa-th-large"></i></button></a>
			 {{ $nRegistros }}
			 Contribuyentes
			<small>personas naturales y jurídicas</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="home"><i class="fa fa-dashboard"></i> Principal</a></li>
			<li><a href="contribuyentes">Contribuyentes</a></li>
			<li class="active">Listado General</li>
		</ol>
	</section>

	<section class="content-header">
		@if ($searchText)
			La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" coincidencia(s).
		@endif 
		@include('contribuyentes.search')
	</section>

	@foreach($contribuyentes as $contribuyente)
		<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">					
			<div class="info-box">
				<a href="editaContribuyente?id={{$contribuyente->idContribuyente}}">
					<span class="info-box-icon <?php if($contribuyente->estatus=='1'){ echo 'bg-aqua'; }else{ echo 'bg-orange disabled'; } ?>"><i class="fa fa-folder-o"></i></span>		  
				</a>							
				<div class="info-box-content">
					<span class="info-box-text">{{ $contribuyente->rif }}</span>
					<a href="editaContribuyente?id={{$contribuyente->idContribuyente}}">
						<span class="info-box-number">{{ $contribuyente->contribuyente }}</span>
					</a>							
				</div>
			</div>
		</div>
	@endforeach

	</div>
</div>
@endsection