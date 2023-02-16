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
		$this->load->library('session');
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());
		$this->template->set_master_template('themes/'. $this->theme .'/Login/view_login.php');
		$this->template->render();

		
		// $resLogin = $this->backoffice_model->modelCheckUser();
		// echo json_encode($resLogin);
	}
	// public function checkUser() {

	// 	$resLogin = $this->backoffice_model->modelCheckUser();
	// 	echo json_encode($resLogin);
		
	// }
	public function forgotpassword() {
		$this->load->library('session');
		$this->template->set_master_template('themes/'. $this->theme .'/Login/view_forgotpassword.php');
		$this->template->render();
	}
	public function checkLogin() {
		$empcode = $_POST["empcode"];
		$password = $_POST["password"];
		$password_encoded = base64_encode($password);
    $resultCheckLogin = $this->backoffice_model->modelCheckLogin($empcode,$password_encoded);


		$data = $this->backoffice_model->modelCheckLoginSession($empcode,$password_encoded);
		if ($data == true) {
			$session_data = array(
				'id'=> $data['ss_id'],
				'empcode'=> $data['ss_emp_code'],
				'fname' => $data['ss_emp_fname'],
				'lname' => $data['ss_emp_lname'],
				'email' => $data['ss_email'],
				'plant' => $data['mpa_name'],
				'pic'=> $data['ss_pic'],
				'login' => "OK"
			);
			$this->session->set_userdata($session_data);
		}
		echo $resultCheckLogin;
		$id = $data['ss_id'];

        $checklog  = $this->backoffice_model->checklogin_id($id);
        if ($checklog == false) {
            $loginlog = $this->backoffice_model->insertlogin($id);
        } else {
            $null_logout = $checklog['lsa_logout_date'];

            if ($null_logout == null) {
                $checkMaxid = $this->backoffice_model->maxlogId($id);
                $insertlog = $this->backoffice_model->insertloginaddUpdate($id, $checkMaxid);
            } else {
                $loginlog = $this->backoffice_model->insertlogin($id);
            }
        }
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
	public function logout()
    {
        $ss_id = $_GET["id"];
        $checklog  = $this->backoffice_model->checklogin_id($ss_id);

        // echo json_encode($checklog);
        $data_status = $checklog["lsa_status"];

        $chmax = $this->backoffice_model->maxlogid($ss_id);
        // echo json_encode($data_status);
        if ($data_status == "0") {
            $res = $this->backoffice_model->loglogout($chmax);
            // echo $res;
        }

}
}
