@extends('layouts.app')

@section('content')

  <div class="page-content row">
    <!-- Page header -->

 
 	<div class="page-content-wrapper m-t">


<div class="sbox">
	<div class="sbox-title"> <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
		<div class="sbox-tools" >
			<a href="{{ url($pageModule.'?return='.$return) }}" class="btn btn-xs btn-white tips"  title="{{ Lang::get('core.btn_back') }}" ><i class="icon-backward"></i> {{ Lang::get('core.btn_back') }} </a> 
		</div>
	</div>
	<div class="sbox-content"> 	

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	

		 {!! Form::open(array('url'=>'category/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> 文章分类</legend>
									
									  <div class="form-group  " >
										<label for="Cate Id" class=" control-label col-md-4 text-left"> Cate Id </label>
										<div class="col-md-6">
										  {!! Form::text('cate_id', $row['cate_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Name" class=" control-label col-md-4 text-left"> Cate Name </label>
										<div class="col-md-6">
										  {!! Form::text('cate_name', $row['cate_name'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Order" class=" control-label col-md-4 text-left"> Cate Order </label>
										<div class="col-md-6">
										  {!! Form::text('cate_order', $row['cate_order'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Count" class=" control-label col-md-4 text-left"> Cate Count </label>
										<div class="col-md-6">
										  {!! Form::text('cate_count', $row['cate_count'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Alias" class=" control-label col-md-4 text-left"> Cate Alias </label>
										<div class="col-md-6">
										  {!! Form::text('cate_alias', $row['cate_alias'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Intro" class=" control-label col-md-4 text-left"> Cate Intro </label>
										<div class="col-md-6">
										  <textarea name='cate_intro' rows='5' id='cate_intro' class='form-control '  
				           >{{ $row['cate_intro'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Root Id" class=" control-label col-md-4 text-left"> Cate Root Id </label>
										<div class="col-md-6">
										  {!! Form::text('cate_root_id', $row['cate_root_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Parent Id" class=" control-label col-md-4 text-left"> Cate Parent Id </label>
										<div class="col-md-6">
										  {!! Form::text('cate_parent_id', $row['cate_parent_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Template" class=" control-label col-md-4 text-left"> Cate Template </label>
										<div class="col-md-6">
										  {!! Form::text('cate_template', $row['cate_template'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Log Template" class=" control-label col-md-4 text-left"> Cate Log Template </label>
										<div class="col-md-6">
										  {!! Form::text('cate_log_template', $row['cate_log_template'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cate Meta" class=" control-label col-md-4 text-left"> Cate Meta </label>
										<div class="col-md-6">
										  {!! Form::text('cate_meta', $row['cate_meta'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Created Time" class=" control-label col-md-4 text-left"> Created Time </label>
										<div class="col-md-6">
										  {!! Form::text('created_time', $row['created_time'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> </fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="icon-checkmark-circle2"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="icon-bubble-check"></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('category?return='.$return) }}' " class="btn btn-warning btn-sm "><i class="icon-cancel-circle2 "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("category/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop