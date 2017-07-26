@extends('layouts.app')

@section('content')
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> MySQL 编辑 <small> 编辑SQL语句 </small></h3>
      </div>
	  
        <ul class="breadcrumb">
          <li><a href="{{ URL::to('dashboard') }}"> 控制面板 </a></li>
          <li><a href="{{ URL::to('admin/module') }}"> 模块 </a></li>
          <li class="active">  MySQL 编辑  </li>
        </ul>     
	  	  
    </div>

	 <div class="page-content-wrapper m-t"> 
	@include('sximo.module.tab',array('active'=>'sql','type'=>  $type ))

	@if(Session::has('message'))
		   {{ Session::get('message') }}
	@endif
<div class="sbox">
 <div class="sbox-title"><h5> 编辑SQL语句  </h5></div>
 <div class="sbox-content">
 {!! Form::open(array('url'=>'admin/module/savesql/'.$module_name, 'class'=>'form-vertical ')) !!}
 <div class="infobox infobox-info fade in">
  <button type="button" class="close" data-dismiss="alert"> x </button>  
  <p> <strong>提示 !</strong> 你可以使用mysql管理工具 SQL YOG , PHP MyAdmin , Navicat Premium , 等工具来执行这些SQL 操作 </p>
</div>	


<div class="form-group">
<label for="ipt" class=" control-label">SQL SELECT 语句</label>
  <textarea name="sql_select" rows="5" id="sql_select" class="tab_behave form-control"  placeholder="SQL Select & Join Statement" >{{ $sql_select }}</textarea>
</div> 	

<div class="form-group">
<label for="ipt" class=" control-label">SQL WHERE 条件</label>
  <textarea name="sql_where" rows="2" id="sql_where" class="form-control" placeholder="SQL Where Statement" >{{ $sql_where }}</textarea>
</div> 

<div class="infobox infobox-danger fade in">
  <button type="button" class="close" data-dismiss="alert"> x </button>  
  <p> <strong>警告 !</strong> 请确保SQL语句准确无误,防止由于操作不当造成误操作!  </p>
</div>	
		
	

<div class="form-group">
<label for="ipt" class=" control-label">SQL GROUP 语句</label>
 <textarea name="sql_group" rows="2" id="sql_group" class="form-control"   placeholder="SQL Group 语句" >{{ $sql_group }}</textarea>

</div> 
<div class="form-group">
<label for="ipt" class=" control-label"></label>
<button type="submit" class="btn btn-primary"> 保存 SQL </button>
</div> 	

 <input type="hidden" name="module_id" value="{{ $row->module_id }}" />
 <input type="hidden" name="module_name" value="{{ $row->module_name }}" />
 
 {!! Form::close() !!}
 </div>
</div>	
	
</div>	</div>
<div class="clr"></div>

@stop