
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Welcome login后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="<?php echo WEB?>static/assets/css/reset.css">
        <link rel="stylesheet" href="<?php echo WEB?>static/assets/css/supersized.css">
        <link rel="stylesheet" href="<?php echo WEB?>static/assets/css/style.css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="page-container">
            <h1>Login</h1>
            <form action="" method="post">
                    <input type="hidden" value="<?php echo $admin_key?>" class="token_private_key" />
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="password" class="password" placeholder="Password">
                    <!--<input type="text" name="code" class="code" placeholder="验证码" style="width: 160px; float:left;">
                    <span id="code">
                    <img style="width:100px;height:42px;padding-top:26px" src="<?php /*echo ADMINAPI.'login/code?token_private_key='.$admin_key*/?>" class="code_pic"/>
                    </span>-->
                <button type="submit">登陆后台</button>
                <div class="error"><span>+</span></div>
            </form>

        </div>
        <div style="text-align:center">
        <div id="test">为了更好使用,请使用Chrome,IE10+,Firefox浏览器.</div>
        </div>
        <!-- Javascript -->
        <script src="<?php echo WEB?>static/assets/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo WEB?>static/assets/js/supersized.3.2.7.min.js"></script>
        <script src="<?php echo WEB?>static/assets/js/supersized-init.js"></script>
        <script src="<?php echo WEB?>static/js/layer/layer.js"></script>
        <script src="<?php echo WEB?>static/assets/js/scripts.js"></script>

    </body>
<script>
    $('.code_pic').click(function(){
            $('.code_pic').attr('src','<?php echo ADMINAPI.'login/code?token_private_key='.$admin_key.'&time='?>'+Math.random()+(new Date).getTime());
    });
</script>
<style>
    #test{
        background:#000000;
        margin:0 auto;
        margin-top:180px;
        filter:alpha(opacity=50); 
        -moz-opacity:0.5; 
        opacity:0.5;
        width:40%;
        height:35px;
        line-height: 35px;
        color: #FFFFFF;
    }
</style>
</html>