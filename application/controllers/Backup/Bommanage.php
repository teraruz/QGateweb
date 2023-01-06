<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bommanage extends CI_Controller {

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

		 $checkSess = $this->backoffice_model->CheckSession();
		 $this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
		
		
		// $pgbxid = $this->uri->segment(4);
		$sqlLoadUser = "SELECT * FROM detail_bom;";
		$excLoadUser = $this->db->query($sqlLoadUser);
		$recLoadUser = $excLoadUser->result_array();
		$data['list_bom'] = $recLoadUser;
		// var_dump($data);
		// exit();
		$data['frmEdit'] = FALSE;
		/*var_dump($data['frmEdit']);*/
		

		$bomid = $this->uri->segment(3);

		if($bomid != ''){

			$sqlSel = "SELECT * FROM detail_bom WHERE bom_id='{$bomid}';";
			$query = $this->db->query($sqlSel);
			$result = $query->result_array();
			$numSel = $query->num_rows();

			// var_dump($temp);
			// exit();
				
			if($numSel!=0) {
				$data['bomDataEdit'] = $this->backoffice_model->ShowBom($bomid);
				/*var_dump($data['bomDataEdit']['comp_code']);
				exit();*/
				$data['frmEdit'] = TRUE;
				/*if($pgbxid != ''){
					$data['boxpartlistedit'] = $this->backoffice_model->ShowDetailpart($pgbxid);
				}*/

				
			}else{ redirect('bommanage/manage'); }
			/*var_dump($data['frmEdit']);
			exit();*/

		}
	
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_bommanage.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}



	public function add_unit(){

		$data['str_validate'] = '';

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$action = base64_decode($this->input->post('action'));

		if($action=='addUnit'){

			$p['COMP_ITEM_CD'] = $this->input->post('item_cd');
			$p['PARENT_ITEM_CD'] = $this->input->post('parent_cd');
			$p['enable'] = trim($this->input->post('rad_status'));

			

			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('item_cd', 'Item Code', 'trim|required');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');  
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');       																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('bommanage/manage');
								
			}else{# form_validation = TRUE

				$res_found = $this->backoffice_model->apisearch_bom($p['COMP_ITEM_CD'],$p['PARENT_ITEM_CD']);
				//$res_found = $this->backoffice_model->apisearch_bom($p['PARENT_ITEM_CD']);
				$res_dec = json_decode($res_found, TRUE);
				
				

				$result = $this->backoffice_model->AddBom($p['COMP_ITEM_CD'],$p['PARENT_ITEM_CD'],
					$res_dec[0]['PS_UNIT_DENOMINATOR'],$res_dec[0]['PS_UNIT_NUMERATOR'],$p['enable']);


				$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>เพิ่มข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
			
				redirect('bommanage/manage');

			}

		}

	}

		public function delete_bom($tid){

		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		$result = $this->backoffice_model->deleteBom($tid);
	
		if($result!=FALSE){
			
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>ลบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
			redirect('bommanage/manage/');	
		
		}else{
			
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถลบข้อมูลได้ค่ะ <br />Error : Delete data not found.</div>');
			redirect('bommanage/manage/');
			
		}
	}



	public function edit_bom(){


		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));

		/*$sid = $this->session->userdata('sessUsrId');*/
		$action = base64_decode($this->input->post('action'));


		if($action=='editBom'){
			$p['item_cd'] = trim($this->input->post('item_cd'));
			$p['temp_id'] = trim($this->input->post('temp_id'));
			$p['enable'] = $this->input->post('rad_status');



			$this->load->library('form_validation');	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />', '</div>');				
			
			$this->form_validation->set_rules('item_cd', 'Item Code', 'trim|required');
			$this->form_validation->set_rules("rad_status", "", "trim");
						
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาทำการตรวจสอบด้วยค่ะ');  
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบด้วยค่ะ %s');        																
			
			if($this->form_validation->run() == FALSE){
				
				$this->session->set_flashdata('msgError', validation_errors());
				redirect('bommanage/manage/');

								
			}else{# form_validation = TRUE

				$txtSearch = $p['item_cd'];

				$sqlLoadItem = "SELECT
								bom_id,
								comp_code,
								parent_code
								from detail_bom
								where comp_code = comp_code
								AND comp_code LIKE '$txtSearch%'
								";
				$excLoadItem = $this->db->query($sqlLoadItem);
				$recLoadItem = $excLoadItem->result_array();
				$selItem_CD = $recLoadItem;
				


				$result = $this->backoffice_model->EditBom($p['temp_id'], $p['item_cd'] ,$p['enable']);
				


				if($result!=FALSE){

					$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>บันทึกข้อมูลเรียบร้อยค่ะ </strong><br />Success : Save data success.</div>');
					redirect('bommanage/manage');

				}else{

					$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
					redirect('bommanage/manage');
				}



			}

		}

	}







}
