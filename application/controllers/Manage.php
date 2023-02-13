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
		if($reseditmenuname == "true"){
			$reseditsubmenuname = $this->backoffice_model->editNameSubMenuWeb($IDeditSubMenuName,	$submenuname, $empcodeadmin);
			echo $reseditsubmenuname;
		}	else{
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
	public function AddManageUserApp (){
		$empcodeadmin = $this->session->userdata("empcode");
		$addempcodeapp = $_POST["addempcodeapp"];
		$addnameapp = $_POST["addnameapp"];
		$addgrouppermissionapp = $_POST["addgrouppermissionapp"];
		$addpathpicapp = $_POST["addpathpicapp"];
		$rsadduserapp = $this->backoffice_model->addManageUserApp($addempcodeapp,$addnameapp,$addgrouppermissionapp,$addpathpicapp,$empcodeadmin);
		echo $rsadduserapp;
	}

	public function getDataManageUserAppUser()
	{
		$ss_id = $_GET["ss_id"];
		$res["getdataEdit"] = $this->backoffice_model->GetDataEditUserApp($ss_id);
		$res["PermissionAll"] = $this->backoffice_model->getTableGroupPermissionApp();
		 echo json_encode($res);
	}
	public function EditManageUserApp(){
		$empcodeadmin = $this->session->userdata("empcode");
		$IDedituserapp = $_GET["IDedituserapp"];
		$editempcodeuserapp = $_GET["editempcodeuserapp"];
		$editnameapp = $_GET["editnameapp"];
		$editgrouppermissionuserapp = $_GET["editgrouppermissionuserapp"];
		$editpathpicapp = $_GET["editpathpicapp"];		

		$resedituserapp = $this->backoffice_model->editManageUserApp($IDedituserapp,$editempcodeuserapp,$editnameapp,$editgrouppermissionuserapp,$editpathpicapp,$empcodeadmin);
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

		$updatenameper = $this->backoffice_model->modelUpdateNamePermissionApp($editnameper,$id);

		if ($updatenameper == "true") {
			
			$checkInsertEditper = $this->backoffice_model->modelcheckInsertdataEditPerApp($id,$dropdowneditmenu);
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
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/AdminApp/view_ManageMenuApp.php',$data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/Web/view_footer.php');
		$this->template->render();
	}

	public function AddManageMenuApp()
	{
		$empcodeadmin = $this->session->userdata("empcode");
		$addmenuappname = $_POST["addmenuappname"];
		$addmenupathapp = $_POST["addmenupathapp"];
		$addmenupicapp = $_POST["addmenupicapp"];

		$rsaddmenuapp =  $this->backoffice_model->modelAddMenuApp($addmenuappname,$addmenupathapp,$addmenupicapp,$empcodeadmin);
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

		$rseditmenuapp = $this->backoffice_model->modelEditMenuApp($editmenuappid,$editmenuappname,$editmenupathapp,$editmenupicapp,$empcodeadmin);

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
		$rsaddchecktype = $this->backoffice_model->modelAddCheckType($addparttypename,$empcodeadmin);
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

		$rseditchecktype = $this->backoffice_model->modelEditCheckType($IDeditparttype,$editparttypeName,$empcodeadmin);

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
		$rsaddstatus = $this->backoffice_model->modelAddStatus($addstatusname,$empcodeadmin);
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

		$rseditcheckStatus = $this->backoffice_model->modelEditCheckStatus($IDeditStatusName,$editStatusName,$empcodeadmin);

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
		$rsinspection = $this->backoffice_model->modelAddInspection($addinspectiontype,$empcodeadmin);
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

		$rseditinspection = $this->backoffice_model->modelEditInspection($IDeditInspectionName,$editInspectionName,$empcodeadmin);

		echo $rseditinspection;

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
