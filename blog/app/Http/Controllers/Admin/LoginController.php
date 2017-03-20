<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

require_once('resources/org/captcha/code.class.php');

class LoginController extends Controller
{
	/**
	 * 后台用户登陆
	 * 注释:
	 * @copyright JUPING<pjjuping@gmail.com>
	 * @author JUPING<pjjuping@gmail.com>
	 * @date      2017-03-06
	 * @param     [param]
	 * @return    [type]     [description]
	 */
    public function login(){
		if($input = Input::all()){
			//先判断验证码是否正确
			$code = $this->getCode();
			if($code != strtoupper($input['code'])){
				return view('admin.login')->with('msg','验证码错误');
			}else{
				//查询有无该用户信息
				$param = array(
					'user_name'=>$input['username'],
					'pass_word'=>md5($input['password']),
				);
				$userInfo = User::where($param)->first();
				if(!empty($userInfo)){
					//写入session
					session(['user'=>$userInfo]);
					return Redirect::to('admin/index');//跳转至后台首页
				}else{
					return view('admin.login')->with('msg','用户名或密码错误');
				}

			}
		}else{
			return view('admin.login');
		}
    }



    /**
     * 生成验证码
     * 注释:
     * @copyright JUPING<pjjuping@gmail.com>
     * @author JUPING<pjjuping@gmail.com>
     * @date      2017-03-06
     * @param     [param]
     * @return    [type]     [description]
     */
    public function code(){
    	$captcha = new \Code;
		$captcha->make();
    }


	/**
	 *author:JuPing<pjjuping@gmail.com>
	 *createtime:${DATE} ${TIME}
	 * @param mixed ${PARAM_NAME}
	 * @return mixed
	 *注释:获取生成的验证码的值用户判断验证码是否正确
	 */
    public function getCode(){
    	$captcha = new \Code;
    	return $captcha->get();
    }

	/**
	 * crypt加密
	 * 注释:
	 * @copyright JUPING<pjjuping@gmail.com>
	 * @author JUPING<pjjuping@gmail.com>
	 * @date      2017-03-06
	 * @param     [param]
	 * @return    [type]     [description]
	 */
	public function crypt()
	{
		Crypt::encrypt();
	}
}

