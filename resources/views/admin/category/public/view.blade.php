<div class="m-t" style="padding-top:25px;">	
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-responsive" > 	

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
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	