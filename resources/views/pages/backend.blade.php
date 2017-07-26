    @extends('layouts.app')
     
    @section('content')
      <div class="page-content row">
        <!-- Page header -->
        <div class="page-header">
          <div class="page-title">
            <h3> Title <small> Tag Line </small></h3>
          </div>
     
          <ul class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"> Dashboard</a></li>
            <li class="active">Title </li>
          </ul>      
          
        </div>
     
		<div class="container">
			<div class="text-center" style="padding:250px 0; height:350px;">		
				Write Content  Here ..
			</div>	
		</div>	
      </div>  
       
    @stop