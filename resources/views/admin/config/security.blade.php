@extends('layouts.app')

@section('content')


  <div class="page-content row">


 <div class="page-content-wrapper">  
	@if(Session::has('message'))
	  
		   {{ Session::get('message') }}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		
<div class="block-content">
	@include('admin.config.tab')
<div class="tab-content m-t">
	  <div class="tab-pane active use-padding row" id="info">	


 {!! Form::open(array('url'=>'admin/config/login/', 'class'=>'form-horizontal')) !!}

	<div class="col-sm-6">
		<div class="sbox   animated fadeInRight"> 
			<div class="sbox-title"> {{ Lang::get('core.fr_registrationsetting') }} </div>
			<div class="sbox-content"> 	

 		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.mail_system_select') }}</label>
			<div class="col-sm-8">
					
					<label class="radio">
					<input type="radio" name="CNF_MAIL" value="phpmail" @if(defined('CNF_MAIL') && CNF_MAIL =='phpmail') checked @endif />
						phpMail
					</label>
					
					<label class="radio">
					<input type="radio" name="CNF_MAIL" value="swift" @if(defined('CNF_MAIL') && CNF_MAIL =='swift') checked @endif /> 
					SWIFT Mail ( {{ Lang::get('core.required_configuration') }} )
					</label>			
			</div>
		</div>					
  
		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.fr_registrationdefault') }}  </label>	
			<div class="col-sm-8">
					<div >
						<label class="checkbox-inline">
						<select class="form-control" name="CNF_GROUP">
							@foreach($groups as $group)
							<option value="{{ $group->group_id }}"
							 @if(CNF_GROUP == $group->group_id ) selected @endif
							>{{ $group->name }}</option>
							@endforeach
						</select>
						</label>
					</div>				
			</div>	
					
		  </div> 

		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4">{{ Lang::get('core.fr_registration') }} </label>	
			<div class="col-sm-8">
					
					<label class="radio">
					<input type="radio" name="CNF_ACTIVATION" value="auto" @if(CNF_ACTIVATION =='auto') checked @endif /> 
					{{ Lang::get('core.fr_registrationauto') }}
					</label>
					
					<label class="radio">
					<input type="radio" name="CNF_ACTIVATION" value="manual" @if(CNF_ACTIVATION =='manual') checked @endif /> 
					{{ Lang::get('core.fr_registrationmanual') }}
					</label>								
					<label class="radio">
					<input type="radio" name="CNF_ACTIVATION" value="confirmation" @if(CNF_ACTIVATION =='confirmation') checked @endif/>
					{{ Lang::get('core.fr_registrationemail') }}
					</label>	
				
							
			</div>	
					
		  </div> 
		  
 		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.fr_allowregistration') }} </label>	
			<div class="col-sm-8">
					<label class="checkbox">
					<input type="checkbox" name="CNF_REGIST" value="true"  @if(CNF_REGIST =='true') checked @endif/> 
					{{ Lang::get('core.fr_enable') }}
					</label>			
			</div>
		</div>
				<div class="form-group">
					<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.fr_get_password') }} </label>
					<div class="col-sm-8">
						<label class="checkbox">
							<input type="checkbox" name="CNF_GET_PASSWORD" value="true"  @if(CNF_GET_PASSWORD =='true') checked @endif/>
							{{ Lang::get('core.fr_enable') }}
						</label>
					</div>
				</div>

				<div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.fr_allowfrontend') }} </label>	
			<div class="col-sm-8">
					<label class="checkbox">
					<input type="checkbox" name="CNF_FRONT" value="false" @if(CNF_FRONT =='true') checked @endif/> 
					{{ Lang::get('core.fr_enable') }}
					</label>			
			</div>
		</div>		
	
 		  <div class="form-group">
			<label for="ipt" class=" control-label col-sm-4"> 验证码 </label>
			<div class="col-sm-8">
					<label class="checkbox">
					<input type="checkbox" name="CNF_RECAPTCHA" value="false" @if(CNF_RECAPTCHA =='true') checked @endif/> 
					{{ Lang::get('core.fr_enable') }}
					</label>	
										
			</div>
		</div>		
		
		  		  
	  <div class="form-group">
		<label for="ipt" class=" control-label col-md-4">&nbsp;</label>
		<div class="col-md-8">
			<button class="btn btn-primary" type="submit"> {{ Lang::get('core.sb_savechanges') }}</button>
		 </div> 
	 
	  </div>	  
	</div>
	</div>
 </div>

	<div class="col-sm-6">
		<div class="sbox   animated fadeInRight"> 
			<div class="sbox-title"> 防火墙 </div>
			<div class="sbox-content "> 	
					<div class="form-vertical">
						<div class="form-group">
							<label> IP黑名单 </label>
							
							<p><small>
									<br />
								输入要被限制的IP 如 : <code> 192.116.134 , 194.111.606.21 </code>
							</small></p>
							<textarea rows="5" class="form-control" name="CNF_RESTRICIP">{{ CNF_RESTRICIP }}</textarea>
						</div>
						
						<div class="form-group">
							<label> IP白名单 </label>
							<p><small>
									<br />
									输入不被限制的IP 如 : <code> 192.116.134 , 194.111.606.21 </code>
							</small></p>
							<textarea rows="5" class="form-control" name="CNF_ALLOWIP">{{ CNF_ALLOWIP }}</textarea>
						</div>

						<p> <font color="red">*</font> 如果白名单不为空,则白名单优先级大于黑名单 </p>
					</div>	
				
			</div>
		</div>
			


	 </div>
 {!! Form::close() !!}
</div>
</div>
</div>
</div>

@stop




