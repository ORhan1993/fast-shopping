<?php

class user extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function registration(){
		
		if(isset($_POST["state"]))
		{
			$email=$_POST["bireyselEposta"];
		    $ad=$_POST["bireyselUyeAd"];
			$soyad=$_POST["bireyselUyeSoyad"];
			$sifre=$_POST["bireyselSifre"];
			$table="bireyseluye";
			$dizi=array("Ad"=>$ad,"Soyad"=>$soyad,"Email"=>$email,"Sifre"=>$sifre,"KullaniciAd"=>$email);
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from bireyseluye where Email='$email'");
			$toplam=count($sorgula);
			if($toplam>0)
			{
				$data["mesaj"]="Lütfen Farklı Kullanıcı Adı veya Email Deneyin";

			}
			else if($toplam==0)
			{
				//$this->load->view("memberRegistration/registration");
				//$model=$this->load->model("index");
				$ekle=$model->ekle($table,$dizi);
				echo "üye kaydı yapıldı";
				$this->load->view("KullaniciPanel/userLogin");
			}
			$this->load->view("KullaniciPanel/registration",$data);			
		}
		else{
			$this->load->view("KullaniciPanel/registration");
		}
	}
		
	public function login(){
		if(isset($_POST["state"]))
		{
			$email=$_POST["eposta"];
			$parola=$_POST["parola"];
			$toplamSayi=$_POST["toplamSayi"];
			$captcha=$_POST["captcha"];
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from bireyseluye where Email='$email' && Sifre='$parola'");
			$toplam=count($sorgula);
			if($toplamSayi==$captcha)
			{
				if($toplam>0 )
				{
					
					$username="";
					foreach($sorgula as $value)
					{
						$username = $value["Ad"]. " ".$value["Soyad"];
					}
					$_SESSION["username"] = $username;
					
					header("Location:".SITE_URL."/user/panel");	
					
				}
				else{
					$data["mesaj"]="Kullanıcı Adı Veya Parola Hatalı!";
					
				}
			}else
			{
				$data["mesaj"]="Sayıların Toplamı Hatalı!";
				
			}	
			$this->load->view("KullaniciPanel/userLogin",$data);
		}else{
			$this->load->view("KullaniciPanel/userLogin");
		}
     }
	 public function panel()
	 {
		 $this->load->view("KullaniciPanelTasarimi/header");
		 $this->load->view("KullaniciPanel/Dashboard");
		 $this->load->view("KullaniciPanelTasarimi/footer");
		 
	 }
	
	  public function profil_sil($mesaj=false)
	 {
		 if(isset($_POST["state"]))
		{
			$email=$_POST["bireyselEposta"];
			$sifre=$_POST["bireyselSifre"];
			$table="bireyseluye";
			$where="Email='$email'";
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from bireyseluye where Email='$email' and Sifre='$sifre'");
			$toplam=count($sorgula);
			if($toplam==0)
			{
				
				$data["mesaj"]="Kullanıcı Bulunamadı";
		
			}
			else if ($toplam>0)
			{
				$sil=$model->sil($table,$where);
				$data["mesaj"]="Kullanıcı Silindi";
				
			}
				
		}
		
		 if(isset($mesaj))
		 {
			 $data["mesaj"] = $mesaj;
		 }
		 $this->load->view("KullaniciPanelTasarimi/header");
		 $this->load->view("KullaniciPanel/ProfilSil",$data);
		 $this->load->view("KullaniciPanelTasarimi/footer");
	 }
	 
	 public function cikis()
	 {
		 session_destroy();
		 header("Location:".SITE_URL."/user/login");
	 }
	 
	public function kullaniciGuncelle()
	 {
		
		 
			
		 if(isset($_POST["state"])){
			 $email=$_POST["bireyselEposta"];
		    $ad=$_POST["bireyselUyeAd"];
			$soyad=$_POST["bireyselUyeSoyad"];
			$sifre=$_POST["bireyselSifre"];
			$table="bireyseluye";
			 $where="Email='$email'";
			 $dizi=array("Ad"=>$ad,"Soyad"=>$soyad,"Email"=>$email,"Sifre"=>$sifre,"KullaniciAd"=>$email);
			 $model=$this->load->model("index");
			 $guncelle=$model->guncelle($table,$dizi,$where);
			 $data["mesaj"]="Kullanıcı Güncellendi";
			 header("Location:".SITE_URL."/user/panel");	
				
		 }else{
			 $model = $this->load->model("index");
		 $data["sonuclar"] = $model->sorgula("select * from bireyseluye ");
		 $this->load->view("KullaniciPanelTasarimi/header");
		 $this->load->view("KullaniciPanel/kullaniciGuncelle",$data);
		 $this->load->view("KullaniciPanelTasarimi/footer");
		 }
	 }
	
	
	public function urunEkle()
	{
		if(isset($_POST["state"]))
		{
			$urunad=$_POST["UrunAd"];
			$urunfiyat=$_POST["UrunFiyat"];
			$urunAciklama=$_POST["UrunAciklama"];
			$urunAdet=$_POST["UrunAdet"];
			$table="bireyselurun";
			$dizi=array("UrunAd"=>$urunad,"UrunFiyat"=>$urunfiyat,"UrunAciklama"=>$urunAciklama,"UrunAdet"=>$urunAdet);
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from bireyselurun where UrunAd='$urunad'");
			$toplam=count($sorgula);
			
			if($toplam>0)
			{
				$data["mesaj"]="Lütfen Farklı Ürünü Deneyin";
				$this->load->view("KullaniciPanelTasarimi/header");
				$this->load->view("KullaniciPanel/UrunEkle",$data);
				$this->load->view("KullaniciPanelTasarimi/footer");
				

			}
			else if($toplam==0)
			{
				
				$ekle=$model->ekle($table,$dizi);
				if($ekle)
				{
					echo "ok";
				}
				else{
					echo "hatalı";
				}
				$data["mesaj"]= "ürün kaydı yapıldı";
				
				$this->load->view("KullaniciPanelTasarimi/header");
				$this->load->view("KullaniciPanel/UrunEkle",$data);
				$this->load->view("KullaniciPanelTasarimi/footer");
		
							
			}		
		}
		else
			{
				$this->load->view("KullaniciPanelTasarimi/header");
				$this->load->view("KullaniciPanel/UrunEkle");
				$this->load->view("KullaniciPanelTasarimi/footer");
			}
		
	}
}
?>