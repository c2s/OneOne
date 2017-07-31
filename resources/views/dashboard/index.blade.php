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

                <section class="index_hotapp index_hot">
                    <h3>推荐应用<a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;anyid=65&amp;n=appstore&amp;c=appstore&amp;a=doindex">更多应用<i class="fa fa-angle-right"></i></a>
                    </h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12 index_stat_chart">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10066&amp;anyid=65"><img src="./10066.png" class="media-object" width="80"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10066&amp;anyid=65">
                                            <h4 class="media-heading">图片云加速-七牛<span class="text-danger"></span></h4>
                                            <p><p>通过七牛云存储给网站图片加速，极大提升图片加载速度，让网站秒开！</p><p>不支持阿里云、西部数码等空间商的默认<span style="color: rgb(255, 0, 0);">测试域名</span>使用，如&nbsp;<span style="color: rgb(136, 136, 136); font-family: PingFangSC-Light, &quot;helvetica neue&quot;, &quot;hiragino sans gb&quot;, arial, &quot;microsoft yahei ui&quot;, &quot;microsoft yahei&quot;, simsun, sans-serif;">qyu20170620.my3w.com</span></p></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 index_stat_chart">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10071&amp;anyid=65"><img src="./10071.png" class="media-object" width="80"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10071&amp;anyid=65">
                                            <h4 class="media-heading">账号互通<span class="text-danger"></span></h4>
                                            <p><p><span style="line-height: 1.42857;">通过帐号互通可以无缝整合支持UCenter系列的网站会员，实现用户的一站式注册、登录、退出，无需重复登录、注册、退出。</span></p><p><span style="line-height: 1.42857;"><span style="font-weight: 700; color: rgb(127, 127, 127); font-size: 12px; line-height: 17.1429px;"><br></span></span><br></p></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 index_stat_chart">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10068&amp;anyid=65"><img src="./10068.png" class="media-object" width="80"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10068&amp;anyid=65">
                                            <h4 class="media-heading">网站安全检测<span class="text-danger"></span></h4>
                                            <p><p>检测网站的安全性，文件夹可写权限，以及网站是否被黑，并删除隐藏的黑链，邮件通知管理员，时刻提升网站安全性。</p></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 index_stat_chart">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10043&amp;anyid=65"><img src="./10043.png" class="media-object" width="80"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10043&amp;anyid=65">
                                            <h4 class="media-heading">商城模块<span class="text-danger"></span></h4>
                                            <p><p>一款非常适用于企业电子商务 B2C 的营销型功能模块。<br><br><a href="http://www.metinfo.cn/mshop/" target="_blank">详细介绍</a><br></p></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 index_stat_chart">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10007&amp;anyid=65"><img src="./10007.png" class="media-object" width="80"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10007&amp;anyid=65">
                                            <h4 class="media-heading">robots在线修改器<span class="text-danger"></span></h4>
                                            <p>网站通过robots协议告诉搜索引擎哪些页面可以抓取，哪些页面不能抓取。此工具用来在线修改robots。</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 index_stat_chart">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10046&amp;anyid=65"><img src="./10046.png" class="media-object" width="80"></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="http://demo.metinfo.cn/admin/index.php?lang=cn&amp;n=appstore&amp;c=appstore&amp;a=doappdetail&amp;type=app&amp;no=10046&amp;anyid=65">
                                            <h4 class="media-heading">多语言自动识别<span class="text-danger"></span></h4>
                                            <p><p>说明：自动识别访问者语言环境，打开对应语言的站点，实现更加人性化的站点访问体验。</p></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="index_news">
                    <h3>MetInfo 新闻<a href="http://www.metinfo.cn/" target="_blank">更多<i class="fa fa-angle-right"></i></a></h3>
                    <div id="newslist" data-newslisturl="http://www.metinfo.cn/metv5news.php?fromurl=http://demo.metinfo.cn/&amp;action=json&amp;listnum=6"><ul><li><span>2017-05-31</span><a href="http://www.metinfo.cn/news/shownews1534.htm" style="color:#f00;" target="_blank" title="MetInfo 5.3.17版本更新公告">MetInfo 5.3.17版本更新公告</a></li><li><span>2017-04-01</span><a href="http://www.metinfo.cn/news/shownews1518.htm" target="_blank" title="MetInfo 5.3.16版本更新公告">MetInfo 5.3.16版本更新公告</a></li><li><span>2017-01-21</span><a href="http://www.metinfo.cn/news/shownews1516.htm" target="_blank" title="MetInfo 5.3.15 版本更新公告">MetInfo 5.3.15 版本更新公告</a></li><li><span>2016-12-30</span><a href="http://www.metinfo.cn/news/shownews1499.htm" target="_blank" title="MetInfo 5.3.14 版本更新公告">MetInfo 5.3.14 版本更新公告</a></li><li><span>2016-12-01</span><a href="http://www.metinfo.cn/news/shownews1498.htm" target="_blank" title="MetInfo 5.3.13 版本更新公告">MetInfo 5.3.13 版本更新公告</a></li><li><span>2016-10-31</span><a href="http://www.metinfo.cn/news/shownews1497.htm" target="_blank" title="MetInfo 5.3.12 版本更新公告">MetInfo 5.3.12 版本更新公告</a></li></ul></div>
                </section>

            </div>

        </div>
    </div>


    <div class="clear"></div>

    <div class="row m-t">
    </div>


</div>

</div>



@stop