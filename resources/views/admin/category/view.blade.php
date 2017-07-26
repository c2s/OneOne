@extends('layouts.app')

@section('content')
<div class="page-content row">
    <!-- Page header -->

	 
	 
 	<div class="page-content-wrapper m-t">   

<div class="sbox ">
	<div class="sbox-title"><h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3> 
	<div class="sbox-tools" >
   		<a href="{{ URL::to('category?return='.$return) }}" class="tips btn btn-xs btn-white pull-right" title="{{ Lang::get('core.btn_back') }}"><i class="icon-backward"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
		@if($access['is_add'] ==1)
   		<a href="{{ URL::to('category/update/'.$id.'?return='.$return) }}" class="tips btn btn-xs btn-white pull-right" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
		@endif 
	</div>	
	</div>
	<div class="sbox-content" style="background:#fff;"> 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
					<tr>
						<td width='30%' class='label-view text-right'>Cate Id</td>
						<td>{{ $row->cate_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Name</td>
						<td>{{ $row->cate_name}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Order</td>
						<td>{{ $row->cate_order}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Count</td>
						<td>{{ $row->cate_count}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Alias</td>
						<td>{{ $row->cate_alias}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Intro</td>
						<td>{{ $row->cate_intro}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Root Id</td>
						<td>{{ $row->cate_root_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Parent Id</td>
						<td>{{ $row->cate_parent_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Template</td>
						<td>{{ $row->cate_template}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Log Template</td>
						<td>{{ $row->cate_log_template}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cate Meta</td>
						<td>{{ $row->cate_meta}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created Time</td>
						<td>{{ $row->created_time}} </td>
						
					</tr>
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	

	</div>
</div>
	  
@stop