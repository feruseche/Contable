@extends('inicio.app')
@section('contenido')

<div class="content">    		
	<div class="box box-primary"> 	
		<div class="box-header with-border">
		    <h3 class="box-title">Productos</h3>
		</div>

		<div class="box-body">
			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
           <div class="row-fluid">
      <select class="selectpicker" data-show-subtext="true" data-live-search="true">
        <option data-subtext="Rep California">Tom Foolery</option>
        <option data-subtext="Sen California">Bill Gordon</option>
        <option data-subtext="Sen Massacusetts">Elizabeth Warren</option>
        <option data-subtext="Rep Alabama">Mario Flores</option>
        <option data-subtext="Rep Alaska">Don Young</option>
        <option data-subtext="Rep California" disabled="disabled">Marvin Martinez</option>
      </select>
      <span class="help-inline">With <code>data-show-subtext="true" data-live-search="true"</code>. Try searching for california</span>
    </div>
                 

                      
                    </div>
                </div>
                
            

                
			<div class="box-footer">
				<div class="pull-right">
					<small>Avances Software</small>
				</div>
			</div>
	  	</div><!-- box -->
	</div>
</div><!-- content -->


@endsection
@push ('scripts')
<script>

$(document).ready(function(){

$('#prif').keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        //Buscar();
          alert ('Factur.');
        e.preventDefault();
        return false;
    }
});

 $('#prif').change(function(){
  alert ('Factura Procesada a Credito.');
   
    })

});
</script>
@endpush

