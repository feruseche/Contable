{!! Form::open(array('url'=>'resumenJornada','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="form-group">
	<div class="input-group">
		<input type="date" class="form-control" name="searchText"  value="{{$searchText}}">
	</div>
</div>
</div>


	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	<div class="form-group">
	<div class="input-group">
		<span class="input-group-btn">

			<button type="submit" class="btn btn-primary">consultar</button>
		</span>
		</div>
	</div>
	</div>


		

</div>

{{Form::close()}}