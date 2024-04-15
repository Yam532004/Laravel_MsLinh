<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="/source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="/source/assets/dest/css/style.css">
	<link rel="stylesheet" href="/source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="/source/assets/dest/css/huong-style.css">
</head>

<body>
    <!-- sentData được truyền từ app\Mail\SendMail.php -->
    @if(isset($sentData))
    <h1>{{ $sentData['title'] }}</h1>
    <p>{{ $sentData['body'] }}</p>
    @else
    <div class="row" style="height:300px; max-width: 500px; margin: auto;padding: 10px;">
        <div class="column">
            <div class="login-form">
                <form action='{{route('postInputEmail')}}' method='POST'>
                    @csrf
                    <h1>Reset mật khẩu</h1>
                    <div class="input-box">
                        <i></i>
                        <input name="txtEmail" type="text" placeholder="Nhập địa chỉ email của bạn để nhận mật khẩu mới" value="{{ isset($request->txtEmail)?$request->txtEmail:'' }}">
                        <span class="error"></span>
                    </div>
                    <div class="btn-box">
                        <input type='submit' value='Nhận mật khẩu' name="btnGetPassword" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif


</body>

</html>
<!-- 4. Tạo view giao diện cho người dùng nhập email để hệ thống gửi mail, views\emails\input-email.blade.php: -->