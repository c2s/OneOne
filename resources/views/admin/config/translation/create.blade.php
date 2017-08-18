 {!! Form::open(array('url'=>'admin/config/addtranslation/', 'class'=>'form-horizontal ','parsley-validate'=>'','novalidate'=>' ')) !!}
 <div class="row">
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4"> 名称 </label>
	<div class="col-md-8">
	<input name="name" type="text" id="name" class="form-control input-sm" value="" required="true" /> 
	 </div> 
  </div>   	
 
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4"> 别名 </label>
	<div class="col-md-8">
	<input name="folder" type="text" id="folder" class="form-control input-sm" value="" required /> 
	 </div> 
  </div>   	
  
   <div class="form-group">
    <label for="ipt" class=" control-label col-md-4"> 作者 </label>
	<div class="col-md-8">
	<input name="author" type="text" id="author" class="form-control input-sm" value="" required /> 
	 </div> 
  </div>   	
  
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">  </label>
	<div class="col-md-8">
		<button type="submit" name="submit" class="btn btn-info"> 确定</button>
	</div> 
  </div>  
  </div> 	    
 
 {!! Form::close() !!}