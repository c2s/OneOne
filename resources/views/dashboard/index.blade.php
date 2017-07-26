@extends('layouts.app')


@section('content')

<script type="text/javascript" src="{{ asset('admin/js/plugins/chartjs/Chart.min.js') }}"></script>
<div class="page-content row">

	<div class="page-content-wrapper m-t">  
	
	
	@if(Auth::check() && Auth::user()->group_id == 1)
 
<section class="ribon-sximo"> 
	<div class="row m-l-none m-r-none m-t  white-bg shortcut ribon "  >
		<div class="col-sm-6 col-md-3  p-sm ribon-module">
			<span class="pull-left m-r-sm text-navy"><i class="fa fa-table"></i></span> 
			<a href="{{ URL::to('admin/module') }}" class="clear">
				<span class="h3 block m-t-xs"><strong>  {{ Lang::get('core.dash_i_module') }}  </strong>
				</span> <small>  {{ Lang::get('core.dash_module') }}</small>
			</a>
		</div>
		<div class="col-sm-6 col-md-3   p-sm ribon-setting">
			<span class="pull-left m-r-sm ">	<i class="icon-steam2"></i></span>
			<a href="{{ URL::to('admin/config') }}" class="clear">
				<span class="h3 block m-t-xs"><strong> {{ Lang::get('core.dash_i_setting') }}</strong>
				</span> <small >   {{ Lang::get('core.dash_setting') }} </small> 
			</a>
		</div>
		<div class="col-sm-6 col-md-3   p-sm ribon-menu">
			<span class="pull-left m-r-sm ">	<i class="icon-list"></i></span>
			<a href="{{ URL::to('admin/menu') }}" class="clear">
			<span class="h3 block m-t-xs"><strong>  {{ Lang::get('core.dash_i_sitemenu') }} </strong></span>
			<small>  {{ Lang::get('core.dash_sitemenu') }}  </small> </a>
		</div>
		<div class="col-sm-6 col-md-3  p-sm ribon-users">
			<span class="pull-left m-r-sm ">	<i class="icon-users"></i></span>
			<a href="{{ URL::to('core/users') }}" class="clear">
			<span class="h3 block m-t-xs"><strong> {{ Lang::get('core.dash_i_usergroup') }}</strong>
			</span> <small >  {{ Lang::get('core.dash_usergroup') }} </small> </a>
		</div>
	</div> 
</section>	

@endif


