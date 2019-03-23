{!! Form::open(array('url'=>'empresas.filtro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="escriba un nombre de empresa..." value="<?php if($searchText){echo $searchText;} ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
			<a href="{{ url('empresa.nuevo') }}" class="btn btn-info">Nueva</a>
		</span>
	</div>
</div>
{{Form::close()}}