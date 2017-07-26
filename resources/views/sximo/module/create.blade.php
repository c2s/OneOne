@extends('layouts.app')

@section('content')

  <div class="page-content row">
	


	 <div class="page-content-wrapper m-t">  
		

 {!! Form::open(array('url'=>'admin/module/create/', 'class'=>'form-horizontal', 'parsley-validate'=>'','novalidate'=>'')) !!}

		<div class="sbox   animated fadeInUp"> 
			<div class="sbox-title"> <h3> {{ Lang::get('core.t_module') }} <small>{{ Lang::get('core.create') }}</small></h3> </div>
			<div class="sbox-content"> 	
	
      <div class="form-group">
		<label class="col-sm-3 text-right"></label>
		<div class="col-sm-9">	
	  
			<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul> 
		
		</div>	  
      </div>	

	<div class="form-group has-feedback">
		<label class="col-sm-3 text-right"> {{ Lang::get('core.fr_modtitle') }} </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_title', null, array('class'=>'form-control', 'placeholder'=>Lang::get('module.title_name'), 'required'=>'true')) !!}
		</div>
	</div>
				{{--<div class="form-group">--}}
					{{--<label for="ipt" class="col-sm-3 text-right"> 前台模块/后台模块 </label>--}}
					{{--<div class="col-md-1">--}}
						{{--<select class="form-control " required="true" name="module_type">--}}
							{{--<option value ="1" selected="selected">后台模块</option>--}}
							{{--<option value ="2">前台模块</option>--}}
						{{--</select>--}}
					{{--</div>--}}
				{{--</div>--}}

				<div class="form-group ">
		<label class="col-sm-3 text-right"> {{ Lang::get('core.fr_modnote') }}  </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_note', null, array('class'=>'form-control', 'placeholder'=>Lang::get('module.short_description'))) !!}
		
		</div>
	</div>

	<div class="form-group ">
		<label class="col-sm-3 text-right"> 模板 :  </label>
		<div class="col-sm-9">	
			<label class="radio">	
				<input type="radio" name="module_template" value="addon" checked="checked" /> 全部 CRUD   <br />
				<small style="font-style:italic"> 在新建的页面添加、编辑、查看,原生php排序和分页. </small>
			</label>
			<label class="radio">	
				<input type="radio" name="module_template" value="generic" />  空白模块 <br />
				
				<small style="font-style:italic">  创建,模板控制器,模型和视图文件在你的自定义模块 </small>
				
			</label>

			<label class="radio">	
				<input type="radio" name="module_template" value="report" />  报表模块 <br />
				
				<small style="font-style:italic"> 用于报表视图 ( MySQL表视图模式 ) </small>
				
			</label>		
					
		</div>
	</div>		


	<div class="form-group ">
		<label class="col-sm-3 text-right"> 控制器类名 </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_name', null, array('class'=>'form-control', 'placeholder'=>'控制器类名 / 模块名称' ,  'required'=>'true')) !!}
		
		</div>
	</div>	
		
	
	<div class="form-group">
		<label class="col-sm-3 text-right"> {{ Lang::get('core.fr_modtable') }}  </label>
		<div class="col-sm-9">	
		{!! Form::select('module_db', $tables , '' , 
			array('class'=>'form-control ', 'required'=>'true' )); 
		!!}
	 	
		</div>
	</div>	
		
	<div class="form-group " style="display:none;">
		<label class="col-sm-3 text-right">Author </label>
		<div class="col-sm-9">	
	  {!! Form::text('module_author',  null, array('class'=>'form-control', 'placeholder'=>'Author')) !!}
		
		</div>
	</div>	
		


	<div class="form-group switchSql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">	
			<label class="radio radio-inline">
				<input type="radio" name="creation" value="auto"  checked="checked"  /> 
				{{ Lang::get('core.fr_modautosql') }} 
			</label>		
			<label class="radio radio-inline">
				<input type="radio" name="creation" value="manual"  />
				{{ Lang::get('core.fr_modmanualsql') }}
			</label>		
		</div>
	</div>	
	
	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
			{!! Form::textarea('sql_select', null, array('class'=>'form-control', 'placeholder'=>'SQL Select & Join Statement' ,'rows'=>'3' ,'id'=>'sql_select')) !!}
		  
		</div> 
	</div>	
	
	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
		{!! Form::textarea('sql_where', null, array('class'=>'form-control', 'placeholder'=>'SQL Where Statement' ,'rows'=>'2','id'=>'sql_where')) !!}
		</div> 
	</div>		

	<div class="form-group manualsql">
		<label class="col-sm-3 text-right">  </label>
		<div class="col-sm-9">
			{!! Form::textarea('sql_group', null, array('class'=>'form-control', 'placeholder'=>'SQL Grouping Statement' ,'rows'=>'2')) !!}
		</div> 
	</div>	
	
		
      <div class="form-group">
		<label class="col-sm-3 text-right">&nbsp;</label>
		<div class="col-sm-9">	
	  	<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_submit') }}</button>
	  	<a href="{{ url('admin/module')}}" class="btn btn-warning"> Cancel </a>
		</div>	  

      </div>
    </div>
  </div>    
    
 {!! Form::close() !!}
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('.manualsql').hide();
		$('.switchSql input:radio').on('ifClicked', function() {
		  val = $(this).val(); 
			if(val == 'manual')
			{
				$('.manualsql').show();
				$('#sql_select').attr("required","true");
				$('#sql_where').attr("required","true");
				
			} else {
				$('.manualsql').hide();
				$('#sql_select').removeAttr("required");
				$('#sql_where').removeAttr("required");
	
			}		  
		  
		});

	});
	
</script>
@stop
