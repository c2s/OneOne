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
						<td width='30%' class='label-view text-right'>EmployeeId</td>
						<td>{{ $row->EmployeeId}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>LastName</td>
						<td>{{ $row->LastName}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>FirstName</td>
						<td>{{ $row->FirstName}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ReportsTo</td>
						<td>{{ $row->ReportsTo}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>BirthDate</td>
						<td>{{ $row->BirthDate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>HireDate</td>
						<td>{{ $row->HireDate}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Phone</td>
						<td>{{ $row->Phone}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Email</td>
						<td>{{ $row->Email}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Foto</td>
						<td>{{ $row->Foto}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Status</td>
						<td>{{ $row->Status}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	