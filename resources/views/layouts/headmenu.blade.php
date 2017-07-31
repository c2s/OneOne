<div class="row  ">
        <nav style="margin-bottom: 0;" role="navigation" class="navbar navbar-static-top  nav-inside">
        <div class="navbar-header">
            <a href="javascript:void(0)" class="navbar-minimalize minimalize-btn "><i class="fa fa-bars"></i> </a>
            
        </div>

            <ul class="nav navbar-top-links navbar-right">
            <li>

            </li>
                    
		@if(CNF_MULTILANG ==1)
		<li class="dropdown pull-left">
			<?php 
			$flag ='en';
			$langname = 'English'; 
			foreach(SiteHelpers::langOption() as $lang):
				if($lang['folder'] == Session::get('lang') or $lang['folder'] == 'CNF_LANG') {
					$flag = $lang['folder'];
					$langname = $lang['name']; 
				}
				
			endforeach;?>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-language nav-icon"> </i>
				<img class="flag-lang" src="{{ asset('static/images/flags/'.$flag.'.png') }}" width="16" height="12" alt="lang" /> {{ $langname }}
				<span class="hidden-xs">
				 <i class="fa fa-angle-down"></i>
				</span>
			</a>

			 <ul class="dropdown-menu dropdown-menu-right icons-right">
				@foreach(SiteHelpers::langOption() as $lang)
					<li><a href="{{ URL::to('home/lang/'.$lang['folder'])}}"><img class="flag-lang" src="{{ asset('static/images/flags/'. $lang['folder'].'.png')}}" width="16" height="11" alt="lang" /> {{  $lang['name'] }}</a></li>
				@endforeach	
			</ul>

		</li>	
		@endif				
		@if(Auth::user()->group_id == 1)
		<li class="user dropdown"><a class="dropdown-toggle" href="javascript:void(0)" title="{{ Lang::get('core.m_controlpanel') }}"  data-toggle="dropdown"><i class="icon-steam2"></i> <i class="caret"></i></a>
		  <ul class="dropdown-menu dropdown-menu-right icons-right">
		   
		  	<li><a href="{{ URL::to('admin/config')}}"><i class="icon-steam2"></i> {{ Lang::get('core.m_setting') }}</a></li>
			<li><a href="{{ URL::to('core/users')}}"><i class="icon-users"></i> {{ Lang::get('core.m_users') }} &  {{ Lang::get('core.m_groups') }} </a></li>
			<li><a href="{{ URL::to('core/users/blast')}}"><i class="icon-mail"></i> {{ Lang::get('core.m_blastemail') }} </a></li>	
			<li><a href="{{ URL::to('core/logs')}}"><i class="icon-clock2"></i> {{ Lang::get('core.m_logs') }}</a></li>	
			<li class="divider"></li>
			<li><a href="{{ URL::to('core/pages')}}"><i class="icon-file-plus"></i> {{ Lang::get('core.m_pagecms')}}</a></li>
			
			<li class="divider"></li>
			<li><a href="{{ URL::to('admin/module')}}"><i class="icon-spinner7"></i> {{ Lang::get('core.m_codebuilder') }}</a></li>
			<li><a href="{{ URL::to('admin/code')}}"><i class="icon-pencil3"></i>  <span class="text-danger">Source Code Editor</span>  </a></li>
			<li><a href="{{ URL::to('admin/tables')}}"><i class="icon-database"></i> Database Tables </a></li>
			<li><a href="{{ URL::to('admin/menu')}}"><i class="icon-paragraph-left2"></i> {{ Lang::get('core.m_menu') }}</a></li>
			<li class="divider"></li>
			<li><a href="{{ url('core/template/changelog')}}"><i class="icon-feed3"></i> Changelog </a></li>
			<li><a href="{{ URL::to('core/template')}}"><i class="icon-table"></i> Template Guide </a></li>

		  </ul>
		</li>
		@endif
		
		<li class="user dropdown"><a class="dropdown-toggle " href="javascript:void(0)"  data-toggle="dropdown" title="{{ Lang::get('core.m_myaccount') }}"><i class="icon-user4"></i> <i class="caret"></i></a>
		  <ul class="dropdown-menu dropdown-menu-right icons-right">
		  	<li><a href="{{ URL::to('dashboard')}}"><i class="icon-stats-down"></i> {{ Lang::get('core.m_dashboard') }}</a></li>
			<li><a href="{{ URL::to('')}}" target="_blank"><i class="icon-earth"></i>  Main Site </a></li>
			<li><a href="{{ URL::to('user/profile')}}"><i class="icon-bubble-user"></i> {{ Lang::get('core.m_profile') }}</a></li>
			<li><a href="{{ URL::to('core/elfinder')}}"><i class="icon-folder2"></i>  File Manager </a></li>
			<li><a href="{{ URL::to('user/logout')}}"><i class="icon-enter3"></i> {{ Lang::get('core.m_logout') }}</a></li>
		  </ul>
		</li>			
		
	 				
				
            </ul>

        </nav>
        </div>