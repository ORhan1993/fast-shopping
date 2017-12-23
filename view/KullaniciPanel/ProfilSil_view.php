<section class="content-header">
	<h1>Profil Sil</h1>
</section>
<section class="content">
	<<div class="login-box">
      <div class="login-logo">
        <a href="javascript:void()"><b>Üye Silme Formu</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silinmek istenen kullanıcı e-postasını giriniz. </p>
        <form action="<?php echo SITE_URL; ?>/deleteuser/delete" method="post">
			<input type="hidden" name="state" value="state" />
    
		  <div class="form-group has-feedback">
            <input type="text" class="form-control" name="bireyselEposta" placeholder="E-mail Adresi">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="bireyselSifre" class="form-control" placeholder="Şifre" style="width:100%;">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
           
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Üye Sil</button>
            </div><!-- /.col -->
			
          </div>
		  <br/>
        </form>
		
	<br>
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