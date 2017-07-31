@extends('layouts.app')

@section('content')
  <script type="text/javascript" src="{{ asset('static/js/simpleclone.js') }}"></script>
  <div class="page-content row">
 	<div class="page-content-wrapper m-t">

 		<div class="ajaxLoading"></div>
			<div class="sbox">

			<div class="sbox-title"> <h3><i class="icon-database text-danger"></i> 数据库管理  <small> 管理数据库表 </small> </h3>
			<span class="pull-right">	
				<a href="{{ URL::TO('admin/tables/tableconfig/')}}" class="btn btn-xs btn-primary linkConfig"><i class="fa fa-plus"></i> 新建表 </a>
				<a href="{{ URL::TO('admin/tables/mysqleditor/')}}" class="btn btn-xs btn-success linkConfig"><i class="fa fa-pencil"></i> 编辑数据库 </a>
			</span>	
			</div>
			<div class="sbox-content">

			

			<div class="row">
				<div class="col-md-3">
					{!! Form::open(array('url'=>'admin/tables/tableremove/', 'class'=>'form-horizontal','id'=>'removeTable' )) !!}
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									
									<th width="30"> <input type="checkbox" class="checkall i-checks-all " /></th>
									<th> Table Name </th>
									<th width="50"> Action </th>
								</tr>
							</thead>
							<tbody>
							@foreach($tables as $table)
								<tr>
									<td><input type="checkbox" class="ids  i-checks" name="id[]" value="{{ $table }}" /> </td>
									<td><a href="{{ URL::TO('admin/tables/tableconfig/'.$table)}}" class="linkConfig" > {{ $table }}</a></td>
									<td>
									<a href="javascript:void(0)" onclick="droptable()" class="btn btn-xs btn-danger"><i class="fa fa-minus"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						
						</table>
					
					</div>
					{!! Form::close() !!}		
				</div>
				<div class="col-md-9">
					
					<div class="tableconfig" style="background:#fff; padding:10px; min-height:300px; border:solid 1px #ddd;">

					</div>

				</div>

			</div>
		</div>
		</div>
	
	</div>
</div>	  
<script type="text/javascript">
$(document).ready(function(){

	$('.linkConfig').click(function(){
		$('.ajaxLoading').show();
		var url =  $(this).attr('href');
		$.get( url , function( data ) {
			$( ".tableconfig" ).html( data );
			$('.ajaxLoading').hide();
			
			
		});
		return false;
	});
});

function droptable()
{
	if(confirm('are you sure remove selected table(s) ?'))
	{
		$('#removeTable').submit();
	} else {
		return false;
	}
}

</script>
@endsection