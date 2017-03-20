<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:用户修改密码展示页面
     */
    public function editPasswordShow()
    {
        return view('admin.pass');
    }

    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:用户修改密码
     */
    public function editPassword(){
        //接收参数
        if($input = Input::all()){
            //表单数据验证规则n
            $rules = [
                'password_o'=>'required',
                'password'=>'required|between:6,20|confirmed',
            ];
            $message = [
                'password_o.required'=>'原密码不能为空',
                'password.required'=>'新密码不能为空',
                'password.between'=>'新密码需6-20位',
                'password.confirmed'=>'两次密码输入不一样',
            ];
            $validator =  Validator::make($input,$rules,$message);
            //验证表单数据
            if($validator->passes()){
                $userId = session('user')['user_id'];
                $userInfo = User::where('user_id',$userId)->first();
                if(!empty($userInfo)){
                    //判断原密码是否输入正确
                    if($userInfo['pass_word'] != md5($input['password_o'])){
                        return view('admin.pass')->with('msg','原密码输入不正确');
                    }else{
                        //更新密码
                        $userInfo->pass_word = md5($input['password']);
                        $userInfo->update();
                        return redirect('admin/info');
                    }

                }
            }else{
                return view('admin.pass')->with('errors',$validator->errors()->all());
            }

        }
    }

}
