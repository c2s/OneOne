@extends('layouts.app')

@section('content')

  <div class="page-content row">


	<div class="page-content-wrapper">  
	@if(Session::has('message'))
	  
		   {{ Session::get('message') }}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		
<div class="block-content">
	@include('sximo.config.tab')		
<div class="tab-content">
	  <div class="tab-pane active use-padding" id="info">	
	 {!! Form::open(array('url'=>'config/email/', 'class'=>'form-vertical row')) !!}
	
	<div class="col-sm-6 m-t">
	

		
		  <div class="form-group">
			<label for="ipt" class=" control-label"> Template Cache </label>		
				
		  </div>  
		  
		<div class="form-group">   
			<a href="{{ URL::to('admin/config/clearlog') }}" class="btn btn-primary" ><i class="icon-remove3"></i> Clear cache and logs </a>
		</div>
	
  	</fieldset>


	</div> 


 	
 </div>
 {!! Form::close() !!}
</div>
</div>
</div>
</div>







@endsection