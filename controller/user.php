<?php

class user extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function login(){
		if(isset($_POST["state"]))
		{
			$email=$_POST["eposta"];
			$parola=$_POST["parola"];
			
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from bireyseluye where Email='$email' && Sifre='$parola'");
			$toplam=count($sorgula);
			if($toplam>0)
			{
				$username="";
				foreach($sorgula as $value)
				{
					$username = $value["Ad"]. " ".$value["Soyad"];
				}
				$_SESSION["username"] = $username;
				header("Location:".SITE_URL."/user/panel");	
			}else{
				$data["mesaj"]="Kullanıcı Adı Veya Parola Hatalı!";
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
}
?>