@extends('layouts.app')


@section('content')

  <div class="page-content row">



	<div class="page-content-wrapper m-t">  	
	@include('admin.config.tab',array('active'=>'translation'))
	 <div class="tab-pane active use-padding" id="info">	
<div class="tab-content m-t ">
		<div class="sbox   animated fadeInUp"> 
			<div class="sbox-title"> {{ Lang::get('core.translation_manage') }} </div>
			<div class="sbox-content"> 		 

	@if(Session::has('message'))
	  
		   {{ Session::get('message') }}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>	  
	  
	 {!! Form::open(array('url'=>'admin/config/translation/', 'class'=>'form-vertical row')) !!}
	
	<div class="col-sm-9">
		
		<a href="{{ URL::to('admin/config/addtranslation')}} " onclick="SximoModal(this.href,'新增语言');return false;" class="btn btn-primary"><i class="fa fa-plus-circle"></i> 新增语言 </a>
		<hr />
		<table class="table table-striped">
			<thead>
				<tr>
					<th> 名称 </th>
					<th> 别名 </th>
					<th> 作者 </th>
					<th> 操作 </th>
				</tr>
			</thead>
			<tbody>		
		
			@foreach(SiteHelpers::langOption() as $lang)
				<tr>
					<td>  {{  $lang['name'] }}   </td>
					<td> {{  $lang['folder'] }} </td>
					<td> {{  $lang['author'] }} </td>
				  	<td>
						<a href="{{ URL::to('admin/config/translation?edit='.$lang['folder'])}} " class="btn btn-sm btn-primary"> 编辑 </a>
					@if($lang['folder'] !='en' && $lang['folder'] !='cn' )
					<a href="{{ URL::to('admin/config/removetranslation/'.$lang['folder'])}} " class="btn btn-sm btn-danger"> 删除 </a>
						@else
							<span>&nbsp;&nbsp;&nbsp;&nbsp;网站主体语言不能被删除</span>
					@endif 
				
				</td>
				</tr>
			@endforeach
			
			</tbody>
		</table>
	</div> 
	</div>
	</div>



 	
 </div>
 {!! Form::close() !!}
</div>
</div>
</div>
</div>






@endsection