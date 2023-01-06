<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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


	public function add(){

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
		
		$action = base64_decode($this->input->post('action'));

		if($action=='addUser'){
			
			## Get Post Value
			$p['usr'] = $this->input->post('txt_usr');
			$p['pwd'] = base64_encode($this->input->post('txt_pwd'));
			$p['group'] = $this->input->post('sel_group');
			$p['fname'] = $this->input->post('txt_fname');
			$p['lname'] = $this->input->post('txt_lname');
			if($this->input->post('rad_sex')=='male'){ $p['sex'] = 'male';}
			if($this->input->post('rad_sex')=='female'){ $p['sex'] = 'female';}
			$p['email'] = $this->input->post('txt_email');

			/*$p['prjOption']=$this->input->post('prjOption');*/

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required|min_length[4]|max_length[16]');
			$this->form_validation->set_rules('txt_pwd', 'Password', 'trim|required|min_length[4]|max_length[16]');
			$this->form_validation->set_rules('sel_group', 'User Groups', 'is_natural_no_zero');
			$this->form_validation->set_rules('txt_fname', 'First name', 'trim|required');
			$this->form_validation->set_rules('txt_lname', 'Last name', 'trim|required');
			$this->form_validation->set_rules("rad_sex", "", "trim");
			$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');
			// $this->form_validation->set_rules('prjOption', 'Project select', 'trim|required');
			
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');
			$this->form_validation->set_message('alpha_numeric', '%s ห้ามใช้ตัวอักษรอักขระพิเศษ'); 
			$this->form_validation->set_message('min_length', '%s: ต้องกรอกไม่น้อยกว่า %s ตัวอักษร');
			$this->form_validation->set_message('max_length', '%s: ต้องกรอกไม่เกิน %s ตัวอักษร');
			$this->form_validation->set_message('valid_email', 'รูปแบบ Email ไม่ถูกต้อง');
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');        																
			
			if($this->form_validation->run() == FALSE){
				
				$data['str_validate'] = FALSE;
								
			}else{# form_validation = TRUE
				
				$lastId = $this->backoffice_model->addUser($p);

/*				if($lastId!=FALSE){	

					foreach ($p['prjOption'] as $value) {
						$result = $this->backoffice_model->addUserProject($lastId,$value);


					}
				}*/

				if($lastId != FALSE){					

					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Add data success.</div>');
					//redirect('user/edituser/rule/'.$result.'');
					redirect('user/manage');

				}else{

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Add data not found.</div>');
					redirect('user/add');	
				}				
				
			}
					
		}		
		
		$sqlSelG = "SELECT * FROM sys_user_groups WHERE sug_id<>'0' AND enable='1';";
		$data['excLoadG'] = $this->db->query($sqlSelG);

/*		$sqlSelPrj = "SELECT * FROM project WHERE enable='1' ORDER BY date_updated DESC ;";
		$excLoadPrj = $this->db->query($sqlSelPrj);
		$recLoadPrj = $excLoadPrj->result_array();
		$data['recLoadPrj'] = $recLoadPrj;*/

		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());

		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_adduser.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();
		
	}


	public function manage(){
		
		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
		
		if($this->session->userdata('sessUsr') == 'sadmin'){

			$sqlLoadUser = "SELECT su.*, sug.name AS group_name FROM sys_users AS su LEFT JOIN sys_user_groups AS sug ON su.sug_id = sug.sug_id;";
			$excLoadUser = $this->db->query($sqlLoadUser);

		}else{
			$sqlLoadUser = "SELECT su.*, sug.name AS group_name FROM sys_users AS su LEFT JOIN sys_user_groups AS sug ON su.sug_id = sug.sug_id WHERE su.sug_id<>'1' AND su.username<>'{$this->session->userdata('sessUsr')}';";
			$excLoadUser = $this->db->query($sqlLoadUser);
		}

		
		$recLoadUser = $excLoadUser->result_array();
		$data['list_user'] = $recLoadUser;


		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_manageuser.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();
	}

	public function edit($uid){

		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));		

		$action = base64_decode($this->input->post('action'));
		
		if($action=='editUser'){

			## Get Post Value
			$p['usr'] = $this->input->post('txt_usr');
			$p['pwd'] = base64_encode($this->input->post('txt_pwd'));
			$p['group'] = $this->input->post('sel_group');
			$p['fname'] = $this->input->post('txt_fname');
			$p['lname'] = $this->input->post('txt_lname');
			if($this->input->post('rad_sex')=='male'){ $p['sex'] = 'male';}
			if($this->input->post('rad_sex')=='female'){ $p['sex'] = 'female';}
			$p['email'] = $this->input->post('txt_email');

			$p['prjOption']=$this->input->post('prjOption');
									
			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			$this->form_validation->set_rules('txt_usr', 'Username', 'trim|required|min_length[4]|max_length[16]');
			
			if($this->input->post('txt_pwd') != ''){

				$this->form_validation->set_rules('txt_pwd', 'Password', 'trim|required|min_length[4]|max_length[16]');
			}
			
			$this->form_validation->set_rules('sel_group', 'User Groups', 'is_natural_no_zero');
			$this->form_validation->set_rules('txt_fname', 'First name', 'trim|required');
			$this->form_validation->set_rules('txt_lname', 'Last name', 'trim|required');
			$this->form_validation->set_rules("rad_sex", "", "trim");
			$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email');
			
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');
			$this->form_validation->set_message('alpha_numeric', '%s ห้ามใช้ตัวอักษรอักขระพิเศษ'); 
			$this->form_validation->set_message('min_length', '%s: ต้องกรอกไม่น้อยกว่า %s ตัวอักษร');
			$this->form_validation->set_message('max_length', '%s: ต้องกรอกไม่เกิน %s ตัวอักษร');
			$this->form_validation->set_message('valid_email', 'รูปแบบ Email ไม่ถูกต้อง');
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');        																
			
			if($this->form_validation->run() == FALSE){
				
				$data['str_validate'] = FALSE;
								
			}else{
				
				$result = $this->backoffice_model->editUser($uid, $p);
				
				if($result!=FALSE){	

					$delresult = $this->backoffice_model->delUserProject($uid);

					foreach ($p['prjOption'] as $value) {
						$result = $this->backoffice_model->addUserProject($uid,$value);
					}


					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Edit data success.</div>');
					redirect('user/manage');					

				}else{

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Edit data not found.</div>');
					redirect('user/edit/'.$uid.'');	
				}				
				
			}

		}
	
		$sqlLoadUser = "SELECT u.*, ug.name FROM sys_users AS u LEFT JOIN sys_user_groups AS ug ON ug.sug_id = u.sug_id WHERE u.su_id='{$uid}';";
		$excLoadUser = $this->db->query($sqlLoadUser);
		$recLoadUser = $excLoadUser->result_array();
		$data['recLoadUser'] = $recLoadUser[0];

		$sqlSelPrj = "SELECT * FROM project WHERE enable='1' ORDER BY date_updated DESC ;";
		$excLoadPrj = $this->db->query($sqlSelPrj);
		$recLoadPrj = $excLoadPrj->result_array();
		$data['recLoadPrj'] = $recLoadPrj;

		$sqlLoadProject = "SELECT up.*,pr.pr_name FROM user_project AS up LEFT JOIN project AS pr ON up.pr_id = pr.pr_id WHERE up.su_id='{$uid}';";
		$excLoadProject = $this->db->query($sqlLoadProject);
		$recLoadProject = $excLoadProject->result_array();
		$data['recLoadProjectSel'] = $recLoadProject;


		$sqlSelG = "SELECT * FROM sys_user_groups WHERE sug_id<>'1' AND enable='1';";
		$data['excLoadG'] = $this->db->query($sqlSelG);

		$data['uid'] = $uid;

		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());

		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_edituser.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();	

	}

	public function enable($uid){

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$result = $this->backoffice_model->enableUser($uid);
	
		if($result!=FALSE){
			
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>เปิดการใช้งานเรียบร้อยค่ะ </strong><br />Success : Enable data success.</div>');
			redirect('user/manage');	
		
		}else{
			
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถเปิดการใช้งานได้ค่ะ <br />Error : Enable data not found.</div>');
			redirect('user/manage');

		}
	}

	public function disable($uid){

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$result = $this->backoffice_model->disableUser($uid);
	
		if($result!=FALSE){
			
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>ระงับการใช้งานเรียบร้อยค่ะ </strong><br />Success : Disable data success.</div>');
			redirect('user/manage');	
		
		}else{
			
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถระงับการใช้งานได้ค่ะ <br />Error : Disable data not found.</div>');
			redirect('user/manage');

		}
	}

	public function delete($uid){

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$result = $this->backoffice_model->deleteUser($uid);
	
		if($result!=FALSE){
			
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>ลบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
			redirect('user/manage');	
		
		}else{
			
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ <br />Error : Delete data not found.</div>');
			redirect('user/manage');
			
		}
	}

	public function checkall_enable(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$uid = $this->input->post('chk_uid');
		
		$this->backoffice_model->num_enableUser($uid);
		$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>เปิดการใช้งานเรียบร้อยค่ะ </strong><br />Success : Enable data success.</div>');
		redirect('user/manage');
						
	}

	public function checkall_disable(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$uid = $this->input->post('chk_uid');

		$this->backoffice_model->num_disableUser($uid);
		$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>ระงับการใช้งานเรียบร้อยค่ะ </strong><br />Success : Disable data success.</div>');
		redirect('user/manage');
						
	}

	public function checkall_delete(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$uid = $this->input->post('chk_uid');
		
		$this->backoffice_model->num_deleteUser($uid);
		$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>ลบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
		redirect('user/manage');
						
	}

	public function rule($uid){
		
		$data['str_validate'] = '';
		$data['img_path'] = $this->img_path;

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));


		$action = base64_decode($this->input->post('action'));
		
		if($action=='saveRuleUser'){

			$p['rule'] = $this->input->post('chkRid');
						
			$resultAddRule = $this->backoffice_model->AddRuleUser($uid, $p['rule']);
		
			if($resultAddRule!=FALSE){

				$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>บันทึกสิทธิ์เรียบร้อยค่ะ </strong><br />Success : Save rule data success.</div>');
				redirect('user/rule/'.$uid);

			}else{

				$this->session->set_flashdata('msgResponse', '<div class="alert alert-danger fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>เกิดข้อผิดพลาด ไม่สามารถแก้ไขสิทธิ์ได้ค่ะ </strong><br />Error : Save rule data not found.</div>');
				redirect('user/manage/'.$uid);

			}


		}


		$sqlLoadUser = "SELECT u.*, ug.name, ug.sug_id FROM sys_users AS u LEFT JOIN sys_user_groups AS ug ON ug.sug_id = u.sug_id WHERE u.su_id='{$uid}';";
		$excLoadUser = $this->db->query($sqlLoadUser);
		$recLoadUser = $excLoadUser->result_array();
		$data['recLoadUser'] = $recLoadUser[0];


		$sqlPerG = "SELECT
					sp.sp_id,
					sp.`name`
					FROM
					sys_users_groups_permissions AS sugp 
					LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sugp.spg_id
					LEFT JOIN sys_permissions AS sp ON sp.spg_id = spg.spg_id
					WHERE
					spg.`enable`='1' AND sp.enable='1' AND sugp.sug_id='{$recLoadUser[0]['sug_id']}' ORDER BY sp.spg_id ASC
					;";
		$data['excPerG'] = $this->db->query($sqlPerG);

		
		$sqlOthRule = "SELECT sup.sp_id,sp.`name` FROM sys_users_permissions AS sup 
				LEFT JOIN sys_permissions AS sp ON sp.sp_id = sup.sp_id 
				WHERE sup.su_id='{$uid}' AND sup.sp_id NOT IN 
				(
					SELECT
					sp.sp_id
					FROM
					sys_users_groups_permissions AS sugp 
					LEFT JOIN sys_permission_groups AS spg ON spg.spg_id = sugp.spg_id
					LEFT JOIN sys_permissions AS sp ON sp.spg_id = spg.spg_id
					WHERE
					spg.`enable`='1' AND sp.enable='1' AND sugp.sug_id='{$recLoadUser[0]['sug_id']}'
				)
				;";
				
		$data['excOthRule'] = $this->db->query($sqlOthRule);


		$sqlRule = "SELECT sp_id FROM sys_users_permissions WHERE su_id='{$uid}';";
		$excRule = $this->db->query($sqlRule);
		
		$data['excRule'] = array();			
		foreach($excRule->result_array() as $r){
			
			array_push($data['excRule'], $r['sp_id']);   
		}


		$data['uid'] = $uid;

		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());

		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_ruleuser.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}

}

