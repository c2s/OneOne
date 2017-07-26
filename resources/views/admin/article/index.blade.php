@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content row">

	
	<div class="page-content-wrapper m-t">	 	

<div class="sbox">
	<div class="sbox-title"> <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
<div class="sbox-tools" >
		@if(Session::get('gid') ==1)
			<a href="{{ URL::to('admin/module/config/'.$pageModule) }}" class="btn btn-xs btn-white tips" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa fa-cog"></i></a>
		@endif 
		</div>
	</div>
	<div class="sbox-content">
		{!! Form::open(array('url'=>'admin/article/index', 'method' => 'get', 'class'=>'form-horizontal' ,'id' =>'search-btn' )) !!}

		<div class="toolbar-line ">
			<div class="col-md-2">
				{!! Form::select('categoryId', $category, $categoryId, array('class'=>'form-control', 'required'=>'true' , )) !!}
			</div>
			<div class="col-md-2">
				{!! Form::text('title', $title, array('class'=>'form-control', 'placeholder'=>'请输入标题',   )) !!}
			</div>
			{!! Form::submit('筛选',array('class' => 'btips btn btn-sm btn-white')) !!}
			<div class="pull-right">
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('admin/article/update') }}" class="tips btn btn-sm btn-white"  title="{{ Lang::get('core.btn_create') }}">
			<i class="icon-plus-circle2 "></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
			@endif
				</div>
		</div>
		{!! Form::close() !!}

	 {!! (isset($search_map) ? $search_map : '') !!}
	
	 {!! Form::open(array('url'=>'admin/article/delete/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) !!}
	 <div class="table-responsive" style="min-height:300px;">
    <table class="table table-striped ">
        <thead>
			<tr>
				<th> <input type="checkbox" class="checkall" /></th>
				
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')				
						<?php $limited = isset($t['limited']) ? $t['limited'] :''; ?>
						@if(SiteHelpers::filterColumn($limited ))
						
							<th><span>{{ $t['label'] }}</span></th>			
						@endif 
					@endif
				@endforeach
				<th width="70" ><span>{{ Lang::get('core.btn_action') }}</span></th>
			  </tr>
        </thead>

        <tbody>        						
            @foreach ($rowData as $row)
                <tr>
					<td width="50"><input type="checkbox" class="ids" name="ids[]" value="{{ $row->id }}" />  </td>
				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
					 	@if(SiteHelpers::filterColumn($limited ))
						 <td>					 
						 	{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}						 
						 </td>
						@endif	
					 @endif					 
				 @endforeach
				 <td>
					 	@if($access['is_detail'] ==1)
						<a href="{{ URL::to('admin/article/show/'.$row->id.'?return='.$return)}}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search "></i></a>
						@endif
						@if($access['is_edit'] ==1)
						<a  href="{{ URL::to('admin/article/update/'.$row->id.'?return='.$return) }}" class="tips btn btn-xs btn-success" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit "></i></a>
						@endif
												
					
				</td>				 
                </tr>
				
            @endforeach
              
        </tbody>
      
    </table>
		 <div class="toolbar-line ">
			 @if($access['is_add'] ==1)
				 <a href="{{ URL::to('admin/article/update') }}" class="tips btn btn-sm btn-white"  title="{{ Lang::get('core.btn_create') }}">
					 <i class="icon-plus-circle2 "></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
			 @endif
			 @if($access['is_remove'] ==1)
				 <a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-sm btn-white" title="{{ Lang::get('core.btn_remove') }}">
					 <i class="icon-remove4"></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
			 @endif
		 </div>
	<input type="hidden" name="md" value="" />
	</div>
	{!! Form::close() !!}
	@include('footer')
	</div>
</div>	
	</div>	  
</div>	
<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#SximoTable').attr('action','{{ URL::to("admin/article/multisearch")}}');
		$('#SximoTable').submit();
	});
	
});	
</script>		
@stop