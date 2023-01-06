<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends CI_Controller {

	
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


	public function index(){
		
	}

	public function manage(){

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));


		$sqlSel = "SELECT sp.*, spg.name AS groupName FROM sys_permissions AS sp LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sp.spg_id;";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		$data['list_permission'] = $recSel;
		
		$sqlSelG = "SELECT * FROM sys_permission_groups WHERE enable='1';";
		$data['excLoadG'] = $this->db->query($sqlSelG);


		$data['frmEdit'] = FALSE;

		$pid = $this->uri->segment(3);
		if($pid != ''){

			$sqlSel = "SELECT * FROM sys_permissions WHERE sp_id='{$pid}';";
			$excSel = $this->db->query($sqlSel);
			$numSel = $excSel->num_rows();
			
			if($numSel != 0){
				
				$data['perDataEdit'] = $this->backoffice_model->ShowPermission($pid);
				$data['frmEdit'] = TRUE;
			
			}else{ redirect('permission/manage'); }

			
		}



		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_managepermission.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}

	public function add(){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='addPermission'){

			$p['name'] = $this->input->post('txt_name');
			$p['cont'] = $this->input->post('txt_cont');
			$p['group'] = $this->input->post('sel_group');
			$p['enable'] = trim($this->input->post('rad_status'));

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('txt_name', 'Permission name', 'trim|required');
			$this->form_validation->set_rules('txt_cont', 'Controller/Method', 'trim|required');
			$this->form_validation->set_rules('sel_group', 'Permission Groups', 'is_natural_no_zero');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');  
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');       																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('permission/manage');
								
			}else{# form_validation = TRUE

				$result = $this->backoffice_model->AddPermission($p['name'],$p['enable'],$p['group'], $p['cont']);

				if($result!=FALSE){
						
					$sqlSel = "SELECT MAX(sug_id) AS sug_id FROM sys_user_groups;";
					$excSel = $this->db->query($sqlSel);
					$recSel = $excSel->result_array();
					
					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Add data success.</div>');
					redirect('permission/manage');
					
				}else{
					

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Add data not found.</div>');
					redirect('permission/manage');
					
				}


			}

		}

	}


	public function edit($pid){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='editPermission'){

			$p['key'] = $pid;
			$p['usr'] = trim($this->input->post('txt_name'));
			$p['cont'] = trim($this->input->post('txt_cont'));
			$p['group'] = $this->input->post('sel_group');
			$p['enable'] = $this->input->post('rad_status');

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('txt_name', 'Permission name', 'trim|required');
			$this->form_validation->set_rules('txt_cont', 'Controller/Method', 'trim|required');
			$this->form_validation->set_rules('sel_group', 'Permission Groups', 'is_natural_no_zero');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');  
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');        																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('permission/manage/'.$pid);

								
			}else{# form_validation = TRUE

				$result = $this->backoffice_model->EditPermission($p['key'],$p['usr'],$p['enable'],$p['group'],$p['cont']);


				if($result!=FALSE){

					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Save data success.</div>');
					redirect('permission/manage/'.$pid);

				}else{

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
					redirect('permission/manage');
				}



			}

		}




	}


	public function delete($pid){

		$result = $this->backoffice_model->DeletePermission($pid);
			
		if($result!=FALSE){
				
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>ลบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
			redirect('permission/manage/');
			
		}else{
			
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
			redirect('permission/manage');
			
		}
	}


}
