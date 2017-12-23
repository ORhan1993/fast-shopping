<section class="content-header">
	<h1>Profil Güncelle</h1>
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
		<?php
			foreach($sonuclar as $value)
			{
				$ad = $value["Ad"];
				$soyad = $value["Soyad"];
				$email=$value["Email"];
				$sifre=$value["Sifre"];
				//echo $ad." ".$soyad;
			}
			?>
		<form action="<?php echo SITE_URL;?>/user/kullaniciGuncelle" method="post">
		<input type="hidden" name="state" value="state" />
			
          <div class="form-group has-feedback">
            <input type="text" class="form-control"  value="<?php echo $ad; ?>" name="bireyselUyeAd" placeholder="Ad">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		  <div class="form-group has-feedback">
            <input type="text" class="form-control" value="<?php echo $soyad; ?>" name="bireyselUyeSoyad" placeholder="Soyad">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"  value="<?php echo $sifre; ?>" name="bireyselSifre" class="form-control" placeholder="Şifre" style="width:100%;">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  <div class="form-group has-feedback">
            <input type="text" class="form-control"  value="<?php echo $email; ?>" name="bireyselEposta" placeholder="E-mail Adresi">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="row">
           
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Güncelle</button>
            </div><!-- /.col -->
			
          </div>
		  <br/>
		</form>
			<?php
			if(isset($mesaj))
			{
				if($mesaj=="basarili")
				{
					echo "<div class='alert alert-success'>İşlem Başarıyla Tamamlandı!</div>";
				}else if($mesaj=="hatali")
				{
					echo "<div class='alert alert-danger'>Hatalı İşlem!</div>";
				}
			}
			?>
			
		</div>
	</div>
</section>