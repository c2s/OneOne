<?php

$tpl['masterdetailmodel'] = str_replace("/","","\$this->modelview = new  \App\Models\/".$module."();");
$tpl['masterdetaildelete'] = '\DB::table(\''.$info['table'].'\')->whereIn(\''.$info['key'].'\',$request->input(\'ids\'))->delete();';
$tpl['masterdetailform'] = '			
	<hr />
	<div class="clr clear"></div>
	
	<h5> '.$info['title'].' </h5>
	
	<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
			<tr>
				@foreach ($subform[\'tableGrid\'] as $t)
					@if($t[\'view\'] ==\'1\' && $t[\'field\'] !=\''.$info['master_key'].'\')
						<th>{{ $t[\'label\'] }}</th>
					@endif
				@endforeach
				<th></th>	
			  </tr>

        </thead>

        <tbody>
        @if(count($subform[\'rowData\'])>=1)
            @foreach ($subform[\'rowData\'] as $rows)
            <tr class="clone clonedInput">
									
			 @foreach ($subform[\'tableGrid\'] as $field)
				 @if($field[\'view\'] ==\'1\' && $field[\'field\'] !=\''.$info['master_key'].'\')
				 <td>					 
				 	{!! SiteHelpers::bulkForm($field[\'field\'] , $subform[\'tableForm\'] , $rows->{$field[\'field\']}) !!}							 
				 </td>
				 @endif					 
			 
			 @endforeach
			 <td>
			 	<a onclick=" $(this).parents(\'.clonedInput\').remove(); return false" href="#" class="remove btn btn-xs btn-danger">-</a>
			 	<input type="hidden" name="counter[]">
			 </td>
			@endforeach
			</tr> 

		@else
            <tr class="clone clonedInput">
									
			 @foreach ($subform[\'tableGrid\'] as $field)

				 @if($field[\'view\'] ==\'1\' && $field[\'field\'] !=\''.$info['master_key'].'\')
				 <td>					 
				 	{!! SiteHelpers::bulkForm($field[\'field\'] , $subform[\'tableForm\'] ) !!}							 
				 </td>
				 @endif					 
			 
			 @endforeach
			 <td>
			 	<a onclick=" $(this).parents(\'.clonedInput\').remove(); return false" href="#" class="remove btn btn-xs btn-danger">-</a>
			 	<input type="hidden" name="counter[]">
			 </td>
			
			</tr> 

		
		@endif	


        </tbody>	

     </table>  
     <input type="hidden" name="enable-masterdetail" value="true">
     </div>
	<br /><br />
     
     <a href="javascript:void(0);" class="addC btn btn-xs btn-info" rel=".clone"><i class="fa fa-plus"></i> New Item</a>
     <hr />';

$tpl['masterdetailview'] ='	<hr />
	
	<h5> '.$info['title'].' </h5>
	
	<div class="table-responsive">
    <table class="table table-striped ">
        <thead>
			<tr>
				<th class="number"> No </th>
					@foreach ($subgrid[\'tableGrid\'] as $t)
					@if($t[\'view\'] ==\'1\')
						<th>{{ $t[\'label\'] }}</th>
					@endif
				@endforeach
				
			  </tr>
        </thead>

        <tbody>
            @foreach ($subgrid[\'rowData\'] as $row)
            <tr>
				<td width="30">  </td>		
			 @foreach ($subgrid[\'tableGrid\'] as $field)
				 @if($field[\'view\'] ==\'1\' )		
				 	<td> {!! SiteHelpers::formatRows($row->$field[\'field\'],$field) !!}</td>				 
				 @endif					 
			 
			 @endforeach
			@endforeach
			</tr> 


        </tbody>	

     </table>   
     </div>';     

$tpl['masterdetailjs'] = '$(\'.addC\').relCopy({});';     
