<?php
/**
 * @author CaoQingSong<caoqingsong@wepiao.com>
 * @date 2017-08-17 14:39
 */

namespace App\Http\Controllers;


class SystemController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getSystemInfo()
    {

        $mysqlVersion = \DB::selectOne('select VERSION() as version');

        $systemInfo = [
            'version' => '1.0.0 beta',
            'laravel' => app()::VERSION,
            'os'      => PHP_OS,
            'env'     => $_SERVER['SERVER_SOFTWARE'],
            'mysql'   => $mysqlVersion->version,
            'php'     => PHP_VERSION,
        ];
        $productInfo = [
            'title'      => 'OneOne内容管理框架',
            'team'       => '莫非',
            'site'       => '<a href="http://one.mofei.org">one.mofei.org</a>',
            'qqGroup'    => '<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=16e824dcc8bbb7482b4c386cc42653eb41a9713755aa1df63ec5d68157819e1a"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="OneOne ①" title="OneOne ①"></a>',
            'doc'        => '<a href="http://one.mofei.org">OneOne手册</a>',
            'openSource' => '<a href="https://github.com/SecurityCenter/OneOne">https://github.com/SecurityCenter/OneOne</a>',
        ];

        return view('system.info', compact('systemInfo','productInfo'));
    }

    public function getHome()
    {

        $mysqlVersion = \DB::selectOne('select VERSION() as version');

        $systemInfo = [
            'version' => '1.0.0 beta',
            'laravel' => app()::VERSION,
            'os'      => PHP_OS,
            'env'     => $_SERVER['SERVER_SOFTWARE'],
            'mysql'   => $mysqlVersion->version,
            'php'     => PHP_VERSION,
        ];
        $productInfo = [
            'title'      => 'OneOne内容管理框架',
            'team'       => '莫非',
            'site'       => '<a href="http://one.mofei.org">one.mofei.org</a>',
            'qqGroup'    => '<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=16e824dcc8bbb7482b4c386cc42653eb41a9713755aa1df63ec5d68157819e1a"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="OneOne ①" title="OneOne ①"></a>',
            'doc'        => '<a href="http://one.mofei.org">OneOne手册</a>',
            'openSource' => '<a href="https://github.com/SecurityCenter/OneOne">https://github.com/SecurityCenter/OneOne</a>',
        ];

        return view('system.home', compact('systemInfo','productInfo'));
    }

}