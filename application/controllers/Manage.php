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
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
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
	//  ****************************** setting ******************************************
	public function EditProFile()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["id"] = $this->session->userdata("id");
		$data["empcode"] = $this->session->userdata("empcode");
		$data["email"] = $this->session->userdata("email");
		$data["fname"] = $this->session->userdata("fname");
		$data["lname"] = $this->session->userdata("lname");
		$data["pic"] = $this->session->userdata("pic");
		$data["plant"] = $this->session->userdata("plant");
		$data["getplant"] = $this->backoffice_model->modelGetPhase();
		// print_r($data["getplant"]);
		// exit();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Setting/view_EditProfile.php',$data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function ConUpdateUser(){
		$empcode = $_GET["empcode"];
		$firstname = $_GET["firstname"];
		$lastname = $_GET["lastname"];
		$email = $_GET["email"];
		$plant = $_GET["plant"];
		$convertplant = $this->backoffice_model->convert("mpa_id","mst_plant_admin_web","mpa_name = '$plant'");
		$rs = $this->backoffice_model->modelUpdateDetailUser($empcode,$firstname,$lastname,$email,$convertplant);
		echo $rs;
	}
	public function ConChangePassword(){
		$empcode = $_POST["empcode"];
		$currentpass = $_POST["currentpass"];
		$newpass = $_POST["newpass"];
		$confirmpass = $_POST["confirmpass"];
		$password_encoded = base64_encode($currentpass);
		$checkcurrentpass = $this->backoffice_model->modelCheckCurrentPass($empcode,$password_encoded);
		
		if($checkcurrentpass === "true"){
			if($newpass == $confirmpass){
				$confirmpass_encoded =  base64_encode($confirmpass);
				$rs = $this->backoffice_model->modelChangePass($empcode,$confirmpass_encoded);
				echo $rs;
			}else{
				echo "wow";
			}
		}else{
			echo $checkcurrentpass;
		}
		
		
	}
	public function ChangePassword()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$data["empcode"] = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Setting/view_ChangePassword.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Administartor WEB *************************************
	public function ManageUserWeb()
	{
		$empcode = $this->session->userdata("empcode");
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$data["id"] = $this->session->userdata("id");
		$data["empcode"] = $this->session->userdata("empcode");
		$data["email"] = $this->session->userdata("email");
		$data["fname"] = $this->session->userdata("fname");
		$data["lname"] = $this->session->userdata("lname");
		$data["pic"] = $this->session->userdata("pic");
		$data["plant"] = $this->session->userdata("plant");
		$data["reUser"] = $this->backoffice_model->gettableUserWeb();

		$menu["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php' , $menu);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb/view_manageUserWeb.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function swiftStatus()
    {
        $empcode = $_GET["empcode"];
        $res = $this->backoffice_model->editStatus($empcode);
        echo json_encode($res);
    }
    public function ConEditManageUser()
    {
			$empcode = $_GET["empcode"];
        $res = $this->backoffice_model->modelEditUser($empcode);
        echo json_encode($res);
    }
    public function saveEdit()
    {
        $empcode = $_POST["empcode"];
        $groupper = $_POST["groupper"];
        $editemail = $_POST["editemail"];
        if ($editemail !==" ") {
            $groupCon = $this->backoffice_model->convert("spg_id", "sys_permission_group", "spg_name ='$groupper'");
            $rs = $this->backoffice_model->saveEdit($empcode, $groupCon, $editemail);
            echo $rs;
        } else {
            echo "false";
        }
    }
    public function addManageUser()
    {
        $empcode = $_POST["empcode"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $groupper = $_POST["groupper"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $plant = $_POST["plant"];
        $rscheck = $this->backoffice_model->checkUserAdd($empcode);
        if ($rscheck == "true") {
            $groupCon = $this->backoffice_model->convert("spg_id", "sys_permission_group", "spg_name ='$groupper'");
            $plantCon = $this->backoffice_model->convert("mpa_id", "mst_plant_admin", "mpa_name='$plant'");
            $password_md5 = md5($password);
            $rs = $this->backoffice_model->insertUser($empcode, $firstname, $lastname, $groupCon, $email, $password_md5, $plantCon);
            echo $rs;
        } else if ($rscheck == "false") {
            return "false";
        } else {
            return "false";
        }
    }

	public function ManagePermisionWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb/view_ManagePermisionWeb.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function ManageMenuWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb/view_ManageMenuWeb.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Administartor APP *************************************

	public function ManageUserApp()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/view_ManageUserApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function ManagePermisionApp()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/view_ManagePermisionApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function ManageMenuApp()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/view_ManageMenuApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Master Control *************************************
	public function MasterControl()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
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
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Management/view_QgateCheckData.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function NCNGData()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Management/view_NCNGData.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function ReturnPart()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Management/view_ReturnPart.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Report  *************************************
	public function DailyReport()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Report/view_Daily.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function WeeklyReport()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Report/view_Weekly.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function MonthlyReport()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Report/view_Monthly.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
}
