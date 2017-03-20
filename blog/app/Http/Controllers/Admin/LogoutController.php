<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:用户退出登陆
     */
    public function logout(){
        //session置为空
        session(['user'=>NUll]);
        //跳转登陆页面
        return Redirect::to('admin/login');

    }
}
