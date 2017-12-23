<!DOCTYPE html>
<html>
<head>
<title> Bireysel Üye Kayıt </title>
<meta charset="utf-8">
<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/admin_tasarim/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/admin_tasarim/dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/admin_tasarim/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/admin_tasarim/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<form action="<?php echo SITE_URL; ?>/memberRegistration/registration" method="post">
<input type="hidden" name="state" value="state" />
<div class="Uye-kayit">
<p class="login-box-msg">Lütfen bilgilerinizi giriniz.</p>
<div class="control-gruop">
<input type="text" name="bireyselUyeAd" placeholder="Adınız"/>
</div>
<div class="control-gruop">
<input type="text" name="bireyselUyeSoyad" placeholder="Soyadınız"/>
</div>
<div class="control-gruop">
<input type="text" name="bireyselEposta" placeholder="E-Posta"/>
</div>
<div class="control-gruop">
<input type="password" name="bireyselSifre" placeholder="Parola"/>
</div>
<div class="control-gruop">
<input type="submit" class="btn btn-primary btn-block btn-flat" value="Kayıt ol"/>
</div>
</div>
</form>
<?php 
	if(isset($mesaj))
	{
		echo "<center>".$mesaj."</center>";
	}
	if(isset($uye))
	{
		foreach($uye as $value)
		{
			echo $value["Ad"]." ".$value["Soyad"];
		}
	}
	?>
</body>
</html>