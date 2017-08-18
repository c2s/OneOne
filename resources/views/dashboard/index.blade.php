@extends('layouts.app')


@section('content')

<script type="text/javascript" src="{{ asset('static/js/plugins/chartjs/Chart.min.js') }}"></script>

<div class="page-content row">

	<div class="page-content-wrapper m-t">
@if(Auth::check() && Auth::user()->group_id == 1)

<section class="ribon-sximo">


    <div class="index_box">
        <section class="index_point hidden-xs">
            <h3>首页引导
            </h3><div class="container-fluid">
                <ul>

                    <li>
                        <a href="{{ URL::to('admin/config') }}" class="clear">
                            <i class="icon-steam2"></i>
                            {{ Lang::get('core.dash_i_sitemenu') }}
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/module') }}" class="clear">
                            <i class="fa fa-table"></i>
                            {{ Lang::get('core.dash_i_module') }}
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/menu') }}" class="clear">
                            <i class="icon-list"></i>
                            {{ Lang::get('core.dash_i_setting') }}
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>

                    <li>
                        <a href="{{ URL::to('admin/module') }}" class="clear">
                            <i class="fa fa-plus"></i>
                            {{ Lang::get('core.dash_i_create_content') }}
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="{{ URL::to('core/users') }}" class="clear">
                            <i class="icon-users"></i>
                            {{ Lang::get('core.dash_i_usergroup') }}
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>

                </ul>
            </div>
        </section>

    </div>
</section>
@endif
    <link href="{{ asset('static/css/admin_index.css')}}" rel="stylesheet">
    <link href="{{ asset('static/css/box.css')}}" rel="stylesheet">

    <div id="metcmsbox">
            <div class="index_box">
                <section class="index_stat">
                    <h3>访问概况</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-7 index_stat_chart">
                                <div class="index_stat_chart_tips">
                                    <ul>
                                        <li><i class="ip"></i>IP</li>
                                        <li><i class="uv"></i>独立访客</li>
                                        <li><i class="pv"></i>浏览次数（PV）</li>
                                    </ul>
                                    近8小时流量趋势
                                </div>
                                <canvas id="myChart" height="752" width="1554" style="width: 777px; height: 376px;"></canvas>
                            </div>
                            <div class="col-md-5 index_stat_table">
                                <table cellpadding="0" cellspacing="1" class="stat_table">
                                    <tbody><tr class="">
                                        <th width="25%">日期</th>
                                        <th width="25%">PV</th>
                                        <th width="25%">独立访客</th>
                                        <th width="25%">IP</th>
                                    </tr>

                                    <tr class="">
                                        <td>今天</td>
                                        <td>798</td>
                                        <td>209</td>
                                        <td>200</td>
                                    </tr>

                                    <tr class="">
                                        <td>昨天</td>
                                        <td>1095</td>
                                        <td>303</td>
                                        <td>291</td>
                                    </tr>

                                    <tr class="">
                                        <td>2017-07-24</td>
                                        <td>1043</td>
                                        <td>250</td>
                                        <td>239</td>
                                    </tr>

                                    <tr>
                                        <td>2017-07-23</td>
                                        <td>259</td>
                                        <td>55</td>
                                        <td>55</td>
                                    </tr>

                                    <tr>
                                        <td>2017-07-22</td>
                                        <td>418</td>
                                        <td>102</td>
                                        <td>98</td>
                                    </tr>

                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </section>
                {{--iframe--}}
                <iframe src="{{ url('system/info') }}" frameborder="0"  scrolling="no" width="100%" height="400"></iframe>
                {{--iframe end --}}

            </div>

        </div>
    </div>


    <div class="clear"></div>

    <div class="row m-t">
    </div>


</div>
@stop