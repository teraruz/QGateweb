<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dataview extends CI_Controller {

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
		$mindate = $_POST['minDate'];
		$maxdate = $_POST['maxDate'];
		redirect('Dataview/manage/'.$mindate.'/'.$maxdate);
	}


    public function manage(){

		$data['str_validate'] = '';		
		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
        // $data['list_qc'] = $this->backoffice_model->qc_data();
		$data['mindate'] = '';
		$data['maxdate'] = '';
		$action = base64_decode($this->input->post('action'));
		$checkmin = $this->uri->segment(3);
		$checkmax = $this->uri->segment(4);

		if($checkmax != '' or $checkmin != ''){
			 $data['mindate'] = $this->uri->segment(3);
			 $data['maxdate'] = $this->uri->segment(4);
			if ($checkmax == ''){$checkmax = date('Y-m-d');}
			$data['list_qc'] = $this->backoffice_model->qc_selectdate($checkmin, $checkmax);
		}	
		else{
			$data['list_qc'] = $this->backoffice_model->qc_data();
        }
        
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_dataview.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}
	
	
    
    public function showfrom_date(){

		$data['str_validate'] = '';
		$checkSess = $this->backoffice_model->CheckSession();
        $this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
        $p['input'] = $this->input->post('datepick');
        $data['list_qc'] = $this->backoffice_model->qc_selectdate($p);
        if (!empty($data['list_qc'])){
            $data['list_qc'];
        }
        else{
            redirect('dataview/manage');
            
        }
        
        
        

		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_dataview.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();
	}

	public function edit(){

		$checkSess = $this->backoffice_model->CheckSession();
        //$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
		$data = $_POST['data'];
		$id = $_POST['qcid'];
		$this->backoffice_model->editqcdata($data, $id);
		$mindate = $_POST['minDate'];
		$maxdate = $_POST['maxDate'];
		
		redirect('Dataview/manage/'.$mindate.'/'.$maxdate);
	}


	public function delete_qc_detail($qcid){
		$checkSess = $this->backoffice_model->CheckSession();
		$result = $this->backoffice_model->deleteqcdetail($qcid);
		
		if ($result!=False) {
		
			$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-check"></i> <strong>ลบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Delete data success.</div>');
			redirect('Dataview/manage');
		}else{
			$this->session->set_flashdata('msgResponse','<div class="alert alert-danger fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-times"></i>
								<strong>Error!</strong><br />เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้ค่ะ <br />Error : Save data not found.</div>');
			redirect('Dataview/manage');
		}

	}

	public function checkall_data(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
		$mindate = $_POST['minDate'];
		$maxdate = $_POST['maxDate'];

		$qcid = $this->input->post('chk_qcid');
		$this->backoffice_model->num_check_data($qcid);

		$this->session->set_flashdata('msgResponse', '<div class="alert alert-success fade in"><button class="close" data-dismiss="alert">×</button><i class="fa-fw fa fa-check"></i> <strong>ตรวจสอบข้อมูลเรียบร้อยค่ะ </strong><br />Success : Enable data success.</div>');
		redirect('Dataview/manage/'.$mindate.'/'.$maxdate);	
	}

	public function select_data(){
		
		$checkSess = $this->backoffice_model->CheckSession();
		//$this->backoffice_model->CheckPermission($this->session->userdata('sessUsrId'));
		$mindate = $_POST['minDate'];
		$maxdate = $_POST['maxDate'];

		redirect('Dataview/manage/'.$mindate.'/'.$maxdate);	
	}



}
