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
	@include('sximo.config.tab')
<div class="tab-content m-t">
  <div class="tab-pane active use-padding" id="info">
  <div class="sbox  ">
  <div class="sbox-title"></div>
  <div class="sbox-content">
		 {!! Form::open(array('url'=>'admin/config/save/', 'class'=>'form-horizontal row', 'files' => true)) !!}

		<div class="col-sm-6 animated fadeInRight ">
		  <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_appname') }} </label>
			<div class="col-md-8">
			<input name="cnf_appname" type="text" id="cnf_appname" class="form-control input-sm" required  value="{{ CNF_APPNAME }}" />
			 </div>
		  </div>

		  <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_appdesc') }} </label>
			<div class="col-md-8">
			<input name="cnf_appdesc" type="text" id="cnf_appdesc" class="form-control input-sm" value="{{ CNF_APPDESC }}" />
			 </div>
		  </div>

		  <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_comname') }} </label>
			<div class="col-md-8">
			<input name="cnf_comname" type="text" id="cnf_comname" class="form-control input-sm" value="{{ CNF_COMNAME }}" />
			 </div>
		  </div>

		  <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_emailsys') }} </label>
			<div class="col-md-8">
			<input name="cnf_email" type="text" id="cnf_email" class="form-control input-sm" value="{{ CNF_EMAIL }}" />
			 </div>
		  </div>
		  {{--<div class="form-group">--}}
		    {{--<label for="ipt" class=" control-label col-md-4"> Muliti language <br /> <small> Only Layout Interface </small> </label>--}}
			{{--<div class="col-md-8">--}}
				{{--<div class="checkbox">--}}
					{{--<input name="cnf_multilang" type="checkbox" id="cnf_multilang" value="1"--}}
					{{--@if(CNF_MULTILANG ==1) checked @endif--}}
					  {{--/>  {{ Lang::get('core.fr_enable') }}--}}
				{{--</div>--}}
			 {{--</div>--}}
		  {{--</div>--}}

		   <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_mainlanguage') }} </label>
			<div class="col-md-8">

					<select class="form-control" name="cnf_lang">

					@foreach(SiteHelpers::langOption() as $lang)
						<option value="{{  $lang['folder'] }}"
						@if(CNF_LANG ==$lang['folder']) selected @endif
						>{{  $lang['name'] }}</option>
					@endforeach
				</select>
			 </div>
		  </div>


		   <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.frontend_template') }} </label>
			<div class="col-md-8">
					<select class="form-control" name="cnf_theme">
					@foreach(SiteHelpers::themeOption() as $t)
						<option value="{{  $t['folder'] }}"
						@if(CNF_THEME ==$t['folder']) selected @endif
						>{{  $t['name'] }}</option>
					@endforeach
				</select>
			 </div>
		  </div>

		  <div class="form-group hide">
		    <label for="ipt" class=" control-label col-md-4"> Development Mode ?   </label>
			<div class="col-md-8">
				<div class="checkbox">
					<input name="cnf_mode" type="checkbox" id="cnf_mode" value="1"
					@if (defined('CNF_MODE') &&  CNF_MODE =='production') checked @endif
					  />  Production
				</div>
				<small> If you need to debug mode , please unchecked this option </small>
			 </div>
		  </div>

		  <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">&nbsp;</label>
			<div class="col-md-8">
				<button class="btn btn-primary" type="submit">{{ Lang::get('core.sb_savechanges') }} </button>
			 </div>
		  </div>
		</div>

		<div class="col-sm-6 animated fadeInRight ">


		  <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.mb_date_format') }} </label>
			<div class="col-md-8">
				<select class="form-control" name="cnf_date">
				<?php $dates = array(
						'Y-m-d'=>' ( Y-m-d ) . 日期格式 : '.date('Y-m-d'),
						'Y/m/d'=>' ( Y/m/d ) . 日期格式 : '.date('Y/m/d'),
						'd-m-y'=>' ( D-M-Y ) . 日期格式 : '.date('d-m-y'),
						'd/m/y'=>' ( D/M/Y ) . 日期格式 : '.date('d/m/y'),
						'm-d-y'=>' ( m-d-Y ) . 日期格式 : '.date('m-d-Y'),
						'm/d/y'=>' ( m/d/Y ) . 日期格式 : '.date('m/d/Y'),
					  );
				foreach($dates as $key=>$val) {?>
					<option value="{{  $key }}"
					@if(defined('CNF_DATE') && CNF_DATE ==$key) selected @endif
					>{{  $val }}</option>

				<?php } ?>
				</select>
			 </div>
		  </div>

		  <div class="form-group">
		    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.mb_metakey') }} </label>
			<div class="col-md-8">
				<textarea class="form-control input-sm" name="cnf_metakey">{{ CNF_METAKEY }}</textarea>
			 </div>
		  </div>

		   <div class="form-group">
		    <label  class=" control-label col-md-4">{{ Lang::get('core.mb_meta_description') }}</label>
			<div class="col-md-8">
				<textarea class="form-control input-sm"  name="cnf_metadesc">{{ CNF_METADESC }}</textarea>
			 </div>
		  </div>

		   <div class="form-group">
		    <label  class=" control-label col-md-4">{{ Lang::get('core.mb_backend_logo') }}</label>
			<div class="col-md-8">
				<input type="file" name="logo">
				<p> <i>{{ Lang::get('core.mb_backend_logo_size_tips') }} </i> </p>
				<div style="padding:5px; border:solid 1px #ddd; background:#f5f5f5; width:auto;">
				 	@if(file_exists(public_path().'/admin/images/'.CNF_LOGO) && CNF_LOGO !='')
				 	<img src="{{ asset('admin/images/'.CNF_LOGO)}}" alt="{{ CNF_APPNAME }}" />
				 	@else
					<img src="{{ asset('admin/images/logo.png')}}" alt="{{ CNF_APPNAME }}" />
					@endif
				</div>
			 </div>
		  </div>

		</div>
		 {!! Form::close() !!}
	</div>
	</div>
</div>
</div>
</div>
</div>








@stop