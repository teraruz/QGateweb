<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usergroup extends CI_Controller {

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
		
	}


	public function manage(){

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$sqlLoadUser = "SELECT * FROM sys_user_groups;";
		$excLoadUser = $this->db->query($sqlLoadUser);
		$recLoadUser = $excLoadUser->result_array();
		$data['list_usergroup'] = $recLoadUser;

		$data['frmEdit'] = FALSE;

		$ugid = $this->uri->segment(3);
		if($ugid != ''){

			$sqlSel = "SELECT * FROM sys_user_groups WHERE sug_id='{$ugid}';";
			$excSel = $this->db->query($sqlSel);
			$numSel = $excSel->num_rows();
			
			if($numSel != 0){

				$sqlPerG = "SELECT * FROM sys_permission_groups WHERE enable='1';";
				$data['excPerG'] = $this->db->query($sqlPerG);
				
				$sqlRule = "SELECT spg_id FROM sys_users_groups_permissions WHERE sug_id='{$ugid}';";
				$excRule = $this->db->query($sqlRule);
				
				$data['excRule'] = array();			
				foreach($excRule->result_array() as $r){
					
					array_push($data['excRule'], $r['spg_id']);   
				}
				
				$data['usrDataEdit'] = $this->backoffice_model->ShowUserGroup($ugid);
				$data['frmEdit'] = TRUE;
			
			}else{ redirect('usergroup/manage'); }

			


		}


		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_manageusergroup.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}

	public function add(){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='addUsergroup'){

			$p['name'] = $this->input->post('txt_name');
			$p['enable'] = trim($this->input->post('rad_status'));

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('txt_name', 'Usergroup name', 'trim|required');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');        																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('usergroup/manage');
								
			}else{# form_validation = TRUE

				$result = $this->backoffice_model->AddUserGroup($p['name'],$p['enable']);
				
				if($result!=FALSE){
						
					$sqlSel = "SELECT MAX(sug_id) AS sug_id FROM sys_user_groups;";
					$excSel = $this->db->query($sqlSel);
					$recSel = $excSel->result_array();
					
					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Add data success.</div>');
					redirect('usergroup/manage/'.$recSel[0]['sug_id']);
					
				}else{
					

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Add data not found.</div>');
					redirect('usergroup/manage');
					
				}


			}

		}

	}



	public function edit($ugid){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='editUsergroup'){

			$p['key'] = $ugid;
			$p['usr'] = trim($this->input->post('txt_name'));
			$p['rule'] = $this->input->post('chkRid');
			$p['enable'] = $this->input->post('rad_status');
			$p['saveapply'] = $this->input->post('btn_saveapply');

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('txt_name', 'Usergroup name', 'trim|required');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');        																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('usergroup/manage/'.$ugid);

								
			}else{# form_validation = TRUE

				$resultSaveapply = TRUE;
				$resultEdit = $this->backoffice_model->EditUserGroup($p['key'],$p['usr'],$p['enable']);
				$resultAddRule = $this->backoffice_model->AddRuleUserGroup($p['key'],$p['rule']);
									
				if($p['saveapply']=='T'){ 
				
					$resultSaveapply = $this->backoffice_model->AddRuleUserDefault($p['key']); 						
				
				}


				if($resultEdit!=FALSE && $resultAddRule!=FALSE && $resultSaveapply!=FALSE){

					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Save data success.</div>');
					redirect('usergroup/manage/'.$ugid);

				}else{

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
					redirect('usergroup/manage');
				}



			}

		}
	}

	public function delete($ugid){

		$result = $this->backoffice_model->DeleteUserGroup($ugid);
			
		if($result!=FALSE){
				
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>ลบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
			redirect('usergroup/manage/');
			
		}else{
			
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
			redirect('usergroup/manage');
			
		}
	}


}
