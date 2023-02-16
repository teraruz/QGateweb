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
		$setTitle = "QG | Homepage";
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', $setTitle . '');
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

		$setTitle = "QG | Profile";
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["getplant"] = $this->backoffice_model->modelGetPhase();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', $setTitle . ' ');
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
		$setTitle = "QG | Change Password";
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Setting/view_ChangePassword.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Administartor WEB *************************************
	public function ManageUserWeb()
	{
		$setTitle = "QG | Management User Web";
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["tableUserWeb"] = $this->backoffice_model->gettableUserWeb();
		$data["groupper"] = $this->backoffice_model->getTableGroupPermission();
		$data["getplant"] = $this->backoffice_model->modelGetPhase();
		$menu["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', $setTitle . ' ');
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

		$rs = $this->backoffice_model->UpdateUserWeb($empcode, $firstname, $lastname, $email, $groupper, $plant, $empcodeadmin);
		echo $rs;
	}


	//  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function ManagePermisionWeb()
	{
		$setTitle = "QG | Management Group Permission";
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["tablePermissionWeb"] = $this->backoffice_model->getTableManagePermissionWeb();
		$data["getmenu"] = $this->backoffice_model->modelGetMenu();
		$data["getsubmenu"] = $this->backoffice_model->modelGetSubmenu();
		$data["getpermissiondetail"] = $this->backoffice_model->modelGetPermissionDetail();
		$data["tabledetail"] = $this->backoffice_model->getTableDetailPermission();
		$menu["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', $setTitle . ' ');
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
					if ($value == " " || empty($value)) {
						// return "false";
					} else {
						$rsaddpermissiondetail = $this->backoffice_model->insertPermissionDetailWeb($permissionwebnameconvert, $value, $empcodeadmin);
					}
				}
				echo $rsaddpermissiondetail;
			} else {
				echo  "false";
			}
		} else {
			echo "false";
		}
	}
	public function EditManagePermissionWeb()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$id = $_POST["idper"];
		$editnameper = $_POST["editPermissionwebname"];
		$dropdowneditsubmenu = $_POST["dropdowneditsubmenuper"];

		$updatenameper =  $this->backoffice_model->modelUpdateNamePermission($editnameper, $id);

		if ($updatenameper == "true") {
			$checkInsertEditsubper = $this->backoffice_model->modelcheckInsertdataEditPer($id, $dropdowneditsubmenu);

			if ($checkInsertEditsubper == "true") {

				$InsertSubPer =   $this->backoffice_model->modelInsertdataEditper($id, $dropdowneditsubmenu, $empcodeadmin);
				echo $InsertSubPer;
			} else {
				return "false";
			}
		}
	}
	public function loadSubMenu()
	{
		$menu = $_POST["dropdownmenuper"];

		$submenu = $this->backoffice_model->modelLoadSubMenu($menu);
		echo json_encode($submenu);
	}
	public function swiftStatusPermissionWeb()
	{
		$Perid = $_GET["spg_id"];
		$res = $this->backoffice_model->editStatusPermissionWeb($Perid);
		echo json_encode($res);
	}

	public function 	swiftStatusPermissionDetailWeb()
	{
		$detailid = $_GET["spd_id"];
		$res = $this->backoffice_model->editStatusPermissionDetailWeb($detailid);
		echo json_encode($res);
	}
	// ดึง menu และ submenu แสดงใน EditPermissionweb
	public function getDataEditPermissionWeb()
	{
		$spg_id = $_GET["spg_id"];
		$res = $this->backoffice_model->GetDataEditPermissionweb($spg_id);
		echo json_encode($res);
	}
	public function getMenuIDPermission()
	{
		$datadropdownmenuID = $_GET("datadropdownmenuID");
		$result = $this->backoffice_model->GetIDMenuEditPermissionweb($datadropdownmenuID);
		echo $result;
	}
	public function getDetailGroup()
	{
		$id = $_GET["spg_id"];
		// $id ="22";
		$res = $this->backoffice_model->detailGroupPermission($id);
		echo json_encode($res);

		// print_r($res);
	}



	//  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ MANAGE MENU WEB ++++++++++++++++++++++++++++++++++++
	public function ManageMenuWeb()
	{
		$setTitle = "QG | Management Menu Web";
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$data["tableMenuWeb"] = $this->backoffice_model->getTableManageMenuweb();
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminWeb/view_ManageMenuWeb.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function AddManageMenuWeb()
	{

		$menuname = $_POST["addmenuwebname"];
		$submenuname = $_POST["addsubmenuwebname"];
		$path = $_POST["addmenupath"];
		$icon = $_POST["addmenuicon"];
		$empcodeadmin = $this->session->userdata("empcode");



		$checkmenu = $this->backoffice_model->checkMenu($menuname);

		if ($checkmenu == "false") {
			$addmenuweb =  $this->backoffice_model->addMenuWeb($menuname, $empcodeadmin, $icon);

			$menunameconvertID = $this->backoffice_model->convert("sm_id", "sys_menu_web", "sm_name_menu = '$menuname'");

			if ($addmenuweb == "true") {
				$addsubmenu = $this->backoffice_model->addSubMenuWeb($menunameconvertID, $submenuname, $empcodeadmin, $path);
				echo $addsubmenu;
			} else {
				echo "false";
			}
		} else if ($checkmenu == "true") {

			$menunameconvertID = $this->backoffice_model->convert("sm_id", "sys_menu_web", "sm_name_menu = '$menuname'");
			$addSubmenuwitholdmenu = $this->backoffice_model->addSubMenuWeb($menunameconvertID, $submenuname, $empcodeadmin, $path);
			echo $addSubmenuwitholdmenu;
		} else {
			echo "false";
		}
	}

	public function swiftStatusMenuWeb()
	{
		$submenuid = $_GET["ssm_id"];
		$res = $this->backoffice_model->editStatusMenuWeb($submenuid);
		echo json_encode($res);
	}

	public function getDataManageMenuWeb()
	{
		$id = $_GET["ssm_id"];
		$res = $this->backoffice_model->GetDataEditMenuWeb($id);
		echo json_encode($res);
	}

	public function EditManageMenuWeb()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$menuname = $_POST["editMenuName"];
		$submenuname = $_POST["editSubMenuName"];
		$IDeditMenuName = $_POST["IDeditMenuName"];
		$IDeditSubMenuName = $_POST["IDeditSubMenuName"];

		$reseditmenuname = $this->backoffice_model->editNameMenuWeb($IDeditMenuName,	$menuname, $empcodeadmin);
		if ($reseditmenuname == "true") {
			$reseditsubmenuname = $this->backoffice_model->editNameSubMenuWeb($IDeditSubMenuName,	$submenuname, $empcodeadmin);
			echo $reseditsubmenuname;
		} else {
			echo "false";
		}
	}


	// ******************************** Administartor APP *******************************************
	// ------------------------------- Manage User App -----------------------------------------

	public function ManageUserApp()
	{
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["tableUserApp"] = $this->backoffice_model->getTableManageUserApp();
		$data["groupperapp"] = $this->backoffice_model->getTableGroupPermissionApp();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/view_ManageUserApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusUserApp()
	{
		$userappid = $_GET["ss_id"];
		$res = $this->backoffice_model->editStatusUserApp($userappid);
		echo json_encode($res);
	}
	public function AddManageUserApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addempcodeapp = $_POST["addempcodeapp"];
		$addnameapp = $_POST["addnameapp"];
		$addgrouppermissionapp = $_POST["addgrouppermissionapp"];
		$addpathpicapp = $_POST["addpathpicapp"];
		$rsadduserapp = $this->backoffice_model->addManageUserApp($addempcodeapp, $addnameapp, $addgrouppermissionapp, $addpathpicapp, $empcodeadmin);
		echo $rsadduserapp;
	}

	public function getDataManageUserAppUser()
	{
		$ss_id = $_GET["ss_id"];
		$res["getdataEdit"] = $this->backoffice_model->GetDataEditUserApp($ss_id);
		$res["PermissionAll"] = $this->backoffice_model->getTableGroupPermissionApp();
		echo json_encode($res);
	}
	public function EditManageUserApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDedituserapp = $_GET["IDedituserapp"];
		$editempcodeuserapp = $_GET["editempcodeuserapp"];
		$editnameapp = $_GET["editnameapp"];
		$editgrouppermissionuserapp = $_GET["editgrouppermissionuserapp"];
		$editpathpicapp = $_GET["editpathpicapp"];

		$resedituserapp = $this->backoffice_model->editManageUserApp($IDedituserapp, $editempcodeuserapp, $editnameapp, $editgrouppermissionuserapp, $editpathpicapp, $empcodeadmin);
		echo $resedituserapp;
	}

	// ---------------------------------- Manage Permission App ----------------------------------------
	public function ManagePermisionApp()
	{
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["getmenu"] = $this->backoffice_model->modelGetMenuApp();
		$data["tabledetail"] = $this->backoffice_model->getTableDetailPermissionApp();
		$data["tablePermissionApp"] = $this->backoffice_model->getTableManagePermissionApp();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/view_ManagePermisionApp.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function swiftStatusPermissionApp()
	{
		$PeridApp = $_GET["spg_id"];
		$res = $this->backoffice_model->editStatusPermissionApp($PeridApp);
		echo json_encode($res);
	}

	public function AddManagePermissionApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addPermissionappname = $_GET["addPermissionappname"];
		$dataMenuAppId = $_GET["dataMenuAppId"];
		$rscheckaddnameapp = $this->backoffice_model->checkAddNamePermissionApp($addPermissionappname);
		if ($rscheckaddnameapp == "true") {
			$rsaddnameperapp = $this->backoffice_model->insertPermissionApp($addPermissionappname, $empcodeadmin);
			$permissionappnameconvert = $this->backoffice_model->convert("spg_id", "sys_permission_group_app", "spg_name = '$addPermissionappname'");
			if ($rsaddnameperapp == "true") {
				foreach ($dataMenuAppId as $key => $value) {
					if ($value == " " || empty($value)) {
						// return "false";
					} else {
						$rsaddpermissiondetail = $this->backoffice_model->insertPermissionDetailApp($permissionappnameconvert, $value, $empcodeadmin);
					}
				}
				echo $rsaddpermissiondetail;
			} else {
				echo  "false";
			}
		} else {
			echo "false";
		}
	}
	public function getDetailGroupApp()
	{
		$id = $_GET["spg_id"];
		$res = $this->backoffice_model->detailGroupPermissionApp($id);
		echo json_encode($res);
	}

	public function 	swiftStatusPermissionDetailApp()
	{
		$detailid = $_GET["spd_id"];
		$res = $this->backoffice_model->editStatusPermissionDetailApp($detailid);
		echo json_encode($res);
	}

	public function getDataEditPermissionApp()
	{
		$spg_id = $_GET["spg_id"];
		$res = $this->backoffice_model->GetDataEditPermissionApp($spg_id);
		echo json_encode($res);
	}

	public function EditManagePermissionApp()
	{

		$id = $_REQUEST["idper"];
		$editnameper = $_REQUEST["editPermissionappname"];
		$dropdowneditmenu = $_REQUEST["dropdowneditmenu"];
		$empcodeadmin = $this->session->userdata("empcode");
		// echo $dropdowneditmenu;

		$updatenameper = $this->backoffice_model->modelUpdateNamePermissionApp($editnameper, $id);

		if ($updatenameper == "true") {

			$checkInsertEditper = $this->backoffice_model->modelcheckInsertdataEditPerApp($id, $dropdowneditmenu);
			// echo $checkInsertEditper;
			if ($checkInsertEditper == "true") {
				$InsertPer = $this->backoffice_model->modelInsertdataEditperApp($id, $dropdowneditmenu, $empcodeadmin);
				echo $InsertPer;
			} else {
				echo "false";
			}
		} else {
			echo "false";
		}
	}

	// --------------------------------------------- Manage Menu App ------------------------------------------

	public function ManageMenuApp()
	{
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		// $empcode = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["tableMenuApp"] = $this->backoffice_model->getTableManageMenuApp();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/view_ManageMenuApp.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function AddManageMenuApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addmenuappname = $_POST["addmenuappname"];
		$addmenupathapp = $_POST["addmenupathapp"];
		$addmenupicapp = $_POST["addmenupicapp"];

		$rsaddmenuapp =  $this->backoffice_model->modelAddMenuApp($addmenuappname, $addmenupathapp, $addmenupicapp, $empcodeadmin);
		echo $rsaddmenuapp;
	}

	public function swiftStatusMenuApp()
	{
		$MenuappId = $_GET["sm_id"];
		$res = $this->backoffice_model->editStatusMenuApp($MenuappId);
		echo json_encode($res);
	}

	public function getDataEditMenuApp()
	{
		$sm_id = $_GET["sm_id"];
		$res = $this->backoffice_model->GetDataEditMenuApp($sm_id);
		echo json_encode($res);
	}
	public function EditManageMenuApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$editmenuappid = $_POST["editmenuappid"];
		$editmenuappname = $_POST["editmenuappname"];
		$editmenupathapp = $_POST["editmenupathapp"];
		$editmenupicapp = $_POST["editmenupicapp"];

		$rseditmenuapp = $this->backoffice_model->modelEditMenuApp($editmenuappid, $editmenuappname, $editmenupathapp, $editmenupicapp, $empcodeadmin);

		echo $rseditmenuapp;
	}

	// ************************* Master Control *************************************
	public function MasterControl()
	{
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		// $empcode = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_masterControl.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control Check Type *************************************
	public function CheckType()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableChecktype"] = $this->backoffice_model->getTableCheckType();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlCheckType.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}
	public function AddCheckType()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addparttypename = $_POST["addparttypename"];
		$rsaddchecktype = $this->backoffice_model->modelAddCheckType($addparttypename, $empcodeadmin);
		echo $rsaddchecktype;
	}
	public function swiftStatusChecktype()
	{
		$CheckTypeId = $_GET["mct_id"];
		$res = $this->backoffice_model->editStatusCheckType($CheckTypeId);
		echo json_encode($res);
	}

	public function getDataEditCheckType()
	{
		$mct_id = $_GET["mct_id"];
		$res = $this->backoffice_model->GetDataEditCheckType($mct_id);
		echo json_encode($res);
	}
	public function EditCheckType()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditparttype = $_POST["IDeditparttype"];
		$editparttypeName = $_POST["editparttypeName"];

		$rseditchecktype = $this->backoffice_model->modelEditCheckType($IDeditparttype, $editparttypeName, $empcodeadmin);

		echo $rseditchecktype;
	}

	// ************************* Control Check Status *************************************
	public function CheckStatus()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableCheckStatus"] = $this->backoffice_model->getTableCheckStatus();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlCheckStatus.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusCheckStatus()
	{
		$StatusId = $_GET["mcs_id"];
		$res = $this->backoffice_model->editStatusCheckStatus($StatusId);
		echo json_encode($res);
	}

	public function AddStatus()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addstatusname = $_POST["addstatusname"];
		$rsaddstatus = $this->backoffice_model->modelAddStatus($addstatusname, $empcodeadmin);
		echo $rsaddstatus;
	}

	public function getDataEditCheckStatus()
	{
		$statusid = $_GET["mcs_id"];
		$res = $this->backoffice_model->GetDataEditCheckStatus($statusid);
		echo json_encode($res);
	}

	public function EditCheckStatus()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditStatusName = $_POST["IDeditStatusName"];
		$editStatusName = $_POST["editStatusName"];

		$rseditcheckStatus = $this->backoffice_model->modelEditCheckStatus($IDeditStatusName, $editStatusName, $empcodeadmin);

		echo $rseditcheckStatus;
	}

	// ************************* Control Inspection Type *************************************
	public function InspectionType()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableInspection"] = $this->backoffice_model->getTableInspection();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlInspectionType.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusInspection()
	{
		$InspectionId = $_GET["mit_id"];
		$res = $this->backoffice_model->editStatusInspection($InspectionId);
		echo json_encode($res);
	}

	public function AddInspection()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addinspectiontype = $_POST["addinspectiontype"];
		$rsinspection = $this->backoffice_model->modelAddInspection($addinspectiontype, $empcodeadmin);
		echo $rsinspection;
	}

	public function getDataEditInspection()
	{
		$inspectionid = $_GET["mit_id"];
		$res = $this->backoffice_model->getDataEditInspection($inspectionid);
		echo json_encode($res);
	}

	public function EditInspection()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditInspectionName = $_POST["IDeditInspectionName"];
		$editInspectionName = $_POST["editInspectionName"];

		$rseditinspection = $this->backoffice_model->modelEditInspection($IDeditInspectionName, $editInspectionName, $empcodeadmin);

		echo $rseditinspection;
	}

	// ************************* Control DMC Data *************************************
	public function  DMCData()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableDMC"] = $this->backoffice_model->getTableDMC();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlDMCData.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusDMC()
	{
		$dmcId = $_GET["mdd_id"];
		$res = $this->backoffice_model->editStatusDMC($dmcId);
		echo json_encode($res);
	}

	public function AddDMCData()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$adddmcname = $_POST["adddmcname"];
		$rsinspection = $this->backoffice_model->modelAddDMC($adddmcname, $empcodeadmin);
		echo $rsinspection;
	}

	public function getDataEditDMC()
	{
		$dmcid = $_GET["mdd_id"];
		$res = $this->backoffice_model->getDataEditDMC($dmcid);
		echo json_encode($res);
	}

	public function EditDMC()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditdmcname = $_POST["IDeditdmcname"];
		$editdmcname = $_POST["editdmcname"];

		$rseditdmc = $this->backoffice_model->modelEditDMC($IDeditdmcname, $editdmcname, $empcodeadmin);

		echo $rseditdmc;
	}
	// ************************* Control DMC Type *************************************
	public function  DMCType()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableDMCType"] = $this->backoffice_model->getTableDMCType();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlDMCType.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusDMCType()
	{
		$dmctypeId = $_GET["mdt_id"];
		$res = $this->backoffice_model->editStatusDMCType($dmctypeId);
		echo json_encode($res);
	}

	public function AddDMCType()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$adddmctypename = $_POST["adddmctypename"];
		$adddmcdigit = $_POST["adddmcdigit"];
		$rsadddmctype = $this->backoffice_model->modelAddDMCType($adddmctypename, $adddmcdigit, $empcodeadmin);
		echo $rsadddmctype;
	}

	public function getDataEditDMCType()
	{
		$dmctypeid = $_GET["mdt_id"];
		$res = $this->backoffice_model->getDataEditDMCType($dmctypeid);
		echo json_encode($res);
	}
	public function EditDMCType()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditdmctype = $_POST["IDeditdmctype"];
		$editdmctypename = $_POST["editdmctypename"];
		$editdmcdigit = $_POST["editdmcdigit"];

		$rseditdmctype = $this->backoffice_model->modelEditDMCType($IDeditdmctype, $editdmctypename, $editdmcdigit, $empcodeadmin);

		echo $rseditdmctype;
	}

	// ************************* Control FA Code *************************************
	public function  FACode()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableFACode"] = $this->backoffice_model->getTableFACode();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlFACode.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusFACode()
	{
		$facodeId = $_GET["mfcm_id"];
		$res = $this->backoffice_model->editStatusFACode($facodeId);
		echo json_encode($res);
	}

	public function AddFACode()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addfaline = $_POST["addfaline"];
		$addfaname = $_POST["addfaname"];
		$rsaddFACode = $this->backoffice_model->modelAddFACode($addfaline, $addfaname, $empcodeadmin);
		echo $rsaddFACode;
	}
	public function getDataEditFACode()
	{
		$facodeid = $_GET["mfcm_id"];
		$res = $this->backoffice_model->getDataEditFACode($facodeid);
		echo json_encode($res);
	}

	public function EditFACode()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditfacode = $_POST["IDeditfacode"];
		$editfaline = $_POST["editfaline"];
		$editfaname = $_POST["editfaname"];

		$rseditfacode = $this->backoffice_model->modelEditFACode($IDeditfacode, $editfaline, $editfaname, $empcodeadmin);

		echo $rseditfacode;
	}

	// ************************* Control Work Shift *************************************
	public function  WorkShift()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableWorkShift"] = $this->backoffice_model->getTableWorkShift();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlWorkShift.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusWorkShift()
	{
		$workshiftId = $_GET["mws_id"];
		$res = $this->backoffice_model->editStatusWorkShift($workshiftId);
		echo json_encode($res);
	}
	public function AddWorkShift()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addshift = $_POST["addshift"];
		$addstarttime = $_POST["addstarttime"];
		$addendtime = $_POST["addendtime"];

		$rsaddWorkShift = $this->backoffice_model->modelAddWorkShift($addshift, $addstarttime, $addendtime, $empcodeadmin);
		echo $rsaddWorkShift;
	}

	public function getDataEditWorkShift()
	{
		$workshiftId = $_GET["mws_id"];
		$res = $this->backoffice_model->getDataEditWorkShift($workshiftId);
		echo json_encode($res);
	}


	public function EditWorkShift()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditworkshift = $_POST["IDeditworkshift"];
		$editshift = $_POST["editshift"];
		$editstarttime = $_POST["editstarttime"];
		$editendtime = $_POST["editendtime"];

		$rseditworkshift = $this->backoffice_model->modelEditWorkShift($IDeditworkshift, $editshift, $editstarttime, $editendtime, $empcodeadmin);
		echo $rseditworkshift;
	}



	// ************************* Control Defect *************************************
	public function  Defect()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tableDefect"] = $this->backoffice_model->getTableDefect();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_controlDefect.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusDefect()
	{
		$defectId = $_GET["md_id"];
		$res = $this->backoffice_model->editStatusDefect($defectId);
		echo json_encode($res);
	}

	public function AddDefect()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$adddefectcode = $_POST["adddefectcode"];
		$adddefectnameth = $_POST["adddefectnameth"];
		$adddefectnameen = $_POST["adddefectnameen"];

		$rsaddDefect = $this->backoffice_model->modelAddDefect($adddefectcode, $adddefectnameth, $adddefectnameen, $empcodeadmin);
		echo $rsaddDefect;
	}


	public function getDataEditDefect()
	{
		$defectId = $_GET["md_id"];
		$res = $this->backoffice_model->getDataEditDefect($defectId);
		echo json_encode($res);
	}


	public function EditDefect()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditdefect = $_POST["IDeditdefect"];
		$editdefectcode = $_POST["editdefectcode"];
		$editdefectnameth = $_POST["editdefectnameth"];
		$editdefectnameen = $_POST["editdefectnameen"];

		$rseditdefect = $this->backoffice_model->modelEditDefect($IDeditdefect, $editdefectcode, $editdefectnameth, $editdefectnameen, $empcodeadmin);
		echo $rseditdefect;
	}

	// ************************* Control PartNumber *************************************
	public function PartNumber()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tablePartNo"] = $this->backoffice_model->getTablePartNo();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_partNumber.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}


	public function swiftStatusPartNo()
	{
		$partnoId = $_GET["mpn_id"];
		$empcodeadmin = $this->session->userdata("empcode");
		$res = $this->backoffice_model->editStatusPartNo($partnoId,$empcodeadmin);
		echo json_encode($res);
	}


	public function AddPartNo()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addpartnumber = $_POST["addpartnumber"];
		$addcuspartno = $_POST["addcuspartno"];
		$addlocationpart = $_POST["addlocationpart"];
		$adddmccheckpart = $_POST["adddmccheckpart"];

		$rsaddPartNo = $this->backoffice_model->modelAddPartNo($addpartnumber, $addcuspartno, $addlocationpart, $adddmccheckpart,$empcodeadmin);
		echo $rsaddPartNo;
	}

	public function getDataEditPartNo()
	{
		$partnoId = $_GET["mpn_id"];
		$res = $this->backoffice_model->getDataEditPartNo($partnoId);
		echo json_encode($res);
	}

	public function EditPartNumber()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditpartno = $_POST["IDeditpartno"];
		$editpartnumber = $_POST["editpartnumber"];
		$editcuspartno = $_POST["editcuspartno"];
		$editlocationpart = $_POST["editlocationpart"];
		$editdmccheckpart = $_POST["editdmccheckpart"];

		$rseditpartno = $this->backoffice_model->modelEditPartNo($IDeditpartno, $editpartnumber, $editcuspartno, $editlocationpart, $editdmccheckpart, $empcodeadmin);
		echo $rseditpartno;
	}

	// ************************* Control SelectPart *************************************
	public function SelectPart()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_selectPart.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Control PlantAdminWeb *************************************
	public function PlantAdminWeb()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tablePlantAdminWeb"] = $this->backoffice_model->getTablePlantAdminWeb();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_plantAdminWeb.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusPlantAdminWeb()
	{
		$plantwebId = $_GET["mpa_id"];
		$empcodeadmin = $this->session->userdata("empcode");
		$res = $this->backoffice_model->editStatusPlantAdminWeb($plantwebId,$empcodeadmin);
		echo json_encode($res);
	}

	public function AddPlantAdminWeb()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addplantwebphase = $_POST["addplantwebphase"];
		$addplantwebname = $_POST["addplantwebname"];
		$rsaddPlantweb = $this->backoffice_model->modelAddPlantAdminWeb($addplantwebphase, $addplantwebname, $empcodeadmin);
		echo $rsaddPlantweb;
	}

	public function getDataEditPlantAdminWeb()
	{
		$plantwebId = $_GET["mpa_id"];
		$res = $this->backoffice_model->getDataEditPlantWeb($plantwebId);
		echo json_encode($res);
	}

	public function EditPlantAdminWeb()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditplantweb = $_POST["IDeditplantweb"];
		$editplantwebphase = $_POST["editplantwebphase"];
		$editplantwebname = $_POST["editplantwebname"];

		$rseditplantweb = $this->backoffice_model->modelEditPlantAdminWeb($IDeditplantweb,$editplantwebphase,$editplantwebname,$empcodeadmin);
		echo $rseditplantweb;
	}



	// ************************* Control PlantAdminApp *************************************
	public function PlantAdminApp()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["tablePlantAdminApp"] = $this->backoffice_model->getTablePlantAdminApp();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_plantAdminApp.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusPlantAdminApp()
	{
		$plantappId = $_GET["mpa_id"];
		$empcodeadmin = $this->session->userdata("empcode");
		$res = $this->backoffice_model->editStatusPlantAdminApp($plantappId,$empcodeadmin);
		echo json_encode($res);
	}

	public function AddPlantAdminApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addplantadminappphase = $_POST["addplantadminappphase"];
		$addplantadminappname = $_POST["addplantadminappname"];
		$rsaddPlantapp = $this->backoffice_model->modelAddPlantAdminApp($addplantadminappphase, $addplantadminappname, $empcodeadmin);
		echo $rsaddPlantapp;
	}

	public function getDataEditPlantAdminApp()
	{
		$plantappId = $_GET["mpa_id"];
		$res = $this->backoffice_model->getDataEditPlantApp($plantappId);
		echo json_encode($res);
	}

	public function EditPlantAdminApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditplantapp = $_POST["IDeditplantapp"];
		$editplantappphase = $_POST["editplantappphase"];
		$editplantappname = $_POST["editplantappname"];

		$rseditplantapp = $this->backoffice_model->modelEditPlantAdminApp($IDeditplantapp,$editplantappphase,$editplantappname,$empcodeadmin);
		echo $rseditplantapp;
	}


	// ************************* Control ZoneAdmin *************************************
	public function ZoneAdmin()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["getzone"] = $this->backoffice_model->getZone();
		$data["tableZone"] = $this->backoffice_model->getTableZone();
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_zoneAdmin.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusZone()
	{
		$zoneId = $_GET["mza_id"];
		$empcodeadmin = $this->session->userdata("empcode");
		$res = $this->backoffice_model->editStatusZone($zoneId,$empcodeadmin);
		echo json_encode($res);
	}

	public function AddZone()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addnamezone = $_POST["addnamezone"];
		$addlinezone = $_POST["addlinezone"];
		
		$rsaddzone = $this->backoffice_model->modelAddZone($addnamezone, $addlinezone, $empcodeadmin);
		echo $rsaddzone;
	}

	public function getDataEditZone()
	{
		$zoneId = $_GET["mza_id"];
		$res = $this->backoffice_model->getDataEditZone($zoneId);
		echo json_encode($res);
	}

	public function EditZone()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$IDeditzone = $_POST["IDeditzone"];
		$editnamezone = $_POST["editnamezone"];
		$editlinezone = $_POST["editlinezone"];

		$rseditplantapp = $this->backoffice_model->modelEditZone($IDeditzone,$editnamezone,$editlinezone,$empcodeadmin);
		echo $rseditplantapp;
	}

	
	// ************************* Control stationAdmin *************************************
	public function stationAdmin()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$data["tableStation"] = $this->backoffice_model->getTableStation();
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_stationAdmin.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function swiftStatusStation()
	{
		$stationId = $_GET["msa_id"];
		$empcodeadmin = $this->session->userdata("empcode");
		$res = $this->backoffice_model->editStatusStation($stationId,$empcodeadmin);
		echo json_encode($res);
	}

	public function AddStation()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addtablestation = $_POST["addtablestation"];
		
		$rsaddstation = $this->backoffice_model->modelAddStation($addtablestation, $empcodeadmin);
		echo $rsaddstation;
	}

	public function getDataEditStation()
	{
		$stationId = $_GET["msa_id"];
		$res = $this->backoffice_model->getDataEditStation($stationId);
		echo json_encode($res);
	}

	// ************************* Defect Group *************************************
	public function DefectGroup()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php');
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_defectGroup.php');
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Config Detail *************************************
	public function ConfigDetail()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_configDetail.php',$data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}


	// ************************* DMC Type Detail *************************************
	public function dmcTypeDetail()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->modelShowMenu($empcode);
		$this->template->write('page_title', 'TBKK | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/Web/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/Web/view_header.php',$data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/Mastercontrol/view_dmcTypeDetail.php',$data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	// ************************* Management  *************************************
	public function QgateCheckData()
	{
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		// $empcode = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
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
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		// $empcode = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
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
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		// $empcode = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
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
		// 	$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		// 	$empcode = $this->session->userdata("empcode");

		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
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
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		// $empcode = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
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
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		// $empcode = $this->session->userdata("empcode");
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);

		$data["fullname"] = $data["ss_emp_fname"] . " " . $data["ss_emp_lname"];
		$data["id"] = $data["ss_id"];
		$data["empcode"] = $data["ss_emp_code"];
		$data["email"] = $data["ss_email"];
		$data["fname"] = $data["ss_emp_fname"];
		$data["lname"] = $data["ss_emp_lname"];
		$data["pic"] = $data["ss_pic"];
		$data["plant"] = $data["mpa_name"];
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
