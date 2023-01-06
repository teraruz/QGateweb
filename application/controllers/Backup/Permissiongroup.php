<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissiongroup extends CI_Controller {

	
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


		$sqlSel = "SELECT * FROM sys_permission_groups;";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		$data['list_permissiongroup'] = $recSel;

		$data['frmEdit'] = FALSE;

		$pgid = $this->uri->segment(3);
		if($pgid != ''){

			$sqlSel = "SELECT * FROM sys_permission_groups WHERE spg_id='{$pgid}';";
			$excSel = $this->db->query($sqlSel);
			$numSel = $excSel->num_rows();
			
			if($numSel != 0){
				
				$data['perDataEdit'] = $this->backoffice_model->ShowPermissionGroup($pgid);
				$data['frmEdit'] = TRUE;
			
			}else{ redirect('permissiongroup/manage'); }


		}

	
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_managepermissiongroup.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}

	public function add(){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='addPermissionGroup'){

			$p['name'] = $this->input->post('txt_name');
			$p['enable'] = trim($this->input->post('rad_status'));

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('txt_name', 'Permission name', 'trim|required');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');  
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');       																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('permissiongroup/manage');
								
			}else{# form_validation = TRUE

				$result = $this->backoffice_model->AddPermissionGroup($p['name'],$p['enable']);

				if($result!=FALSE){
					
					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Add data success.</div>');
					redirect('permissiongroup/manage');
					
				}else{
					

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Add data not found.</div>');
					redirect('permissiongroup/manage');
					
				}


			}

		}

	}



	public function edit($pgid){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='editPermissionGroup'){

			$p['key'] = $pgid;
			$p['usr'] = trim($this->input->post('txt_name'));
			$p['enable'] = $this->input->post('rad_status');

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('txt_name', 'Permission name', 'trim|required');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');  
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');        																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('permissiongroup/manage/'.$pgid);

								
			}else{# form_validation = TRUE

				$result = $this->backoffice_model->EditPermissionGroup($p['key'],$p['usr'],$p['enable']);


				if($result!=FALSE){

					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Save data success.</div>');
					redirect('permissiongroup/manage/'.$pgid);

				}else{

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
					redirect('permissiongroup/manage');
				}



			}

		}




	}


	public function delete($pgid){

		$result = $this->backoffice_model->DeletePermissionGroup($pgid);
			
		if($result!=FALSE){
				
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>ลบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
			redirect('permissiongroup/manage/');
			
		}else{
			
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
			redirect('permissiongroup/manage');
			
		}
	}



}

