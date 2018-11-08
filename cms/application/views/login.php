<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎登录</title>
    <link href="<?= base_url('assets/css/login.css') ?>" rel="stylesheet">
</head>
<body>
<!--面板-->
<div id="panel">
    <!--面板的头部-->
    <div class="panel-top">
        <h2>欢迎登录CMS系统</h2>
    </div>    <!--面板的主要内容-->
    <div class="panel-content">
        <div class="int">
            <label><i class="layui-icon" style="line-height: 28px;font-size: 25px;color: #ccc">&#xe60c;</i></label>
            <input id="user_name" type="text" placeholder="用户名" value="admin">
        </div>
        <div class="int">
            <label><i class="layui-icon" style="line-height: 22px;font-size: 25px;color: #ccc">&#xe628;</i></label>
            <input id="password" type="password" placeholder="密码" value="111111">
        </div>
        <!--配置信息-->
        <!--<div class="setting">-->
        <!--    <a href="#" class="auto-login">-->
        <!--        <input type="checkbox">下次自动登录-->
        <!--    </a>-->
        <!--    <a href="#" class="forget-pwd">忘记密码</a>-->
        <!--</div>-->
        <div class="login">
            <button id="login-btn">登录</button>
        </div>
        <!--<div class="reg">还没账号?<a href="#">马上注册</a></div>-->
    </div>
    <!--面板的底部-->
    <!--<div class="panel-footer">-->
    <!--    <span>社交账号登录:</span>-->
    <!--    <img src="images/user.png">-->
    <!--    <img src="images/user.png">-->
    <!--    <img src="images/user.png">-->
    <!--</div>-->
</div>
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script>

    var _doLogin = '<?=site_url('login/dologin')?>';
    $(function(){
        // 登录
        $("#login-btn").click(function(){
            var usesName = $("#user_name").val();
            var password = $("#password").val();
            $.ajax({
                type: "post",
                url: _doLogin,
                data: {"user_name":usesName,"password":password},
                success: function(res){
                    if(res.code==0){
                        window.location.href = '<?=base_url()?>';
                    }else{
                        alert(res.msg);
                    }
                }
            });
        });
        //
    });

</script>

</body>
</html>