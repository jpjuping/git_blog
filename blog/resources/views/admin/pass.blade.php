@extends('layouts/admin')
@section('content')
    <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 修改密码
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密码</h3>
    </div>
    <div style="background: red;color:white;text-align: center;" id="notice">
        @if(isset($msg))
            <p>{{$msg}}</p>
        @endif

        @if(count($errors) >0)
            @foreach($errors as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form method="post" action="{{url('admin/editPassword')}}">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>原密码：</th>
                <td>
                    <input type="password" name="password_o" id="password_o"> </i>请输入原始密码</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新密码：</th>
                <td>
                    <input type="password" name="password" id="password"> </i>新密码6-20位</span>
                    <span style='color:red;' id="p1"></span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>确认密码：</th>
                <td>
                    <input type="password" name="password_confirmation" id="password2"> </i>再次输入密码</span>
                    <span style='color:red;' id="p2"></span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交" id="submit" >
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script>

    $(document).ready(function () {
        $('#password').blur(function () {
            var pass = this.value;
            if(pass != ''){
                //判断密码长度
                var long = pass.length;
                if(long < 6 || long > 20){
                    $('#p1').html('*密码长度需6-20位');
                    $('#submit').attr('disabled',true);
                    $('#submit').css('background','lightslategray');
                    $('#submit').css('border-color','gray');
                    $('#submit').css('cursor','default');
                }else{
                    var password = $('#password2').val();
                    if(password != '' && pass == password){
                        $('#p2').html('');
                    }
                    $('#submit').attr('disabled',false);
                    $('#submit').css('background','#337ab7');
                    $('#submit').css('border-color','#286090');
                    $('#submit').css('cursor','pointer');
                }
            }

        })

        $('#password').focus(function () {
            $('#p1').html('');
            $('#notice').html('');
        })

        $('#password_o').focus(function () {
            $('#notice').html('');
        })

        $('#password2').blur(function () {
            var password = this.value;
            var pass = $('#password').val();
            if(password != '' && password != pass){
                $('#p2').html('*两次密码不一致,请重新输入');
                $('#submit').attr('disabled',true);
                $('#submit').css('background','lightslategray');
                $('#submit').css('border-color','gray');
                $('#submit').css('cursor','default');
            }else if(password != '' && password == pass){
                $('#p2').html('');
                $('#submit').attr('disabled',false);
                $('#submit').css('background','#337ab7');
                $('#submit').css('border-color','#286090');
                $('#submit').css('cursor','pointer');
            }

        })

        $('#password2').focus(function () {
            $('#p2').html('');
            this.value='';
            $('#notice').html('');

        })

    });

</script>
@endsection

