@extends('layouts.login')

@section('content')

<div class="padding-15">

		<div class="login-box">
		{!! Form::open(array('url' => 'user/doreset/'.$verCode, 'class'=>'form-vertical sky-form boxed')) !!}
				<header>
					{{ CNF_APPNAME }}
				</header>			
				<fieldset>
	    	@if(Session::has('message'))
				{!! Session::get('message') !!}
			@endif
				
					
				<section>
					<label class="label">New Password</label>
					<label class="input">
						<i class="icon-append fa fa-lock"></i>
						{!! Form::password('password',  array('class'=>'form-control', 'placeholder'=>'New Password')) !!}
						<span class="tooltip tooltip-top-right">{{ Lang::get('core.email') }}</span>
					</label>
				</section>	


				<section>
					<label class="label">Re-type Password</label>
					<label class="input">
						<i class="icon-append fa fa-lock"></i>
						 {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) !!}
						<span class="tooltip tooltip-top-right">Re-type Password</span>
					</label>
				</section>

		</fieldset>	

		<footer>
			<div class="forgot-password pull-left">
				<a href="{{ url('user/login')}}" ><b> Back To Login ?</b></a><br />
				<a href="{{ url('')}}" > Go To Main Site</a>
			</div>	
			<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Create Account</button>
		</footer>					
			
			 {!! Form::close() !!}
		</div>
</div>
@stop