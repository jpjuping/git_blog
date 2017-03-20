<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class IndexController
 * @package App\Http\Controllers\Admin
 *注释:后台首页控制器类
 */
class IndexController extends Controller
{
    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param string ${PARAM_NAME}
     * @return string
     *注释:后台首页
     */
    public function index()
    {
        $user = session('user');
        return view('admin.index',compact('user'));
    }


    public function info()
    {

        return view('admin.info');


    }
}
