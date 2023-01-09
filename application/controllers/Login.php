<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	 
	private $theme; 
	 
	public function __construct()
	{
		parent::__construct();

		## asset config
		$theme = $this->config->item('theme');
		$this->theme = $theme; 

		$this->asset_url = $this->config->item('asset_url');
		$this->js_url = $this->config->item('js_url');
		$this->css_url = $this->config->item('css_url');
		$this->image_url = $this->config->item('image_url');

		$this->img_path = $this->image_url;

		$this->template->write('js_url', $this->js_url);
  	$this->template->write('css_url', $this->css_url);
		$this->template->write('asset_url', $this->asset_url);
		$this->template->write('image_url', $this->image_url);
		// ini_set('display_errors', 1);
		// error_reporting(E_ALL);
	}
	 
	public function index()
	{

		$this->backoffice_model->checksession();
		redirect('manage');	
					
	}
	public function Account() {
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());
		
		$this->template->set_master_template('themes/'. $this->theme .'/Login/view_login.php');
		// $this->template->write_view('page_content', 'themes/'. $this->theme .'/view_login.php');
		$this->template->render();

		
		// $resLogin = $this->backoffice_model->modelCheckUser();
		// echo json_encode($resLogin);
	}
	// public function checkUser() {

	// 	$resLogin = $this->backoffice_model->modelCheckUser();
	// 	echo json_encode($resLogin);
		
	// }
	public function forgotpassword() {
		$this->template->set_master_template('themes/'. $this->theme .'/Login/view_forgotpassword.php');
		$this->template->render();
	}
	public function checkLogin() {
		$empcode = $_POST["empcode"];
		$password = $_POST["password"];
		$password_encoded = base64_encode($password);
    $rs = $this->backoffice_model->modelCheckLogin($empcode,$password_encoded);
		echo $rs;
	}
	public function Home(){
		$this->template->set_master_template('themes/'. $this->theme .'/Login/view_Homepage.php');
		$this->template->render();
	}
	public function cCheckEmail(){
		$email = $_POST["email"];
		$rs = $this->backoffice_model->modelCheckEmail($email);
		return $rs;
	}
	public function cSetNewPassword(){
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password_encoded = base64_encode($password);
		$res = $this->backoffice_model->modelSetPassword($email,$password_encoded);
		echo $res;
	}



	
}

?>