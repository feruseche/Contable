@extends('inicio.app')
@section('contenido')

<div class="content">
<div class="row">
<div class="col-lg-12"> 

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">
        <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Tab 1</a></li>
        <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
        <li class="active"><a href="#tab_3-2" data-toggle="tab" aria-expanded="true">Tab 3</a></li>
        <li class="pull-left header"><i class="fa fa-th"></i> Custom Tabs</li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="tab_1-1">
            <b>How to use:</b>

 
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2-2">
      
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="tab_3-2">

       </div>
    </div>
</div>

</div>
</div>
</div>

@endsection