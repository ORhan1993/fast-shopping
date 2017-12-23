<?php

class FirmaUser extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function registration(){
		
		if(isset($_POST["state"]))
		{
			$email=$_POST["firmaEposta"];
		    $ad=$_POST["firmaAd"];
			$adres=$_POST["firmaAdres"];
			$sifre=$_POST["firmaSifre"];
			$firmaTelefon=$_POST["firmaTelefon"];
			$table="firmauye";
			$dizi=array("FirmaAd"=>$ad,"FirmaAdres"=>$adres,"FirmaEposta"=>$email,"FirmaSifre"=>$sifre,"FirmaKullaniciAd"=>$email,"FirmaTelefon"=>$firmaTelefon);
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from firmauye where FirmaAd='$ad'");
			$toplam=count($sorgula);
			if($toplam>0)
			{
				$data["mesaj"]="Lütfen Farklı Firma Adı Deneyin";

			}
			else if($toplam==0)
			{
				$ekle=$model->ekle($table,$dizi);
				echo "üye kaydı yapıldı";
				$this->load->view("FirmaPanel/firmaUserLogin");
			}
			$this->load->view("FirmaPanel/registration",$data);			
		}
		else{
			//$this->load->view("FirmaPanel/registration");
		}
	}
	public function login()
	{
		if(isset($_POST["state"]))
		{
			$email=$_POST["eposta"];
			$parola=$_POST["parola"];
			$toplamSayi=$_POST["toplamSayi"];
			$captcha=$_POST["captcha"];
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from firmauye where FirmaEposta='$email' && FirmaSifre='$parola'");
			$toplam=count($sorgula);
			if ($toplamSayi==$captcha)
			{
				if($toplam>0)
				{
				
					$username="";
					foreach($sorgula as $value)
					{
					$username = $value["FirmaAd"];
					}
					$_SESSION["username"] = $username;
					header("Location:".SITE_URL."/FirmaUser/panel");	
			}
			else
			{
				$data["mesaj"]="Kullanıcı Adı Veya Parola Hatalı!";
			}
				}else
				{
					$data["mesaj"]="Sayıların Toplamı Hatalı!";
				}
				$this->load->view("FirmaPanel/FirmaUserLogin",$data);
			}else
			{
				$this->load->view("FirmaPanel/FirmaUserLogin");
			}
				
		}
		public function firmaProfilSil($mesaj=false)
	 {
		 if(isset($_POST["state"]))
		{
			$email=$_POST["firmaEposta"];
			$sifre=$_POST["firmaSifre"];
			$table="firmauye";
			$where="FirmaEposta='$email'";
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from firmauye where FirmaEposta='$email' and FirmaSifre='$sifre'");
			$toplam=count($sorgula);
			if($toplam==0)
			{
				
				$data["mesaj"]="Firma Bulunamadı";
		
			}
			else if ($toplam>0)
			{
				$sil=$model->sil($table,$where);
				$data["mesaj"]="Firma Silindi";
				$this->load->view("FirmaPanel/FirmaUserLogin",$data);
			}
				
		}
		
		 else
			{
				$this->load->view("FirmaPanelTasarimi/header");
				$this->load->view("FirmaPanel/firmaProfilSil");
				$this->load->view("FirmaPanelTasarimi/footer");
		 }
	 }
	 
	 public function firmaProfilGuncelle()
	 {
		 if(isset($_POST["state"]))
		{
			 
			 $email=$_POST["firmaEposta"];
		     $ad=$_POST["firmaAd"];
			 $adres=$_POST["firmaAdres"];
			 $sifre=$_POST["firmaSifre"];
			 $telefon=$_POST["firmaTelefon"];
			 $table="firmauye";
			 $where="FirmaEposta='$email'";
			 $dizi=array("FirmaAd"=>$ad,"FirmaAdres"=>$adres,"FirmaEposta"=>$email,"FirmaSifre"=>$sifre,"FirmaKullaniciAd"=>$email,"FirmaTelefon"=>$telefon);
			 $model=$this->load->model("index");
			 $guncelle=$model->guncelle($table,$dizi,$where);
			 $data["mesaj"]="Firma Güncellendi";
			 
				$this->load->view("FirmaPanelTasarimi/header");
				$this->load->view("FirmaPanel/firmaProfilGuncelle",$data);
				$this->load->view("FirmaPanelTasarimi/footer");
				
		 }
		 else
			{
				$model = $this->load->model("index");
				$data["sonuclar"] = $model->sorgula("select * from firmauye where firmaEposta='$email'");
				$this->load->view("FirmaPanelTasarimi/header");
				$this->load->view("FirmaPanel/firmaProfilGuncelle",$data);
				$this->load->view("FirmaPanelTasarimi/footer");
			}
		
		}

	 public function panel()
	 {
		 $this->load->view("FirmaPanelTasarimi/header");
		 $this->load->view("FirmaPanel/Dashboard");
		 $this->load->view("FirmaPanelTasarimi/footer");
		 
	 }
}
?>