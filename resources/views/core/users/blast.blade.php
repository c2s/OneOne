@extends('layouts.app')

@section('content')
    <link href="{{ asset('assets/plugins/editor.summernote/summernote.css') }}" rel="stylesheet">
<div class="page-content row">
    <!-- Page header -->

	
 <div class="page-content-wrapper m-t">  
  <ul class="nav nav-tabs" style="margin-bottom:10px;">
    <li ><a href="{{ URL::to('core/users')}}"><i class="fa fa-user"></i> Users </a></li>
    <li class=""><a href="{{ URL::to('core/groups')}}"><i class="fa fa-users"></i> Groups</a></li>
    <li class="active"><a href="{{ URL::to('core/users/blast')}}"><i class="fa fa-envelope"></i> Send Email </a></li>
  </ul> 

  @if(Session::has('message'))    
       {{ Session::get('message') }}
  @endif  
    
    <!-- Start blast email -->

{!! Form::open(array('url'=>'core/users/doblast/', 'class'=>'form-horizontal ')) !!}
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3">  </label>
          <div class="col-md-12">
              <ul class="parsley-error-list">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>                
           </div> 
          </div> 
		  
<div class="col-sm-6">
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3">  {{ Lang::get('core.fr_emailsubject') }}   </label>
          <div class="col-md-9">
               {!! Form::text('subject',null,array('class'=>'form-control', 'placeholder'=>'','required'=>'true')) !!} 
           </div> 
          </div> 
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3"> {{ Lang::get('core.fr_emailsendto') }}   </label>
          <div class="col-md-9">
           @foreach($groups as $row)
            <label class="checkbox">
              <input type="checkbox"   name="groups[]" value="{{ $row->group_id}}" /> {{ $row->name }}
            </label>


           @endforeach
           </div> 
          </div>  		  
		  
</div>
<div class="col-sm-6">
          <div class="form-group  " >
          <label for="ipt" class=" control-label col-md-3">  Status   </label>
          <div class="col-md-9">          
            <label class="radio">
              <input type="radio"   name="uStatus" value="all" > All Status
            </label>
            <label class="radio">
              <input type="radio"  name="uStatus" value="1" > Active 
            </label>  
            <label class="radio">
              <input type="radio"  name="uStatus" value="0" > Unconfirmed
            </label>
            <label class="radio">
              <input type="radio"  name="uStatus" value="2"> Blocked
            </label>                                
           </div> 
          </div>  
</div>
 
 <div class="col-sm-12">


 
          <div class="form-group "  >
         
          <div style=" padding:10px;">
		   <label for="ipt" class=" control-label "> {{ Lang::get('core.fr_emailmessage') }} </label>
           <textarea class="form-control editor" rows="50"   name="message"></textarea> 
		   </div>
           <p> {{ Lang::get('core.fr_emailtag') }} : </p>
           <small> [fullname] [first_name] [last_name] [email]  </small>
         
          </div> 

            
                    

          
          <div class="form-group" >
          <label for="ipt" class=" control-label col-md-3"> </label>
          <div class="col-md-9">
              <button type="submit" name="submit" class="btn btn-primary">{{ Lang::get('core.sb_send') }} Mail </button>
           </div> 
          </div> 
	</div>	                   
     {!! Form::close() !!}


    <!-- / blast email -->

</div>




</div>  
<script type="text/javascript" src="{{ asset('assets/plugins/editor.summernote/summernote.min.js') }}"></script>  
<script type="text/javascript">
$(function(){
   $('.editor').summernote();
})
</script>  
<style type="text/css" >
  .note-editable { min-height: 200px;}
</style>



@stop