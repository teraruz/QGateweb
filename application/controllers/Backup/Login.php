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

	}
	 
	public function index()
	{
		
		$this->backoffice_model->checksession();
		redirect('manage');	
					
	}

	public function Account()
	{

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$action = base64_decode($this->input->post('action'));

		if ($action == 'login'){
			
			$this->load->helper('security'); 
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');
			$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('txt_pwd', 'Password', 'trim|required|alpha_numeric|xss_clean');
			
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');
			$this->form_validation->set_message('alpha_numeric', '%s ห้ามใช้ตัวอักษรอักขระพิเศษ'); 
			
			if ($this->form_validation->run() == FALSE){
				
				$data['str_validate'] = FALSE;
												
			}else{ 

				$usr = $this->input->post('txt_usr');
				$pwd = $this->input->post('txt_pwd');
				$usrData = $this->backoffice_model->Login($usr,$pwd);
								
				if($usrData['action'] != 'err') {
										
					$arrData = array('sessName'=> $usrData['firstname'], 'sessUsr'=> $usrData['username'], 'sessUsrId'=>$usrData['su_id'],'sessGroup'=>$usrData['sug_id'], 'sessLastacc'=> $usrData['last_access'], 'loggedIn' => "OK");				
					
					$this->session->set_userdata($arrData);
					redirect('login');


					

																		
				} else {
					
					if($usrData['value']=='b'){

						$this->session->set_flashdata('msg_error','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />แอคเคาท์นี้ถูกระงับ<br />Account is baned.</div>');
						
					}else{

						$this->session->set_flashdata('msg_error','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />รหัสผ่านไม่ถูกต้อง กรุณาทำการตรวจสอบข้อมูลอีกครั้งค่ะ <br />Invalid Account : Please check your account correctly.</div>');
					
					}
					redirect('login/account');
					
				}

			}
		}

		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());
		
		$this->template->set_master_template('themes/'. $this->theme .'/tpl_login.php');
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_login.php', $data);
		$this->template->render();
			
	}
	
}

?>