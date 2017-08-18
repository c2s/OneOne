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
	@include('admin.config.tab')
<div class="tab-content">
	  <div class="tab-pane active use-padding" id="info">
	 {!! Form::open(array('url'=>'config/email/', 'class'=>'form-vertical row')) !!}

	<div class="col-sm-6 m-t">



		  <div class="form-group">
			<label for="ipt" class=" control-label"> {{ Lang::get('core.clear_cache_and_log') }} </label>

		  </div>

		<div class="form-group">
			<a href="{{ URL::to('admin/config/clearlog') }}" class="btn btn-primary" ><i class="icon-remove3"></i> {{ Lang::get('core.clear_cache') }} </a>
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