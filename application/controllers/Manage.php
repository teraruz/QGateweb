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
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Setting/view_EditProfile.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function ConUpdateUser()
	{
		$empcode = $_GET["empcode"];
		$firstname = $_GET["firstname"];
		$lastname = $_GET["lastname"];
		$email = $_GET["email"];
		$plant = $_GET["plant"];
		$convertplant = $this->backoffice_model->convert("mpa_id", "mst_plant_admin_web", "mpa_name = '$plant'");
		$rs = $this->backoffice_model->modelUpdateDetailUser($empcode, $firstname, $lastname, $email, $convertplant);
		echo $rs;
	}
	public function ConChangePassword()
	{
		$empcode = $_POST["empcode"];
		$currentpass = $_POST["currentpass"];
		$newpass = $_POST["newpass"];
		$confirmpass = $_POST["confirmpass"];
		$password_encoded = base64_encode($currentpass);
		$checkcurrentpass = $this->backoffice_model->modelCheckCurrentPass($empcode, $password_encoded);

		if ($checkcurrentpass === "true") {
			if ($newpass == $confirmpass) {
				$confirmpass_encoded =  base64_encode($confirmpass);
				$rs = $this->backoffice_model->modelChangePass($empcode, $confirmpass_encoded);
				echo $rs;
			} else {
				echo "wow";
			}
		} else {
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
		$data["tableUserWeb"] = $this->backoffice_model->gettableUserWeb();
		$data["groupper"] = $this->backoffice_model->getTableGroupPermission();
		$data["getplant"] = $this->backoffice_model->modelGetPhase();
		$menu["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $menu);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb/view_manageUserWeb.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function swiftStatus()
	{
		$staffid = $_GET["ss_id"];

		$res = $this->backoffice_model->editStatus($staffid);
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
		if ($editemail !== " ") {
			$groupCon = $this->backoffice_model->convert("spg_id", "sys_permission_group", "spg_name ='$groupper'");
			$rs = $this->backoffice_model->saveEdit($empcode, $groupCon, $editemail);
			echo $rs;
		} else {
			echo "false";
		}
	}
	public function addManageUserWeb()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$empcode = $_POST["addempcode"];
		$firstname = $_POST["addfirstname"];
		$lastname = $_POST["addlastname"];
		$groupper = $_POST["addgroupper"];
		$email = $_POST["addemail"];
		$password = $_POST["addpassword"];
		$plant = $_POST["addplant"];
		$rscheck = $this->backoffice_model->checkUserAdd($empcode);
		if ($rscheck === "true") {
			$password_encoded = base64_encode($password);
			$rs = $this->backoffice_model->insertUserWeb($empcode, $firstname, $lastname, $email, $groupper, $password_encoded, $plant, $empcodeadmin);
			echo $rs;
		} else {
			echo $rscheck;
		}
	}
	public function getDataEditManageUserWeb()
	{
		$ss_id = $_GET["ss_id"];
		$res = $this->backoffice_model->GetDataEditUser($ss_id);
		echo json_encode($res);
	}
	public function saveEditUserWeb()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$empcode = $_POST["empcode"];
		$firstname = $_POST["editfirstname"];
		$lastname = $_POST["editlastname"];
		$groupper = $_POST["groupper"];
		$email = $_POST["editemail"];
		$plant = $_POST["editplant"];

		$rs = $this->backoffice_model->UpdateUserWeb($empcode,$firstname,$lastname,$email,$groupper,$plant,$empcodeadmin);
		echo $rs;
	}



	public function ManagePermisionWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["tablePermissionWeb"] = $this->backoffice_model->getTableManagePermissionWeb();
		$data["getmenu"] = $this->backoffice_model->modelGetMenu();
		$data["getsubmenu"] = $this->backoffice_model->modelGetSubmenu();
		$menu["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $menu);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb/view_ManagePermisionWeb.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function AddManagePermissionWeb()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$permissionwebname = $_GET["addPermissionwebname"];
		$dataSubMenuId = $_GET["dataSubMenuId"];
		$rscheckaddname = $this->backoffice_model->checkAddNamePermissionWeb($permissionwebname);
		if ($rscheckaddname == "true") {		
			$rsaddnameperweb = $this->backoffice_model->insertPermissionWeb($permissionwebname, $empcodeadmin);
			$permissionwebnameconvert = $this->backoffice_model->convert("spg_id", "sys_permission_group_web", "spg_name = '$permissionwebname'");
			if ($rsaddnameperweb == "true") {
				foreach ($dataSubMenuId as $key => $value) {
					$rsaddpermissiondetail = $this->backoffice_model->insertPermissionDetailWeb($permissionwebnameconvert, $value, $empcodeadmin);
				}
				echo  $rsaddpermissiondetail;
			}else {
				echo  "false";
			}
		} else {
			echo "false";
		}
	}
	public function swiftStatusPermissionWeb()
	{
		$Perid = $_GET["spg_id"];
		$res = $this->backoffice_model->editStatusPermissionWeb($Perid);
		echo json_encode($res);
	}
	// ดึง menu และ submenu แสดงใน EditPermissionweb
	public function getDataEditPermissionWeb()
	{
		$spg_id = $_GET["spg_id"];
		$res = $this->backoffice_model->GetDataEditPermissionweb($spg_id);
		echo json_encode($res);
	}
	public function getDataEditMenuPermissionWeb()
	{
		$spg_id = $_GET["spg_id"];
		$res = $this->backoffice_model->GetDataEditPermissionMenuweb($spg_id);
		echo json_encode($res);
	}


	public function ManageMenuWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$data["tableMenuWeb"] = $this->backoffice_model->getTableManageMenuweb();
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

	// ************************* Control Check Type *************************************
	public function CheckType()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlCheckType.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control Check Status *************************************
	public function CheckStatus()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlCheckStatus.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control Inspection Type *************************************
	public function InspectionType()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlInspectionType.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control DMC Data *************************************
	public function  DMCData()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlDMCData.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control DMC Type *************************************
	public function  DMCType()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlDMCType.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control FA Code *************************************
	public function  FACode()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlFACode.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control Work Shift *************************************
	public function  WorkShift()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlWorkShift.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control Defect *************************************
	public function  Defect()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlDefect.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control Detail *************************************
	public function Detail()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlDetail.php');
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
