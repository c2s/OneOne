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
						<td width='30%' class='label-view text-right'>Id</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Author Id</td>
						<td>{{ $row->author_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Post Content</td>
						<td>{{ $row->post_content}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Post Title</td>
						<td>{{ $row->post_title}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Post Status</td>
						<td>{{ $row->post_status}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Is Top</td>
						<td>{{ $row->is_top}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Post Alias</td>
						<td>{{ $row->post_alias}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Comment Status</td>
						<td>{{ $row->comment_status}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Post Password</td>
						<td>{{ $row->post_password}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Comment Count</td>
						<td>{{ $row->comment_count}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Post Tag</td>
						<td>{{ $row->post_tag}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Category Id</td>
						<td>{{ $row->category_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Is Lock</td>
						<td>{{ $row->is_lock}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created Time</td>
						<td>{{ $row->created_time}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>View Nums</td>
						<td>{{ $row->view_nums}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Comm Nums</td>
						<td>{{ $row->comm_nums}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	