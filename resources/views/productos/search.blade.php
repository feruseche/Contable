{!! Form::open(array('url'=>'productos.filtro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="escriba nombre del producto..." value="<?php if($searchText){echo $searchText;} ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
			<a href="{{ url('productos.nuevo') }}" class="btn btn-success">Nuevo Producto</a>

			<a href="{{ url('productos') }}" class="btn btn-info">Todos</a>
			<a href="{{ url('activos') }}" class="btn btn-info">Activos</a>
			<a href="{{ url('inactivos') }}" class="btn btn-info">Inactivos</a>
			<a href="{{ url('pendientes') }}" class="btn btn-info">Pendientes</a>
		</span>	
	</div>
</div>
{{Form::close()}}