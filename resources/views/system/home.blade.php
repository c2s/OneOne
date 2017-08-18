@extends('layouts.app')


@section('content')
    <div class="page-content row">

        <div class="page-content-wrapper m-t">

            <link href="{{ asset('static/css/system_index.css')}}" rel="stylesheet">
            <link href="{{ asset('static/css/box.css')}}" rel="stylesheet">

            <div id="metcmsbox">
                <div class="index_box">
                    <section class="index_stat">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="index_stat_table">
                                    <table cellpadding="" cellspacing="5" class="stat_table">
                                        <tbody>
                                        <tr class="">
                                            <th width="25%"><b>系统信息</b></th>
                                            <th width="25%"></th>
                                            <th width="25%"><b>产品信息</b></th>
                                            <th width="25%"></th>
                                        </tr>

                                        <tr class="">
                                            <td>OneOne版本</td>
                                            <td>{{$systemInfo['version']}}</td>
                                            <td>产品名称</td>
                                            <td>{{$productInfo['title']}}</td>
                                        </tr>

                                        <tr class="">
                                            <td>Laravel版本</td>
                                            <td>{{ $systemInfo['laravel'] }}</td>
                                            <td>研发团队</td>
                                            <td> {{$productInfo['team']}}</td>
                                        </tr>
                                        <tr class="">
                                            <td>操作系统</td>
                                            <td>{{ $systemInfo['os'] }}</td>
                                            <td>官方网址</td>
                                            <td>{!! $productInfo['site'] !!}</td>
                                        </tr>
                                        <tr class="">
                                            <td>运行环境</td>
                                            <td>{{ $systemInfo['env'] }}</td>
                                            <td>官方QQ群</td>
                                            <td>{!! $productInfo['qqGroup'] !!}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Mysql版本</td>
                                            <td>{{$systemInfo['mysql']}}</td>
                                            <td>官方手册</td>
                                            <td>{!! $productInfo['doc'] !!}</td>
                                        </tr>
                                        <tr class="">
                                            <td>PHP版本</td>
                                            <td>{{ $systemInfo['php'] }}</td>
                                            <td>开源地址</td>
                                            <td>{!! $productInfo['openSource'] !!} </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>

                    <section class="index_news">
                        <h3>登录日志<a href="http://www.metinfo.cn/" target="_blank">更多<i class="fa fa-angle-right"></i></a></h3>
                        <div id="newslist" data-newslisturl="http://www.metinfo.cn/metv5news.php?fromurl=http://demo.metinfo.cn/&amp;action=json&amp;listnum=6">
                            <ul>
                                <li><span>2017-08-17 14:32:51</span><a href="http://www.metinfo.cn/news/shownews1534.htm" style="color:#f00;" target="_blank" title="MetInfo 5.3.17版本更新公告">admin登录管理后台</a></li>
                            </ul>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
@stop