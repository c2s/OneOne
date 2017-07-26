 {!! Form::open(array('url'=>'admin/module/dobuild/'.$module_name, 'class'=>'form-horizontal')) !!}
    <div class="text-center result"></div>
    <p class="text-center" style="font-weight: bold;">
        <b> 构建全部代码 </b> <br />
        <span class="text-center"> <i class="icon-arrow-down3"></i> </span>
    </p>
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">  </label>
    <div class="col-md-8">
      <a href="{{ url('admin/module/rebuild/'.$module_id)}}" class="btn btn-danger" id="rebuild" ><i class="icon-spinner7"></i> Rebuild All Codes </a>
      </div>
  </div> 
<hr />
    <p class="text-center " style="font-weight: bold;">
    <b>Or Build Separate Codes</b> <br />
        <span class="text-center"> <i class="icon-arrow-down3"></i> </span>
    </p>
 <h5> Backend View </h5>
  <hr />
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Controller </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="controller" type="checkbox" id="controller" value="1">
	  <code> {{ ucwords($module) }}Controller.php </code> <br />will be replaced with new code 
	  </label>
	 </div> 
  </div>  

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Model </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  	<input name="model" type="checkbox" id="model" value="1">
		 <code>{{ ucwords($module) }}.php</code> Model <br />will be replaced with new code 
	  </label>
	 </div> 
  </div>  
  
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Grid Table </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="grid" type="checkbox" id="grid" value="1">
	  <code>index.blade.php</code>  at <code>views/{{ $module }}/ </code> folder <br /> will be replaced with new code 
	  </label>
	 </div> 
  </div>  

  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Form </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="form" type="checkbox" id="form" value="1" checked>
	  <code>form.blade.php</code>  at <code>views/{{ $module }}/ </code> folder <br /> will be replaced with new code 
	 
	  </label>
	 </div> 
  </div>        
  
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">View Detail  </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="view" type="checkbox" id="view" value="1" checked>
     <code>view.blade.php</code>  at <code>views/{{ $module }}/ </code> folder <br /> will be replaced with new code 
	  </label>
	   <input name="rebuild" type="hidden" id="rebuild" value="ok">
	   <input name="module_id" type="hidden" id="module_id" value="{{ $module_id}}">
	 </div> 
  </div>   
	<hr />
 <h5> Frontend  View <sup class="badge badge-success">New</sup></h5>
  	<hr />
  
  <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Frontend Grid   </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="frontgrid" type="checkbox" id="frontgrid" value="1" >
     <code>index.blade.php</code>  at <code>views/{{ $module }}/public/ </code> folder <br /> will be replaced with new code 
	  </label>
	   
	 </div> 
  </div>

    <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Frontend View Detail  </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="frontview" type="checkbox" id="frontview" value="1" >
     <code>view.blade.php</code>  at <code>views/{{ $module }}/public/ </code> folder <br /> will be replaced with new code 
	  </label>
	  
	 </div> 
  </div>

   <div class="form-group">
    <label for="ipt" class=" control-label col-md-4">Frontend Form  </label>
	<div class="col-md-8">
	  <label class="checkbox">
	  <input name="frontform" type="checkbox" id="frontform" value="1" >
     <code>form.blade.php</code>  at <code>views/{{ $module }}/public </code> folder <br /> will be replaced with new code 
	  </label>
	   
	 </div> 
  </div> 


   <div class="form-group">
    <label for="ipt" class=" control-label col-md-4"></label>
	<div class="col-md-8">
	  <button type="submit" name="submit" class="btn btn-sm btn-danger"><i class="icon-spinner7"></i> Re-Build Now</button>
	 </div> 
  </div>       

 {!! Form::close() !!}
 <script type="text/javascript">
	$(function(){
        $('#rebuild').click(function () {
            var url = $(this).attr("href");
            $(this).html('<i class="icon-spinner7"></i> Processing .... ');
            $.get(url, function( data ) {
              $( ".result" ).html( '<p class="alert alert-success">'+data.message+'</p>' );
             $('#rebuild').html('<i class="icon-spinner7"></i>  Rebuild All Codes ');
            });
            return false;
        })
        

		$('input[type="checkbox"],input[type="radio"]').iCheck({
			checkboxClass: 'icheckbox_square-green',
			radioClass: 'iradio_square-green',
		});	
		
	})
 </script>

