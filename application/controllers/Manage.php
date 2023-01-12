<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manage extends CI_Controller {
	 
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
	  $this->jquery_url = $this->config->item('jquery_url');

		$this->img_path = $this->image_url;

		$this->template->write('js_url', $this->js_url);
  	$this->template->write('css_url', $this->css_url);
		$this->template->write('asset_url', $this->asset_url);
		$this->template->write('image_url', $this->image_url);
		$this->template->write('jquery_url', $this->jquery_url);
		// ini_set('display_errors', 1);
		// error_reporting(E_ALL);
	}
	 
	public function index()
	{

		$this->backoffice_model->checksession();
		redirect('manage');	
					
	}
	public function Homepage() {
		$empcode = $_GET["empcode"];
		// echo $empcode;
		// exit();
		$data["data"] = $this->backoffice_model->modelGetName($empcode);
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());
    $this->template->write('page_title', 'TBKK | '.$setTitle.'');
		$this->template->write_view('page_menu', 'themes/'. $this->theme .'/Homepage/view_menu.php',$data);
		$this->template->write_view('page_header', 'themes/'. $this->theme .'/Homepage/view_header.php');
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/Homepage/view_home.php');
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/Homepage/view_footer.php');
		$this->template->render();
	}
	// public function Homepage2() {
	// 	$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());
  //   $this->template->write('page_title', 'TBKK | '.$setTitle.'');
	// 	$this->template->write_view('page_content', 'themes/'. $this->theme .'/Homepage/view_Homepage.php');
	// 	$this->template->render();
	// }

	

	
		
	}



	

