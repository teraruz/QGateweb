<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class manage extends CI_Controller
{

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

		// $empcode = $_GET["empcode"];
		// $data["data"] = $this->backoffice_model->modelGetName($empcode);


		// ini_set('display_errors', 1);
		// error_reporting(E_ALL);

	}

	public function index()
	{

		$this->backoffice_model->checksession();
		redirect('manage');
	}

	// ************************* Homepage *************************************
	public function Homepage()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");

		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Homepage/view_home.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function ShowMenu()
	{
		$empcode = $_GET["empcode"];

		$rs = $this->backoffice_model->modelShowMenu($empcode);
		echo $rs;
	}
//  ****************************** Profile ******************************************
public function EditProFile()
{
	$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Setting/EditProfile//view_EditProfile.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
}
public function ChangePassword()
{
	$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
	$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
	$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
	$this->template->write_view('page_content', 'themes/' . $this->theme . '/Setting/ChangePassword//view_ChangePassword.php');
	$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
	$this->template->render();
}

	// ************************* Administartor WEB *************************************
	public function ManageUserWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb//ManageuserWeb/view_manageUserWeb.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function ManagePermisionWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb//ManagePermisionWeb/view_ManagePermisionWeb.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function ManageMenuWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb//ManageMenuWeb/view_ManageMenuWeb.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Administartor APP *************************************

	public function ManageUserApp()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp//ManageuserApp/view_ManageUserApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function ManagePermisionApp()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp//ManagePermisionApp/view_ManagePermisionApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function ManageMenuApp()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/ManageMenuApp/view_ManageMenuApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Master Control *************************************
	public function MasterControl()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_masterControl.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}


// ************************* Management  *************************************
	public function QgateCheckData()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Management/QgateCheckData/view_QgateCheckData.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function NCNGData()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Management/NCNGData/view_NCNGData.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function AddMenuData()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Management/AddMenuData/view_AddMenuData.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Report  *************************************
	public function DailyReport()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Report/Daily/view_Daily.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function WeeklyReport()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Report/Weekly/view_Weekly.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function MonthlyReport()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Report/Monthly/view_Monthly.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	

}
