@extends('layouts.app')

@section('content')
<div class="page-content row">

	<div class="page-content-wrapper">
	<div class="ribon-sximo">
		<section >

				<div class="row m-l-none m-r-none m-t  white-bg shortcut " >
					<div class="col-sm-3  p-sm ribon-setting">
						<span class="pull-left m-r-sm "><i class="icon-folder-plus3"></i></span> 
						<a href="{{ URL::to('admin/module/create') }}" class="clear">
							<span class="h3 block m-t-xs"><strong> {{ Lang::get('core.btn_create') }} Module </strong>
							</span> <small > {{ Lang::get('core.fr_createmodule') }}  </small>
						</a>
					</div>				
					<div class="col-sm-3  p-sm ribon-module">
						<span class="pull-left m-r-sm "><i class="icon-folder-upload2"></i></span>
						<a href="javascript:void(0)" class="clear " onclick="$('.unziped').toggle()">
							<span class="h3 block m-t-xs"><strong>{{ Lang::get('core.btn_install') }} Module </strong>
							</span> <small >{{ Lang::get('core.fr_installmodule') }} </small> 
						</a>
					</div>				
					<div class="col-sm-3   p-sm ribon-users">
						<span class="pull-left m-r-sm "><i class="icon-folder-download2"></i></span>
						<a href="{{ URL::to('admin/module/package') }}" class="clear post_url">
							<span class="h3 block m-t-xs"><strong>{{ Lang::get('core.btn_backup') }} Module</strong>
							</span> <small > {{ Lang::get('core.fr_backupmodule') }} </small> 
						</a>
					</div>					
					<div class="col-sm-6 col-md-3  p-sm ribon-menu">
						<span class="pull-left m-r-sm "><i class="icon-database"></i></span>
						<a href="{{ URL::to('admin/tables') }}" >
							<span class="h3 block m-t-xs"><strong>{{ Lang::get('module.database') }}</strong>
							</span> <small > {{ Lang::get('module.database_manage') }} </small>
						</a>
					</div>	


				</div> 

		</section>			
	</div>
	@if(Session::has('message'))
		   {{ Session::get('message') }}
	@endif	
      <div class="white-bg p-sm m-b unziped" style=" border:solid 1px #ddd; display:none;">
	   {!! Form::open(array('url'=>'admin/module/install/', 'class'=>'breadcrumb-search','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
		<h3>{{ Lang::get('module.select_file') }}} </h3>
        <p>  <input type="file" name="installer" required style="float:left;">  <button type="submit" class="btn btn-primary btn-xs" style="float:left;"  ><i class="icon-upload"></i> Install</button></p>
        </form>
		<div class="clr"></div>
      </div>

 	<ul class="nav nav-tabs" style="margin-bottom:10px;">
	  <li @if($type =='addon') class="active" @endif><a href="{{ URL::to('admin/module')}}"><i class="icon-table"></i> {{ Lang::get('core.tab_installed') }}  </a></li>
	  <li @if($type =='core') class="active" @endif><a href="{{ URL::to('admin/module?t=core')}}"><i class="icon-table"></i> {{ Lang::get('core.tab_core') }}</a></li>
	</ul>     

	@if($type =='core')

		 <div class="infobox infobox-info fade in">
		  <button type="button" class="close" data-dismiss="alert"> x </button>  
		  <p>  {{  Lang::get('module.notice_not_change') }} </p>
		</div>	
		 
	@endif
	 {!! Form::open(array('url'=>'admin/module/package#', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) !!}
	<div class="table-responsive ibox-content" style="min-height:400px;">
	@if(count($rowData) >=1) 
		<table class="table table-striped ">
			<thead>
			<tr>
				<th>{{ Lang::get('module.action')}}</th>
				<th><input type="checkbox" class="checkall" /></th>
				<th>{{ Lang::get('module.module')}}</th>
				@if($type =='addon')<th>Shortcode</th>@endif
				<th>{{ Lang::get('module.controller')}}</th>
				<th>{{ Lang::get('module.database')}}</th>
				<th>{{ Lang::get('module.pri')}}</th>
				<th>{{ Lang::get('module.created')}}</th>
		
			</tr>
			</thead>
        <tbody>
		@foreach ($rowData as $row)
			<tr>		
				<td>
				<div class="btn-group">
				<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
				<I class="icon-cogs"></I> <span class="caret"></span>
				</button>
					<ul style="display: none;" class="dropdown-menu icons-right">
						@if($type != 'core')
						<li><a href="{{ URL::to($row->module_name)}}"><i class="fa fa-table"></i> {{ Lang::get('core.btn_view') }} Module </a></li>
						@endif
						<li><a href="{{ URL::to('admin/module/config/'.$row->module_name)}}"><i class="fa fa-edit"></i> {{ Lang::get('core.btn_edit') }}</a></li>
						@if($type != 'core')
						<li><a href="javascript://ajax" onclick="SximoConfirmDelete('{{ URL::to('admin/module/destroy/'.$row->module_id)}}')"><i class="fa fa-refresh"></i> {{ Lang::get('core.btn_remove') }}</a></li>
						<li class="divider"></li>
						<li><a href="{{ URL::to('admin/module/rebuild/'.$row->module_id)}}"><i class="fa fa-code"></i> Rebuild All Codes</a></li>
						@endif
					</ul>
				</div>					
				</td>
				<td>
				 
				<input type="checkbox" class="ids" name="id[]" value="{{ $row->module_id }}" /> </td>
				<td>{{ $row->module_title }} </td>
				@if($type =='addon')
				<td> 
				<div style="font-size: 10px"> 
					<b>Form Shortcode : </b><br /> 
					<?php echo "{!! SximoHelpers::showForm('".$row->module_name."') !!}"; ?><br />
					<b>Table Shortcode : </b><br /> 
					<?php echo htmlentities('<?php');?> use \App\Http\Controllers\<?php echo ucwords($row->module_name).'Controller;';?> <br />
					<?php echo ' echo '.ucwords($row->module_name).'Controller::display(); ?>'; ?>
					
					
				</div>
				</td>
				@endif
				<td>{{ $row->module_name }} </td>

				<td>{{ $row->module_db }} </td>
				<td>{{ $row->module_db_key }} </td>
				<td>{{ $row->module_created }} </td>
			</tr>
		@endforeach	
	</tbody>		
	</table>
	
	@else
		
		<p class="text-center" style="padding:50px 0;">{{ Lang::get('core.norecord') }} 
		<br /><br />
		<a href="{{ URL::to('admin/module/create')}}" class="btn btn-default "><i class="icon-plus-circle2"></i>  {{ Lang::get('module.new_module') }} </a>
		 </p>	
	@endif
	</div>	
	{!! Form::close() !!}


</div>	

  <script language='javascript' >
  jQuery(document).ready(function($){
    $('.post_url').click(function(e){
      e.preventDefault();
      if( ( $('.ids',$('#SximoTable')).is(':checked') )==false ){
        alert( $(this).attr('data-title') + " not selected");
        return false;
      }
      $('#SximoTable').attr({'action' : $(this).attr('href') }).submit();
    })
  })
  </script>	 

@stop