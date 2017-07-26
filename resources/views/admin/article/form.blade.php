@extends('layouts.app')

@section('content')

@include('UEditor::head')
  <div class="page-content row">
    <!-- Page header -->
	  <script type="text/javascript" src="{{URL::asset('js/lib/My97DatePicker/WdatePicker.js')}}"></script>
 
 	<div class="page-content-wrapper m-t">


<div class="sbox">
	<div class="sbox-title"> <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
		<div class="sbox-tools" >
			<a href="{{ url($pageModule.'save?return='.$return) }}" class="btn btn-xs btn-white tips"  title="{{ Lang::get('core.btn_back') }}" ><i class="icon-backward"></i> {{ Lang::get('core.btn_back') }} </a>
		</div>
	</div>
	<div class="sbox-content"> 	

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	

		 {!! Form::open(array('url'=>'admin/article/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> 文章编辑</legend>

							<div class="form-group  " >
								<div class="col-md-6">
									<label for="Post Title" class=" control-label col-md-4 text-left"> 文章标题 </label>
									{!! Form::hidden('id', $row['id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
									{!! Form::text('post_title', $row['post_title'],array('class'=>'form-control', 'placeholder'=>'在此输入你的标题!', 'maxlength'=>100,   )) !!}
								</div>
								<div class="col-md-2">

								</div>
							</div>

							<div class="form-group1" style="float: left ; width: 80%">

								<label for="Post Content" class=" control-label  text-left"> 文章内容 </label>
								<!-- 加载编辑器的容器 -->
								<textarea name='post_content' id='container' class="" >{{ $row['post_content'] }}</textarea>

								<div class="col-md-2">

								</div>
							</div>
							<div id="divEditRight">
								<div id="divEditPost">
									<div id="divBox">
										<div id="divFloat">
											{{--<div id="post" class="editmod">--}}
												{{--<input class="btips btn btn-sm btn-green" style="width:180px;height:38px; float: left" type="submit" value="提交" id="btnPost">--}}
											{{--</div>--}}

											<!-- cate -->
											<div id="cate" class="">
												<br>
												<br>
												<br>
												<br>
												<label for="cmbCateID" class="" style="max-width:65px;text-overflow:ellipsis; float: left">分类 &nbsp;&nbsp;</label>
												<select style="width:180px;" class="form-control" size="1" name="CateID" id="cmbCateID">
														@foreach($category as $k => $rows)
															<option value="{{ $k  }}" @if( $row->category_id == $k ) selected="selected" @endif>{{ $rows }}</option>
														@endforeach
												</select>

											</div>
											<br>
											<!-- cate -->
											<!-- level -->
											<div id="level" class="editmod">
												<label for="cmbPostStatus" class="editinputname" style="max-width:65px;text-overflow:ellipsis; float: left">状态 &nbsp;&nbsp;</label>
												<select class="form-control" style="width:180px;" size="1" name="Status" id="cmbPostStatus" onchange="edtLevel.value=this.options[this.selectedIndex].value">
													@foreach($postStatus as $k => $rows)
														<option value="{{ $k  }}" @if( $row->post_status == $k ) selected="selected" @endif >{{ $rows }}</option>
													@endforeach
												</select>
											</div>
											<br>
											<!-- )level -->

											<!-- user( -->
											{{--<div id="user" class="editmod">--}}
												{{--<label for="cmbUser" class="editinputname" style="max-width:65px;text-overflow:ellipsis; float: left">作者 &nbsp;&nbsp;</label>--}}
												{{--<select  class="form-control" style="width:180px;" size="1" name="AuthorID" id="cmbUser" onchange="edtAuthorID.value=this.options[this.selectedIndex].value">--}}
													{{--<option value="1" selected="selected">admin</option>--}}
												{{--</select>--}}
											{{--</div>--}}
											<!-- )user -->

											<!-- newdatetime( -->
											<div id="newdatetime" class="editmod">
												<label for="edtDateTime" class="editinputname" style="max-width:65px;text-overflow:ellipsis; float: left">日期 &nbsp;&nbsp;</label>
												<input type="text" name="PostTime" id="edtDateTime" value="{{ $row['created_time'] }}" style="width:171px;" class="form-control Wdate" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})">
											</div>
											<br>

											<!-- )newdatetime -->

											<!-- Istop( -->
											<div id="istop" class="editmod">
												<label for="edtIstop" class="editinputname" style="float: left">置顶</label>
												<input id="edtIstop" name="IsTop" style="float: left" type="checkbox" value="{{  $row['is_top'] }}" class="" >
											</div>
											<br>
											<!-- )Istop -->

											<!-- IsLock( -->

											<div id="islock" class="editmod">
												<label for="edtIslock" class="editinputname" style="float: left">禁止评论</label>
												<input id="edtIslock" name="IsLock" style="float: left" type="checkbox" value="{{ $row['comment_status'] }}" class="">
												<span class="iCheck-helper"></span>
											</div>
											<!-- )IsLock -->

											<!-- Navbar( -->          <!-- )Navbar -->

											<!-- 3号输出接口 -->
											<div id="response3" class="editmod">
											</div>
										</div>
									</div>
								</div>
							</div>
									  {{--<div class="form-group  " >--}}
										{{--<label for="Post Status" class=" control-label col-md-4 text-left"> Post Status </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('post_status', $row['post_status'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  {{--<div class="form-group  " >--}}
										{{--<label for="Is Top" class=" control-label col-md-4 text-left"> Is Top </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('is_top', $row['is_top'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  <div class="form-group  " >
										<div class="col-md-6">
											<label for="Post Alias" class=" control-label col-md-4 text-left"> 别名 </label>
											{!! Form::text('post_alias', $row['post_alias'],array('class'=>'form-control', 'placeholder'=>'',   )) !!}
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  {{--<div class="form-group  " >--}}
										{{--<label for="Comment Status" class=" control-label col-md-4 text-left"> Comment Status </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('comment_status', $row['comment_status'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  {{--<div class="form-group  " >--}}
										{{--<label for="Post Password" class=" control-label col-md-4 text-left"> Post Password </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('post_password', $row['post_password'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  {{--<div class="form-group  " >--}}
										{{--<label for="Comment Count" class=" control-label col-md-4 text-left"> Comment Count </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('comment_count', $row['comment_count'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  <div class="form-group  " >
										<div class="col-md-6">
											<label for="Post Tag" class=" control-label col-md-4 text-left"> 标签 </label>
										  {!! Form::text('post_tag', $row['post_tag'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div>
									  {{--<div class="form-group  " >--}}
										{{--<label for="Category Id" class=" control-label col-md-4 text-left"> Category Id </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('category_id', $row['category_id'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  {{--<div class="form-group  " >--}}
										{{--<label for="Is Lock" class=" control-label col-md-4 text-left"> Is Lock </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('is_lock', $row['is_lock'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  {{--<div class="form-group  " >--}}
										{{--<label for="Created Time" class=" control-label col-md-4 text-left"> Created Time </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('created_time', $row['created_time'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  {{--<div class="form-group  " >--}}
										{{--<label for="View Nums" class=" control-label col-md-4 text-left"> View Nums </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('view_nums', $row['view_nums'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div> 					--}}
									  {{--<div class="form-group  " >--}}
										{{--<label for="Comm Nums" class=" control-label col-md-4 text-left"> Comm Nums </label>--}}
										{{--<div class="col-md-6">--}}
										  {{--{!! Form::text('comm_nums', $row['comm_nums'],array('class'=>'form-control', 'placeholder'=>'',   )) !!} --}}
										 {{--</div> --}}
										 {{--<div class="col-md-2">--}}
										 	{{----}}
										 {{--</div>--}}
									  {{--</div>--}}
						</fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="icon-checkmark-circle2"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="icon-bubble-check"></i> {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('admin/article?return='.$return) }}' " class="btn btn-warning btn-sm "><i class="icon-cancel-circle2 "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
</div>			 
   <script type="text/javascript">

	   <!-- 实例化UE编辑器 -->
	   var ue = UE.getEditor('container');
	   ue.ready(function() {
		   ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
	   });

	   $(document).ready(function() {

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("admin/article/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop