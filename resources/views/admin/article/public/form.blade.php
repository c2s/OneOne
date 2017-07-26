

		 {!! Form::open(array('url'=>'admin/article/postSave', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> 文章管理</legend>
									
									  <div class="form-group  " >
										<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
										<div class="col-md-6">
										  {!! Form::text('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Author Id" class=" control-label col-md-4 text-left"> Author Id </label>
										<div class="col-md-6">
										  {!! Form::text('author_id', $row['author_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Post Content" class=" control-label col-md-4 text-left"> Post Content </label>
										<div class="col-md-6">
										  {!! Form::text('post_content', $row['post_content'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Post Title" class=" control-label col-md-4 text-left"> Post Title </label>
										<div class="col-md-6">
										  <textarea name='post_title' rows='5' id='post_title' class='form-control '  
				           >{{ $row['post_title'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Post Status" class=" control-label col-md-4 text-left"> Post Status </label>
										<div class="col-md-6">
										  {!! Form::text('post_status', $row['post_status'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Is Top" class=" control-label col-md-4 text-left"> Is Top </label>
										<div class="col-md-6">
										  {!! Form::text('is_top', $row['is_top'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Post Alias" class=" control-label col-md-4 text-left"> Post Alias </label>
										<div class="col-md-6">
										  {!! Form::text('post_alias', $row['post_alias'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Comment Status" class=" control-label col-md-4 text-left"> Comment Status </label>
										<div class="col-md-6">
										  {!! Form::text('comment_status', $row['comment_status'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Post Password" class=" control-label col-md-4 text-left"> Post Password </label>
										<div class="col-md-6">
										  {!! Form::text('post_password', $row['post_password'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Comment Count" class=" control-label col-md-4 text-left"> Comment Count </label>
										<div class="col-md-6">
										  {!! Form::text('comment_count', $row['comment_count'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Post Tag" class=" control-label col-md-4 text-left"> Post Tag </label>
										<div class="col-md-6">
										  {!! Form::text('post_tag', $row['post_tag'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Category Id" class=" control-label col-md-4 text-left"> Category Id </label>
										<div class="col-md-6">
										  {!! Form::text('category_id', $row['category_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Is Lock" class=" control-label col-md-4 text-left"> Is Lock </label>
										<div class="col-md-6">
										  {!! Form::text('is_lock', $row['is_lock'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
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
									  </div> 					
									  <div class="form-group  " >
										<label for="View Nums" class=" control-label col-md-4 text-left"> View Nums </label>
										<div class="col-md-6">
										  {!! Form::text('view_nums', $row['view_nums'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Comm Nums" class=" control-label col-md-4 text-left"> Comm Nums </label>
										<div class="col-md-6">
										  {!! Form::text('comm_nums', $row['comm_nums'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> </fieldset>
			</div>
			
			

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
