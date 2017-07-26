	<div class="table-footer">
	<div class="row">
	 <div class="col-sm-5">
	  <div class="table-actions" style=" padding: 10px 0">

	  </div>					
	  </div>
	   <div class="col-sm-3">
		<p class="text-center" style=" padding: 25px 0">
		Total : <b>{{ $pagination->total() }}</b>
		</p>		
	   </div>
		<div class="col-sm-4">			 
	  {!! $pagination->appends($pager)->render() !!}
	  </div>
	  </div>
	</div>	
	
	