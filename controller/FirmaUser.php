<?php

class FirmaUser extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function login(){
		if(isset($_POST["state"]))
		{
			$email=$_POST["eposta"];
			$parola=$_POST["parola"];
			
			$model=$this->load->model("index");
			$sorgula=$model->sorgula("select * from firmauye where FirmaEposta='$email' && FirmaSifre='$parola'");
			$toplam=count($sorgula);
			if($toplam>0)
			{
				$username="";
				foreach($sorgula as $value)
				{
					$username = $value["FirmaAd"];
				}
				$_SESSION["username"] = $username;
				header("Location:".SITE_URL."/FirmaUser/panel");	
			}else{
				$data["mesaj"]="Kullanıcı Adı Veya Parola Hatalı!";
			}
			
			$this->load->view("FirmaPanel/FirmaUserLogin",$data);
		}else{
			$this->load->view("FirmaPanel/FirmaUserLogin");
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