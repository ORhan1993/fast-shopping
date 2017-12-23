<section class="content-header">
	<h1>Ürün Ekle</h1>
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
		
		<form action="<?php echo SITE_URL; ?>/user/urunEkle" method="post">
		<input type="hidden" name="state" value="state" />
			
          <div class="form-group has-feedback">
            <input type="text" class="form-control"   name="UrunAd" placeholder="Ürün Adı">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		  
		  <div class="form-group has-feedback">
            <input type="text" class="form-control"  name="UrunFiyat" placeholder="Ürün Fiyat">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		  
          <div class="form-group has-feedback">
            <input type="text"    class="form-control" name="UrunAciklama" placeholder="Ürün Açıklama" style="width:100%;">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		  
		  <div class="form-group has-feedback">
            <input type="text" class="form-control"  name="UrunAdet" placeholder="Ürün Adedi">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		  
          <div class="row">
           
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Ürün Ekle</button>
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