<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graphview extends CI_Controller {

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
		$data['linename'] = $this->backoffice_model->getlinename();
	
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());	
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/view_menu.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_graphview.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/view_footer.php');
		$this->template->render();

	}

	public function showop(){
		header('Content-Type: application/json');
		$lineid = $_POST['lineid'];
		$res_found = $this->backoffice_model->getopname($lineid);
		
		echo json_encode($res_found);
	}

	public function showpartname(){
		header('Content-Type: application/json');
		$lineid = $_POST['lineid'];
		$res_found = $this->backoffice_model->getpartname($lineid);
		
		echo json_encode($res_found);
	}

	public function showprocessname(){
		header('Content-Type: application/json');
		$opid = $_POST['opid'];
		$res_found = $this->backoffice_model->getprocessname($opid);
		
		echo json_encode($res_found);
	}

	public function showpartnumber(){
		header('Content-Type: application/json');
		$nameid = $_POST['nameid'];
		$res_found = $this->backoffice_model->getpartnumber($nameid);
		
		echo json_encode($res_found);
	}

	public function showitemnumber(){
		header('Content-Type: application/json');
		$proid = $_POST['proid'];
		$res_found = $this->backoffice_model->getitemnumber($proid);
		
		echo json_encode($res_found);
	}

   public function getdata_json(){
		header('Content-Type: application/json');
		$mindate = $_POST['mindate'];
		$maxdate = $_POST['maxdate'];
		$res_found = $this->backoffice_model->qc_selectdate($mindate, $maxdate);
		echo json_encode($res_found);		
	}

	public function showqcdetails(){
		header('Content-Type: application/json');
		$lineid = $_POST['lineid'];
		$opid = $_POST['opid'];
		$partnameid = $_POST['partnameid'];
		$pronameid = $_POST['pronameid'];
		$partnumid = $_POST['partnumid'];
		$itemid = $_POST['itemid'];
		$mindate = $_POST['mindate'];
		$maxdate = $_POST['maxdate'];

		$res_found = $this->backoffice_model->getqcdetails($lineid, $opid, $partnameid, $pronameid, $partnumid, $itemid, $mindate, $maxdate);
		echo json_encode($res_found);		
	}


}