<div class="row m-t">  



            		<div class="col-lg-9">
            			<div class="row m-t">
                			<div class="col-lg-12">
        						<div class="sbox">     						
                                    <div class="sbox-content">
                                        <div>
                                            <span class="pull-right text-right">
                                                <small>Average value of sales in the past month in: <strong>United states</strong></small>
                                                    <br>
                                                   <span class="text-warning"> All sales: 712,862 </span>
                                            </span>
                                            <h1 class="m-b-xs">$ 115,992</h1>
                                            <h3 class="font-bold no-margins">
                                                <span class="text-danger">{{ date("Y")}}</span> revenue margin
                                            </h3>
                                            <small>Sales marketing.</small>
                                        </div>

                                        <div>
                                            <div height="191" id="lineChart" style=" width: 100%;margin: 10px 0 ; height: 191px; background: #dadada;" >
                                                <p style="padding: 80px 0; font-size: 20px; text-align: center;">
                                                Your Charts Goes Here ...
                                                </p>

                                            </div>
                                        </div>

                                        <div class="m-t-md">
                                            <small class="pull-right">
                                                <i class="fa fa-clock-o"> </i>
                                                Update on 16.07.2015
                                            </small>
                                           <small>
                                               <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                                           </small>
                                        </div>
                                    </div><!-- /sbox-content -->


        						</div><!-- /sbox -->
        					</div><!-- </div class="col-lg-12"> -->
                        </div><!-- </div class="row-mt"> -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="sbox">

                                    <div class="sbox-title">
                                        <span class="label label-info pull-right">Today</span>
                                        <h5>Title</h5>
                                    </div>
                                    <div class="sbox-content">
                                        <h2>76.886.200</h2>
                                        <div class="stat-percent font-bold text-info">98% <i class="fa fa-level-up"></i></div>
                                        <small>New Orders</small>
                                    </div>

                                </div><!-- /sbox -->
                            </div><!-- </div class="col-lg-4"> -->
                            <div class="col-lg-4">
                                <div class="sbox">

                                    <div class="sbox-title">
                                        <span class="label label-success pull-right">Monthly</span>
                                        <h5>Title</h5>
                                    </div>
                                    <div class="sbox-content">
                                        <h2>111.886.200</h2>
                                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-level-up"></i></div>
                                        <small>New Orders</small>
                                    </div>

                                </div><!-- /sbox -->
                            </div><!-- </div class="col-lg-4"> -->
                            <div class="col-lg-4">
                                <div class="sbox">

                                    <div class="sbox-title">
                                        <span class="label label-warning pull-right">Annual</span>
                                        <h5>Title</h5>
                                    </div>
                                    <div class="sbox-content">
                                        <h2>$ 870.886.200</h2>
                                        <div class="stat-percent font-bold text-warning">98% <i class="fa fa-level-up"></i></div>
                                        <small>New Orders</small>
                                    </div>

                                </div><!-- /sbox -->
                            </div><!-- </div class="col-lg-4"> -->
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                
                                <div class="sbox">
                                    <div class="sbox-title">
                                        <h4>Read below comments and tweets  
                                            <a class="pull-right" href="#" data-dismiss="alert">
                                                <i class="fa fa-times"></i>&nbsp;
                                            </a>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-wrench"></i>&nbsp;
                                            </a>
                                            <a class="pull-right" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse">
                                                <i class="fa fa-chevron-up"></i>&nbsp;                                    
                                            </a>
                                        </h4>
                                    </div><!-- </div class="sbox-title"> -->

                                    <div id="collapseTwo" class="collapse in" style="height: auto;">    
                                        <div class="sbox-content" id="1" style="background-color:white;">
                                            <div class="feed-activity-list">

                                                <div class="feed-element">
                                                    <p><a href="#" class="text-info">@mangopik</a> I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                                                </div>
                                                <hr/>
                                                <div class="feed-element">
                                                    <p><a href="#" class="text-info">@sximo</a> Check this stock chart. This price is crazy! </p>                                           
                                                    <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small>
                                                </div>
                                                <hr/>
                                                <div class="feed-element">
                                                    <p><a href="#" class="text-info">@sximo</a> Lorem ipsum unknown printer took a galley </p>
                                                    <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                                                </div>
                                                <hr/>
                                                <div class="feed-element">
                                                    <p><a href="#" class="text-info">@sximo</a> I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 minuts ago</small>
                                                </div>
                                                <hr/>
                                                <div class="feed-element">
                                                    <p><a href="#" class="text-info">@mangopik</a> Lorem ipsum unknown printer took a galley </p>
                                                    <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                                                </div>        

                                            </div>
                                        </div><!-- </div class="sbox-content">  --> 
                                    </div>
                                </div>
                            </div><!-- </div class="col-lg-6"> -->
                            <div class="col-lg-6">
                                <div class="sbox">
                                    
                                    <div class="sbox-title">
                                        <h4>Timeline&nbsp;<span class="label label-primary">Meeting Today</span>
                                            <a class="pull-right" href="#" data-dismiss="alert">
                                                <i class="fa fa-times"></i>&nbsp;
                                            </a>
                                            <a class="pull-right" href="#">
                                                <i class="fa fa-wrench"></i>&nbsp;
                                            </a>
                                            <a class="pull-right" href="#collapseThree" data-parent="#accordion" data-toggle="collapse">
                                                <i class="fa fa-chevron-up"></i>&nbsp;                                    
                                            </a>
                                        </h4>
                                    </div><!-- </div class="sbox-title"> -->

                                    <div id="collapseThree" class="collapse in" style="height: auto;">    
                                        <div class="sbox-content" id="1">

                                            <div id="collapseThree">                                               
                                                                       
                                                    <div class="row m-t">
                                                        <div class="col-xs-3">
                                                            6:00 am
                                                            <br>
                                                            <small class="text-navy">2 hour ago</small>
                                                        </div>
                                                        <div class="well col-xs-7 content no-top-border" >
                                                            <p class="m-b-xs"> <i class="fa fa-briefcase"></i> &nbsp;<strong>Meeting</strong></p>

                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                                            <p>
                                                                <span class="updating-chart" data-diameter="40" style="display: none;">
                                                                    7,1,2,6,8,10,6,0,7,9,0,6,5,6,10,8,6,6,4,4,1,3,10,8,4,10,4,10,6,7,5,8,5,2,7,4,10
                                                                </span>
                                                                <svg class="peity" height="16" width="64">
                                                                    <polygon fill="#1ab394" points="0 15 0 5 1.7777777777777777 14 3.5555555555555554 12.5 5.333333333333333 6.5 7.111111111111111 3.5 8.88888888888889 0.5 10.666666666666666 6.5 12.444444444444443 15.5 14.222222222222221 5 16 2 17.77777777777778 15.5 19.555555555555554 6.5 21.333333333333332 8 23.11111111111111 6.5 24.888888888888886 0.5 26.666666666666664 3.5 28.444444444444443 6.5 30.22222222222222 6.5 32 9.5 33.77777777777778 9.5 35.55555555555556 14 37.33333333333333 11 39.11111111111111 0.5 40.888888888888886 3.5 42.666666666666664 9.5 44.44444444444444 0.5 46.22222222222222 9.5 48 0.5 49.77777777777777 6.5 51.55555555555555 5 53.33333333333333 8 55.11111111111111 3.5 56.888888888888886 8 58.666666666666664 12.5 60.44444444444444 5 62.22222222222222 9.5 64 0.5 64 15"/>
                                                                    <polyline fill="transparent" points="0 5 1.7777777777777777 14 3.5555555555555554 12.5 5.333333333333333 6.5 7.111111111111111 3.5 8.88888888888889 0.5 10.666666666666666 6.5 12.444444444444443 15.5 14.222222222222221 5 16 2 17.77777777777778 15.5 19.555555555555554 6.5 21.333333333333332 8 23.11111111111111 6.5 24.888888888888886 0.5 26.666666666666664 3.5 28.444444444444443 6.5 30.22222222222222 6.5 32 9.5 33.77777777777778 9.5 35.55555555555556 14 37.33333333333333 11 39.11111111111111 0.5 40.888888888888886 3.5 42.666666666666664 9.5 44.44444444444444 0.5 46.22222222222222 9.5 48 0.5 49.77777777777777 6.5 51.55555555555555 5 53.33333333333333 8 55.11111111111111 3.5 56.888888888888886 8 58.666666666666664 12.5 60.44444444444444 5 62.22222222222222 9.5 64 0.5" stroke="#169c81" stroke-width="1" stroke-linecap="square"/>
                                                                </svg>
                                                            </p>
                                                        </div>                                
                                                    </div>
                                                     <div class="row m-t">
                                                        <div class="col-xs-3">
                                                            6:00 am
                                                            <br>
                                                            <small class="text-navy">2 hour ago</small>
                                                        </div>
                                                        <div class="well col-xs-7 content no-top-border" >
                                                            <p class="m-b-xs">  <i class="fa fa-file-text"></i> &nbsp;<strong>Conference</strong></p>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                                        </div>                                
                                                    </div>
                                                      
                                             
                                            </div>

                                        </div><!-- </div class="sbox-content">  --> 
                                    </div>                     
                                </div><!-- /sbox -->
                            </div><!-- </div class="col-lg-6"> -->
                        </div><!-- </div class="row"> -->

            		</div><!-- </div class="col-lg-9"> -->

                        <div class="col-lg-3" style="background-color:#ebebed;">
                            
                            <div class="" style="height: 1196px;">
                          
                                    <h3>Title <span class="badge badge-info pull-right">16</span></h3>
                                   
                                    <div class="feed-activity-list">               
                                        <div class="feed-element">
                                            <a class="pull-left" href="#">
                                                <img width="50" border="0" title="" class="img-circle tips" src="{{ asset('uploads/images/no-image-rounded.png') }}">&nbsp;
                                            </a>
                                            <div>                                                            
                                                <small>There are many variations of passages of Lorem Ipsum available.</small>
                                                <br/>
                                                <small class="text-muted">Today 1:21 pm</small>                  
                                            </div>
                                        </div>
                                        <hr/>
                                    
                                    </div><!-- </div class="feed-activity-list">  -->      
                                 
                                    <div class="feed-activity-list">               
                                        <div class="feed-element">
                                            <a class="pull-left" href="#">
                                                <img width="50" border="0" title="" class="img-circle tips" src="{{ asset('uploads/images/no-image-rounded.png') }}">&nbsp;
                                            </a>

                                            <div>                                                            
                                                <small>TIt is a long established fact that.</small>
                                                <br/>
                                                <small class="text-muted">Yesterday 2:11 am</small>                  
                                            </div>
                                        </div>
                                        <hr/>
                                    
                                    </div><!-- </div class="feed-activity-list">  -->

                                    <div class="feed-activity-list">               
                                        <div class="feed-element">
                                            <a class="pull-left" href="#">
                                                <img width="50" border="0" title="" class="img-circle tips" src="{{ asset('uploads/images/no-image-rounded.png') }}">&nbsp;
                                            </a>

                                            <div>                                                            
                                                <small>The generated Lorem Ipsum is therefore always free.</small>
                                                <br/>
                                                <small class="text-muted">Monday 4:11 pm</small>                  
                                            </div>
                                        </div>
                                        <hr/>
                                    
                                    </div><!-- </div class="feed-activity-list">  -->

                                    <div class="m-t-md">
                                        <h4>Title</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                                        </p>
                                        <div class="row m-t-sm">
                                            <div class="col-md-6">
                                                <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"/><rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"/><rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"/><rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"/><rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"/><rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"/><rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"/><rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"/><rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"/><rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"/></svg>
                                                <h5><strong>169</strong> Posts</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"/><polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"/></svg>
                                                <h5><strong>28</strong> Orders</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-t-md">
                                        <h4>Title</h4>
                                        <div>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="badge badge-primary">16</span>
                                                    General topic
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-info">12</span>
                                                    The generated Lorem
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-warning">7</span>
                                                    There are many variations
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                            </div><!-- </div style="height: 1196px;"> -->

                        </div><!-- </div class="col-lg-3" style="background-color:#ebebed;"> -->

                	</div>

	
</div>	
	
</div>



@stop