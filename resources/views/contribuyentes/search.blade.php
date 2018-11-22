{!! Form::open(array('url'=>'contribuyentes.filtro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="escriba un nombre de contribuyente..." value="<?php if($searchText){echo $searchText;} ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
			<a href="{{ url('contribuyente.nuevo') }}" class="btn btn-info">Nuevo</a>
		</span>
	</div>
</div>
{{Form::close()}}