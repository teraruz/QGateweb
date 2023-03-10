<?php
class Backoffice_model extends CI_Model
{
	// *********************************LOGINPAGE *********************************************************
	public function modelCheckLogin($empcode, $password_encoded)
	{
		$sql = "SELECT * from sys_staff_web   WHERE ss_emp_code ='{$empcode}' AND ss_emp_password ='{$password_encoded}'";
		$res = $this->db->query($sql);
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0]['ss_status'];
		} else {
			return "false";
		}
	}
	public function modelCheckLoginGroup($empcode)
	{
		$sql = "SELECT sys_permission_group_web.spg_status  from sys_staff_web  INNER JOIN sys_permission_group_web ON sys_staff_web.spg_id = sys_permission_group_web.spg_id
		 WHERE ss_emp_code ='{$empcode}'";
		$res = $this->db->query($sql);
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0]['spg_status'];
		} else {
			return "false";
		}
	}
	public function modelCheckLoginSession($empcode, $password_encoded)
	{
		$sql = "SELECT * FROM sys_staff_web
		INNER JOIN mst_plant_admin_web  ON  sys_staff_web.mpa_id = mst_plant_admin_web.mpa_id 
		WHERE ss_emp_code ='{$empcode}' AND ss_emp_password ='{$password_encoded}'";
		$res = $this->db->query($sql);
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0];
		} else {
			return false;
		}
		// if (empty($row)) {
		// 	return "false";
		// } else {
		// 	return "true";
		// }
	}

	public function checklogin_id($id)
	{

		$sql = "SELECT * FROM log_staff_active_web WHERE ss_id = '{$id}' AND lsa_status = 0 ";
		$res = $this->db->query($sql);
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0];
		} else {
			return false;
		}
	}
	public function insertlogin($id)
	{
		$sql = "INSERT INTO log_staff_active_web(ss_id,lsa_login_date ) VALUES ('{$id}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);

		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function maxlogId($id)
	{
		$sql = "SELECT MAX(lsa_id) AS re_max from log_staff_active_web WHERE ss_id = '{$id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$ss = $row["0"]["re_max"];
		return $ss;
	}
	public function insertloginaddUpdate($id, $checkMaxid)
	{

		$sql = "INSERT INTO log_staff_active_web(ss_id,lsa_login_date ) VALUES ('{$id}',CURRENT_TIMESTAMP)
        UPDATE log_staff_active_web SET lsa_logout_date = CURRENT_TIMESTAMP , lsa_status = 1 WHERE lsa_id ='{$checkMaxid}'";
		$res = $this->db->query($sql);

		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	public function loglogout($chmax)
	{
		$sql = "UPDATE log_staff_active_web SET lsa_logout_date = CURRENT_TIMESTAMP , lsa_status = 1 WHERE lsa_id ='{$chmax}'";
		$res = $this->db->query($sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	// ******************** FORGOTPASSWORD *********************************************************
	public function modelCheckEmail($email)
	{
		$sql = "select * from sys_staff_web where ss_email ='{$email}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if (empty($row)) {
			return "false";
		} else {
			return "true";
		}
	}
	public function modelSetPassword($email, $password_encoded)
	{
		$sql = "select * from sys_staff_web where ss_email ='{$email}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row == null) {
			return 'false';
		} else {
			$sql = "UPDATE sys_staff_web SET ss_emp_password = '{$password_encoded}' , ss_update_by = 'staff' ,  ss_update_date = CURRENT_TIMESTAMP
			WHERE ss_email = '{$email}'";
			$res = $this->db->query($sql);
			return 'true';
		}

		// ******************** GETNAMETOHOMEPAGE *********************************************************


	}
	public function modelGetName($empcode)
	{
		$sql = "select ss_emp_fname from sys_staff_web where ss_emp_code ='{$empcode}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	// *********************** SHOWMENU AND GET STAFF DATA***********************************************************************
	public function modelShowMenu($empcode)
	{
		$sql = "SELECT ss_id,ss_emp_code,ss_emp_fname,spg_name,sm_name_menu,ssm_name_submenu,ssm_method,sm_name_icon,mpa_phase_plant FROM sys_staff_web 
		INNER JOIN sys_permission_group_web ON sys_staff_web.spg_id=sys_permission_group_web.spg_id
		INNER JOIN sys_permission_detail_web ON sys_permission_group_web.spg_id = sys_permission_detail_web.spg_id
		INNER JOIN sys_submenu_web ON sys_permission_detail_web.ssm_id =sys_submenu_web.ssm_id
		INNER JOIN sys_menu_web ON sys_submenu_web.sm_id = sys_menu_web.sm_id
		INNER JOIN mst_plant_admin_web  ON  sys_staff_web.mpa_id = mst_plant_admin_web.mpa_id 
		
		WHERE  ss_emp_code = '{$empcode}' and  ssm_status = '1' and spd_status = '1' 
		ORDER BY sm_order_no , ssm_order_no";

		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	// *********************** getphasetoEditProfile ***********************************************************************

	public function modelGetPhase()
	{
		$sql = "select  mpa_id,mpa_phase_plant,mpa_name from mst_plant_admin_web ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	// *********************** UPDATEUSER IN EDITPROFILEPAGE ***********************************************************************

	public function convert($attr, $table, $condition)
	{
		$sql = "SELECT $attr FROM $table WHERE $condition";
		$query = $this->db->query($sql);
		$get = $query->result_array();
		if (empty($get)) {
			return "0";
		} else {
			return $get["0"][$attr];
		}
	}
	public function modelUpdateDetailUser($empcode, $firstname, $lastname, $email, $plant)
	{
		$sql = "UPDATE sys_staff_web 
		SET ss_emp_fname = '{$firstname}',ss_emp_lname= '{$lastname}',ss_email='{$email}',mpa_id= '{$plant}'
		,ss_update_by = '{$empcode}',ss_update_date = CURRENT_TIMESTAMP
		WHERE ss_emp_code = '{$empcode}'";
		$res = $this->db->query($sql);
		if (empty($res)) {
			return "false";
		} else {
			return "true";
		}
	}

	public function getname($empcode)
	{
		$sql = "SELECT * FROM sys_staff_web INNER JOIN mst_plant_admin_web ON sys_staff_web.mpa_id = mst_plant_admin_web.mpa_id
		WHERE ss_emp_code ='{$empcode}' ";
		$res = $this->db->query($sql);
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0];
		} else {
			return false;
		}
	}
	// ****************************************************** Change PAssword *******************************************
	public function modelCheckCurrentPass($empcode, $password_encoded)
	{
		$sql = "SELECT * FROM sys_staff_web WHERE ss_emp_code = '{$empcode}' AND ss_emp_password = '{$password_encoded}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if (empty($row)) {
			return "false";
		} else {
			return "true";
		}
	}

	public function modelChangePass($empcode, $confirmpass_encoded)
	{
		$sql = "UPDATE sys_staff_web SET ss_emp_password = '{$confirmpass_encoded}' WHERE ss_emp_code = '{$empcode}'";
		$res = $this->db->query($sql);
		if (empty($res)) {
			return "false";
		} else {
			return "true";
		}
	}
	// ************************************************ MANAGE USER WEB *********************************************************
	public function gettableUserWeb()
	{
		$sql = "SELECT ss_id,ss_emp_code,ss_emp_fname,ss_emp_lname,ss_email,spg_name,mpa_name,ss_status from sys_staff_web
		INNER JOIN mst_plant_admin_web ON sys_staff_web.mpa_id = mst_plant_admin_web.mpa_id
		INNER JOIN sys_permission_group_web ON sys_staff_web.spg_id = sys_permission_group_web.spg_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function editStatusUserWeb($staffid, $empcodeadmin)
	{
		$sql = "select ss_id,ss_emp_code,ss_status from sys_staff_web 
				INNER JOIN sys_permission_group_web ON sys_staff_web.spg_id = sys_permission_group_web.spg_id
				WHERE ss_id = '{$staffid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["ss_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_staff_web SET ss_status = 0 WHERE  ss_id = '{$staffid}'";
			$sqlupdate = "UPDATE sys_staff_web SET ss_update_by = '{$empcodeadmin}' , ss_update_date = CURRENT_TIMESTAMP
			WHERE ss_id = '{$staffid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_staff_web SET ss_status = 1 WHERE  ss_id = '{$staffid}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_staff_web SET ss_update_by = '{$empcodeadmin}' , ss_update_date = CURRENT_TIMESTAMP
			WHERE ss_id = '{$staffid}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function checkEmpUserAdd($empcode)
	{
		$sql = "select sys_staff_web.ss_emp_code from sys_staff_web WHERE sys_staff_web.ss_emp_code ='{$empcode}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "empduplicate";
		} else {
			return "true";
		}
	}
	public function checknameAdd($firstname, $lastname)
	{
		$sql = "select * from sys_staff_web WHERE sys_staff_web.ss_emp_fname ='{$firstname}' AND sys_staff_web.ss_emp_lname ='{$lastname}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "false"; //มี
		} else {
			return "true"; //ไม่มี
		}
	}
	public function checkEmailUserAdd($email)
	{
		$sql = "SELECT ss_email FROM sys_staff_web WHERE ss_email ='{$email}'";
		$res = $this->db->query($sql);
		// $row = $res->result_array();
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0]["ss_email"];
		} else {
			return "false";
		}
		// if (empty($res)) {
		// 	return "false";
		// } else {
		// 	return "true";
		// }
	}
	public function checkempcodeUserAdd($empcode)
	{
		$sql = "SELECT ss_emp_code FROM sys_staff_web WHERE ss_emp_code ='{$empcode}'";
		$res = $this->db->query($sql);
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0]["ss_emp_code"];
		} else {
			return "false";
		}
	}
	public function getTableGroupPermission()
	{
		$sql = "SELECT * FROM sys_permission_group_web";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function insertUserWeb($empcode, $firstname, $lastname, $email, $groupper, $password_encoded, $plant, $empcodeadmin)
	{
		// echo " empcode==> ".$empcode;
		// echo "  firstname==> ".$firstname;
		// echo "  lastname==> ".$lastname;
		// echo "  groupper==> ".$groupper;
		// echo "  email==> ".$email;
		// echo "  password==> ".$password_encoded;
		// echo "  plant==> ".$plant;
		// echo "  empcodeadmin==> ".$empcodeadmin;
		$sql = "INSERT INTO sys_staff_web (ss_emp_code,ss_emp_fname,ss_emp_lname,spg_id,ss_email,ss_emp_password,mpa_id,ss_create_by,ss_create_date)
		VALUES('{$empcode}','{$firstname}','{$lastname}','{$groupper}','{$email}','{$password_encoded}','{$plant}','{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if (empty($res)) {
			return "false";
		} else {
			return "true";
		}
	}
	public function GetDataEditUserWeb($ss_id)
	{
		$sql = "SELECT
		ss_id,
		ss_emp_code,
		ss_emp_fname,
		ss_emp_lname,
		spg.spg_id ,
		spg_name,
		ss_email,
		mpa.mpa_id ,
		mpa_name,
		ss_status
		FROM
			sys_staff_web ss
		INNER JOIN sys_permission_group_web spg ON ss.spg_id = spg.spg_id
		INNER JOIN mst_plant_admin_web mpa ON ss.mpa_id = mpa.mpa_id
		WHERE ss_id = '{$ss_id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function UpdateUserWeb($empcode, $firstname, $lastname, $email, $groupper, $plant, $empcodeadmin)
	{
		$sql = "UPDATE sys_staff_web SET ss_emp_code = '{$empcode}',ss_emp_fname = '{$firstname}',ss_emp_lname = '{$lastname}',ss_email = '{$email}' 
		,spg_id = '{$groupper}',mpa_id = '{$plant}' ,ss_update_by='{$empcodeadmin}',ss_update_date = CURRENT_TIMESTAMP
		WHERE ss_emp_code = '{$empcode}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	// ***************************** MANAGE PERMISSION WEB *****************************************
	public function getTableManagePermissionWeb()
	{
		$sql = "SELECT spg_id, spg_name, spg_status FROM  sys_permission_group_web";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function checkAddNamePermissionWeb($permissionwebname)
	{
		$sql = "SELECT spg_name FROM sys_permission_group_web WHERE spg_name = '{$permissionwebname}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "false";
		} else {
			return "true";
		}
	}
	public function insertPermissionWeb($permissionwebname, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_permission_group_web(spg_name, spg_create_by, spg_create_date)
		VALUES ('{$permissionwebname}', '{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	public function insertPermissionDetailWeb($idpermissionname, $valuesubmenu, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_permission_detail_web (spg_id, ssm_id, spd_create_by , spd_create_date)
		VALUES ('{$idpermissionname}','{$valuesubmenu}','{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	public function modelGetMenu()
	{
		$sql = "select  * from sys_menu_web";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function modelGetSubmenu()
	{
		$sql = "select  * from sys_submenu_web";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function editStatusPermissionWeb($Perid, $empcodeadmin)
	{
		$sql = "select * from sys_permission_group_web WHERE spg_id = '{$Perid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["spg_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_permission_group_web SET spg_status = 0 WHERE  spg_id = '{$Perid}'";
			$sqlupdate = "UPDATE sys_permission_group_web SET spg_update_by = '{$empcodeadmin}' , spg_update_date = CURRENT_TIMESTAMP
			WHERE  spg_id = '{$Perid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_permission_group_web SET spg_status = 1 WHERE  spg_id = '{$Perid}'";
			$sqlupdate = "UPDATE sys_permission_group_web SET spg_update_by = '{$empcodeadmin}' , spg_update_date = CURRENT_TIMESTAMP
			WHERE  spg_id = '{$Perid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function editStatusPermissionDetailWeb($detailid, $empcodeadmin)
	{
		$sql = "SELECT * FROM sys_permission_detail_web WHERE spd_id = '{$detailid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["spd_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_permission_detail_web SET spd_status = 0 WHERE  spd_id = '{$detailid}'";
			$sqlupdate = "UPDATE sys_permission_detail_web SET spd_update_by = '{$empcodeadmin}' , spd_update_date = CURRENT_TIMESTAMP
			WHERE  spd_id = '{$detailid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_permission_detail_web SET spd_status = 1 WHERE  spd_id = '{$detailid}'";
			$sqlupdate = "UPDATE sys_permission_detail_web SET spd_update_by = '{$empcodeadmin}' , spd_update_date = CURRENT_TIMESTAMP
			WHERE  spd_id = '{$detailid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function GetDataEditPermissionweb($spg_id)
	{
		$sql = "SELECT spg_id, spg_name FROM sys_permission_group_web WHERE spg_id = '{$spg_id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function editPermissionDetailWeb($permissionwebeditnameconvert, $value, $empcodeadmin)
	{
		$sql = "SELECT * from sys_permission_detail_web WHERE spd_id = '{$permissionwebeditnameconvert}' AND ssm_id = '{$value}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["spd_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_permission_detail_web SET spd_status = 0 WHERE  spd_id = '{$permissionwebeditnameconvert}'";
			$sql2 = "INSERT INTO sys_permission_detail_web (update_by,update_date) VALUES ('{$empcodeadmin}',CURRENT_TIMESTAMP)";
			$res = $this->db->query($sql);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_permission_detail_web SET spd_status = 1 WHERE  spd_id = '{$permissionwebeditnameconvert}'";
			$sql2 = "INSERT INTO sys_permission_detail_web (update_by,update_date) VALUES ('{$empcodeadmin}',CURRENT_TIMESTAMP)";
			$res = $this->db->query($sql);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function modelGetPermissionDetail()
	{
		$sql = "select  * from sys_permission_detail_web WHERE spd_status = '1'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelLoadSubMenu($menu)
	{
		$sql = "select * from sys_submenu_web
		INNER JOIN  sys_menu_web on sys_menu_web.sm_id = sys_submenu_web.sm_id
		WHERE sm_name_menu = '{$menu}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return json_encode($row);
	}
	public function detailGroupPermission($id)
	{
		$sql = "SELECT DISTINCT sys_menu_web.sm_id, sys_menu_web.sm_name_menu,sys_submenu_web.ssm_id,sys_submenu_web.ssm_name_submenu,sys_submenu_web.ssm_status,sys_permission_detail_web.spd_id,spd_status
		FROM sys_permission_detail_web 
		INNER JOIN sys_submenu_web ON sys_permission_detail_web.ssm_id = sys_submenu_web.ssm_id
		INNER JOIN sys_menu_web ON sys_submenu_web.sm_id = sys_menu_web.sm_id
		INNER JOIN sys_permission_group_web ON sys_permission_detail_web.spg_id = sys_permission_group_web.spg_id
		WHERE sys_permission_group_web.spg_id = '{$id}'
		ORDER BY sys_menu_web.sm_id ASC";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
		// print_r($res);
	}

	public function getTableDetailPermission()
	{
		$sql = "SELECT DISTINCT *
		FROM sys_permission_detail_web 
		INNER JOIN sys_submenu_web ON sys_permission_detail_web.ssm_id = sys_submenu_web.ssm_id
		INNER JOIN sys_menu_web ON sys_submenu_web.sm_id = sys_menu_web.sm_id
		INNER JOIN sys_permission_group_web ON sys_permission_detail_web.spg_id = sys_permission_group_web.spg_id
		ORDER BY sys_menu_web.sm_id ASC";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelUpdateNamePermission($editnameper, $id)
	{
		$sql = "UPDATE sys_permission_group_web SET spg_name = '{$editnameper}' WHERE spg_id = '{$id}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	public function modelcheckInsertdataEditPer($id, $dropdowneditsubmenu)
	{
		$sql = "SELECT * FROM sys_permission_detail_web WHERE spg_id = '{$id}' AND ssm_id = '{$dropdowneditsubmenu}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "false";
		} else {
			return "true";
		}
	}

	public function modelInsertdataEditper($id, $dropdowneditsubmenu, $empcodeadmin)
	{
		$sql = "INSERT INTO 
		sys_permission_detail_web (
		spg_id,
		ssm_id,
		spd_create_by,
		spd_create_date )
		VALUES('{$id}','{$dropdowneditsubmenu}','{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	// ***************************** MANAGE MENU WEB *****************************************
	public function getTableManageMenuweb()
	{
		$sql = "SELECT *
		FROM sys_menu_web
		ORDER BY sm_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function checkMenu($menuname)
	{
		$sql = "SELECT * FROM sys_menu_web WHERE sm_name_menu = '{$menuname}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "false";
		} else {
			return "true";
		}
	}

	public function checkDuplicateMenuName($addMenuName)
	{
		$sql = "SELECT * FROM sys_menu_web WHERE sm_name_menu = '{$addMenuName}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}
	public function checkDuplicateSubmenuName($submenuname, $path)
	{
		$sql = "SELECT * FROM sys_submenu_web WHERE ssm_name_submenu = '{$submenuname}' OR ssm_method = '{$path}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function addMenuWeb($addMenuName, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_menu_web (
			sm_name_menu,
			sm_create_by,
			sm_create_date
		)
		VALUES
			(
				'{$addMenuName}',
				'{$empcodeadmin}',
				CURRENT_TIMESTAMP
			)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function editMenuWeb($IDeditMenuName, $editMenuName, $empcodeadmin)
	{
		$sql = "UPDATE sys_menu_web 
		SET sm_name_menu = '{$editMenuName}' , sm_update_by = '{$empcodeadmin}' , sm_update_date = CURRENT_TIMESTAMP
		WHERE sm_id = '{$IDeditMenuName}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function addSubMenuWeb($IDdetailSubMenu, $submenuname, $path, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_submenu_web (
			sm_id,
			ssm_name_submenu,
			ssm_method,
			ssm_create_by,
			ssm_create_date
		)
		VALUES
			(
				'{$IDdetailSubMenu}',
				'{$submenuname}',
				'{$path}',
				'{$empcodeadmin}',
				CURRENT_TIMESTAMP
			)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function editStatusMenuWeb($menuid,  $empcodeadmin)
	{
		$sql = "SELECT * FROM sys_menu_web WHERE sm_id = '{$menuid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["sm_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_menu_web SET sm_status = 0 WHERE  sm_id = '{$menuid}'";
			$sqlupdate = "UPDATE sys_menu_web SET sm_update_by = '{$empcodeadmin}' , sm_update_date = CURRENT_TIMESTAMP
			WHERE  sm_id = '{$menuid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_menu_web SET sm_status = 1 WHERE  sm_id = '{$menuid}'";
			$sqlupdate = "UPDATE sys_menu_web SET sm_update_by = '{$empcodeadmin}' , sm_update_date = CURRENT_TIMESTAMP
			WHERE  sm_id = '{$menuid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function editStatusSubMenuWeb($submenuid,  $empcodeadmin)
	{
		$sql = "SELECT * FROM sys_submenu_web WHERE ssm_id = '{$submenuid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["ssm_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_submenu_web SET ssm_status = 0 WHERE  ssm_id = '{$submenuid}'";
			$sqlupdate = "UPDATE sys_submenu_web SET ssm_update_by = '{$empcodeadmin}' , ssm_update_date = CURRENT_TIMESTAMP
			WHERE  ssm_id = '{$submenuid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_submenu_web SET ssm_status = 1 WHERE  ssm_id = '{$submenuid}'";
			$sqlupdate = "UPDATE sys_submenu_web SET ssm_update_by = '{$empcodeadmin}' , ssm_update_date = CURRENT_TIMESTAMP
			WHERE  ssm_id = '{$submenuid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function GetDataEditMenuWeb($id)
	{
		$sql = "SELECT sm_id , sm_name_menu 
		FROM sys_menu_web 
		WHERE sm_id = '{$id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function GetDataEditSubmenuWeb($id)
	{
		$sql = "SELECT
		ssm_id,
		ssm_name_submenu,
		ssm_method
	FROM
		sys_submenu_web
	WHERE
		ssm_id = '{$id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editSubmenuWeb($IDEditdetailSubMenu, $editSubmenuWebName, $editMenuPath, $empcodeadmin)
	{
		$sql = "UPDATE sys_submenu_web 
		SET  ssm_name_submenu ='{$editSubmenuWebName}', ssm_method ='{$editMenuPath}' ,ssm_update_by = '{$empcodeadmin}' ,ssm_update_date = CURRENT_TIMESTAMP
		WHERE ssm_id = '{$IDEditdetailSubMenu}'";
		$res =  $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function detailMenuWeb($id)
	{
		$sql = "SELECT *
		FROM sys_submenu_web
		WHERE sm_id = '{$id}'
		ORDER BY ssm_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function getTableDetailSubmenu()
	{
		$sql = "SELECT *
		FROM sys_submenu_web
		ORDER BY ssm_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	// *************************************************** Manage User App ***************************************************
	public function getTableManageUserApp()
	{
		$sql = "SELECT * FROM sys_staff_app 
		INNER JOIN sys_permission_group_app ON sys_permission_group_app.spg_id =  sys_staff_app.spg_id";
		$res =  $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function getTableGroupPermissionApp()
	{
		$sql = "SELECT * FROM sys_permission_group_app WHERE spg_status = 1";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusUserApp($userappid, $empcodeadmin)
	{
		$sql = "SELECT * FROM sys_staff_app  WHERE ss_id = '{$userappid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["ss_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_staff_app SET ss_status = 0 WHERE  ss_id = '{$userappid}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_staff_app SET ss_update_by = '{$empcodeadmin}' , ss_update_date = CURRENT_TIMESTAMP
			WHERE  ss_id = '{$userappid}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_staff_app SET ss_status = 1 WHERE  ss_id = '{$userappid}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_staff_app SET ss_update_by = '{$empcodeadmin}' , ss_update_date = CURRENT_TIMESTAMP
			WHERE  ss_id = '{$userappid}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function checkUserApp($addempcodeapp, $addnameapp)
	{
		$sql = "SELECT ss_emp_code FROM sys_staff_app WHERE ss_emp_code ='{$addempcodeapp}' OR ss_emp_name ='{$addnameapp}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function addManageUserApp($addempcodeapp, $addnameapp, $addgrouppermissionapp, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_staff_app 
		(ss_emp_code, ss_emp_name, spg_id, ss_create_by, ss_create_date)
		VALUES ('{$addempcodeapp}','{$addnameapp}','{$addgrouppermissionapp}','{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function GetDataEditUserApp($ss_id)
	{
		$sql = "SELECT ss_id ,ss_emp_code, ss_emp_name, spg_name
		FROM sys_staff_app
		INNER JOIN sys_permission_group_app ON sys_staff_app.spg_id = sys_permission_group_app.spg_id
		WHERE ss_id ='{$ss_id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editManageUserApp($IDedituserapp, $editempcodeuserapp, $editnameapp, $editgrouppermissionuserapp, $empcodeadmin)
	{
		$sql = "UPDATE sys_staff_app
		SET ss_emp_code= '{$editempcodeuserapp}', ss_emp_name= '{$editnameapp}'
		,spg_id = '{$editgrouppermissionuserapp}', ss_update_by = '{$empcodeadmin}', ss_update_date = CURRENT_TIMESTAMP 
		WHERE ss_id = '{$IDedituserapp}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	// *************************************************** Manage Permission App ***************************************************

	public function getTableManagePermissionApp()
	{
		$sql = "SELECT spg_id, spg_name, spg_status FROM  sys_permission_group_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function modelGetMenuApp()
	{
		$sql = "SELECT * FROM  sys_menu_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusPermissionApp($PeridApp, $empcodeadmin)
	{
		$sql = "select * from sys_permission_group_app WHERE spg_id = '{$PeridApp}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["spg_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_permission_group_app SET spg_status = 0 WHERE  spg_id = '{$PeridApp}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_permission_group_app SET spg_update_by = '{$empcodeadmin}' , spg_update_date = CURRENT_TIMESTAMP
			WHERE  spg_id = '{$PeridApp}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_permission_group_app SET spg_status = 1 WHERE  spg_id = '{$PeridApp}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_permission_group_app SET spg_update_by = '{$empcodeadmin}' , spg_update_date = CURRENT_TIMESTAMP
			WHERE  spg_id = '{$PeridApp}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				if ($res) {
					return true;
				} else {
					return false;
				}
			} else {
				return  true;
			}
		}
	}

	public function checkAddNamePermissionApp($addPermissionappname)
	{ //ถ้าquery แล้วมีอยู่ใน DB Return false ไม่ให้Add
		$sql = "SELECT * FROM sys_permission_group_app WHERE spg_name = '{$addPermissionappname}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if (empty($row)) {
			return "true";
		} else {
			return "false";
		}
	}

	public function insertPermissionApp($addPermissionappname, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_permission_group_app(spg_name, spg_create_by, spg_create_date)
		VALUES ('{$addPermissionappname}', '{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function insertPermissionDetailApp($permissionwebnameconvert, $value, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_permission_detail_app (spg_id,sm_id,spd_create_by,spd_create_date)
		VALUES ('{$permissionwebnameconvert}','{$value}','{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function detailGroupPermissionApp($id)
	{
		$sql = "SELECT DISTINCT sys_permission_detail_app.sm_id,sys_menu_app.sm_menu, spd_id, spd_status
		FROM sys_permission_detail_app
		INNER JOIN sys_menu_app ON sys_permission_detail_app.sm_id = sys_menu_app.sm_id
		INNER JOIN sys_permission_group_app ON sys_permission_group_app.spg_id = sys_permission_detail_app.spg_id
		WHERE sys_permission_group_app.spg_id = '{$id}'
		ORDER BY sys_permission_detail_app.spd_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function getTableDetailPermissionApp()
	{
		$sql = "SELECT DISTINCT *
		FROM sys_permission_detail_app 
		INNER JOIN sys_menu_app ON sys_menu_app.sm_id = sys_permission_detail_app.sm_id
		INNER JOIN sys_permission_group_app ON sys_permission_detail_app.spg_id = sys_permission_group_app.spg_id
		ORDER BY sys_menu_app.sm_id ASC";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusPermissionDetailApp($detailid, $empcodeadmin)
	{
		$sql = "SELECT * FROM sys_permission_detail_app WHERE spd_id = '{$detailid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["spd_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_permission_detail_app SET spd_status = 0 WHERE  spd_id = '{$detailid}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_permission_detail_app SET spd_update_by = '{$empcodeadmin}' , spd_update_date = CURRENT_TIMESTAMP
			WHERE  spd_id = '{$detailid}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				if ($res) {
					return true;
				} else {
					return false;
				}
			} else if ($result == 0) {
				$sql = "UPDATE sys_permission_detail_app SET spd_status = 1 WHERE  spd_id = '{$detailid}'";
				$res = $this->db->query($sql);
				$sqlupdate = "UPDATE sys_permission_detail_app SET spd_update_by = '{$empcodeadmin}' , spd_update_date = CURRENT_TIMESTAMP
			WHERE  spd_id = '{$detailid}'";
				$resupdate = $this->db->query($sqlupdate);
				if ($res) {
					return true;
				} else {
					return false;
				}
			} else {
				return  true;
			}
		}
	}

	public function GetDataEditPermissionApp($spg_id)
	{
		$sql = "SELECT spg_id, spg_name FROM sys_permission_group_app WHERE spg_id = '{$spg_id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelUpdateNamePermissionApp($editnameper, $id, $empcodeadmin)
	{
		$sql = "UPDATE 
		sys_permission_group_app 
		SET 
		spg_name = '{$editnameper}' ,
		spg_update_by = '{$empcodeadmin}',
		spg_update_date = CURRENT_TIMESTAMP
		WHERE spg_id = '{$id}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function modelcheckInsertdataEditPerApp($id, $dropdowneditsubmenu)
	{
		$sql = "SELECT * FROM sys_permission_detail_app WHERE spg_id = '{$id}' AND sm_id ='{$dropdowneditsubmenu}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		// if (empty($row)) {
		// 	return "true";
		// } else {
		// 	retur "false";
		// }
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function modelInsertdataEditperApp($id, $dropdowneditmenu, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_permission_detail_app 
		(spg_id,sm_id,spd_create_by,spd_create_date)
		VALUES('{$id}','{$dropdowneditmenu}','{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	// **************************************** Manage Menu App **********************************************

	public function getTableManageMenuApp()
	{
		$sql = "SELECT sm_id, sm_menu ,sm_status
		FROM sys_menu_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function checkMenuApp($addmenuappname, $addmenupathapp)
	{
		$sql = "SELECT sm_id, sm_menu , sm_path
		FROM sys_menu_app
		WHERE sm_menu = '{$addmenuappname}' OR sm_path = '{$addmenupathapp}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function modelAddMenuApp($addmenuappname, $addmenupathapp, $addmenupicapp, $empcodeadmin)
	{
		$sql = "INSERT INTO sys_menu_app (sm_menu, sm_path,sm_pic, sm_craete_by, sm_create_date)
		VALUES ('{$addmenuappname}', '{$addmenupathapp}', '{$addmenupicapp}', '{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function editStatusMenuApp($MenuappId, $empcodeadmin)
	{
		$sql = "select * from sys_menu_app WHERE sm_id = '{$MenuappId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["sm_status"];
		if ($result == 1) {
			$sql = "UPDATE sys_menu_app SET sm_status = 0 WHERE  sm_id = '{$MenuappId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_menu_app SET sm_update_by = '{$empcodeadmin}' , sm_update_date = CURRENT_TIMESTAMP
			WHERE  sm_id = '{$MenuappId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE sys_menu_app SET sm_status = 1 WHERE  sm_id = '{$MenuappId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE sys_menu_app SET sm_update_by = '{$empcodeadmin}' , sm_update_date = CURRENT_TIMESTAMP
			WHERE  sm_id = '{$MenuappId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function GetDataEditMenuApp($sm_id)
	{
		$sql = "SELECT sm_id, sm_menu , sm_path ,sm_pic 
		FROM sys_menu_app
		WHERE sm_id = '{$sm_id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditMenuApp($editmenuappid, $editmenuappname, $editmenupathapp, $editmenupicapp, $empcodeadmin)
	{
		$sql = "UPDATE sys_menu_app 
		SET sm_menu = '{$editmenuappname}',sm_path = '{$editmenupathapp}', sm_pic = '{$editmenupicapp}' 
		,sm_update_by = '{$empcodeadmin}',sm_update_date = CURRENT_TIMESTAMP
		WHERE sm_id = '{$editmenuappid}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	// ********************************************* Mst Check type *******************************************
	public function getTableCheckType()
	{
		$sql = "SELECT mct_id, mct_name , mct_status
		FROM mst_check_type_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelCheckNameType($addparttypename)
	{
		$sql = "SELECT mct_name FROM mst_check_type_app WHERE mct_name = '{$addparttypename}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}
	public function modelAddCheckType($addparttypename, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_check_type_app (mct_name, mct_create_by , mct_create_date)
		VALUES ('{$addparttypename}', '{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function editStatusCheckType($CheckTypeId, $empcodeadmin)
	{
		$sql = "SELECT * FROM mst_check_type_app WHERE mct_id = '{$CheckTypeId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mct_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_check_type_app SET mct_status = 0 WHERE  mct_id = '{$CheckTypeId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_check_type_app SET mct_update_by = '{$empcodeadmin}' , mct_update_date = CURRENT_TIMESTAMP
			WHERE  mct_id  = '{$CheckTypeId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_check_type_app SET mct_status = 1 WHERE  mct_id = '{$CheckTypeId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_check_type_app SET mct_update_by = '{$empcodeadmin}' , mct_update_date = CURRENT_TIMESTAMP
			WHERE  mct_id  = '{$CheckTypeId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function GetDataEditCheckType($mct_id)
	{
		$sql = "SELECT mct_id, mct_name 
		FROM mst_check_type_app
		WHERE mct_id = '{$mct_id}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditCheckType($IDeditparttype, $editparttypeName, $empcodeadmin)
	{
		$sql = "UPDATE mst_check_type_app 
		SET mct_name = '{$editparttypeName}', mct_update_by = '{$empcodeadmin}',mct_update_date = CURRENT_TIMESTAMP
		WHERE mct_id = '{$IDeditparttype}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	// ****************************** mst check status ***********************************************

	public function getTableCheckStatus()
	{
		$sql = "SELECT mcs_id, mcs_name , mcs_status
		FROM mst_check_status_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusCheckStatus($StatusId, $empcodeadmin)
	{
		$sql = "select * from mst_check_status_app WHERE mcs_id = '{$StatusId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mcs_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_check_status_app SET mcs_status = 0 WHERE  mcs_id = '{$StatusId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_check_status_app SET mcs_update_by = '{$empcodeadmin}' , mcs_update_date = CURRENT_TIMESTAMP
			WHERE  mcs_id  = '{$StatusId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_check_status_app SET mcs_status = 1 WHERE  mcs_id = '{$StatusId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_check_status_app SET mcs_update_by = '{$empcodeadmin}' , mcs_update_date = CURRENT_TIMESTAMP
			WHERE  mcs_id  = '{$StatusId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function modelCheckAddStatus($addstatusname)
	{
		$sql = "SELECT mcs_name FROM mst_check_status_app WHERE mcs_name = '{$addstatusname}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function modelAddStatus($addstatusname, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_check_status_app (mcs_name, mcs_create_by , mcs_create_date)
		VALUES ('{$addstatusname}', '{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	public function GetDataEditCheckStatus($statusid)
	{
		$sql = "SELECT mcs_id, mcs_name 
		FROM mst_check_status_app
		WHERE mcs_id = '{$statusid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditCheckStatus($IDeditStatusName, $editStatusName, $empcodeadmin)
	{
		$sql = "UPDATE mst_check_status_app 
		SET mcs_name = '{$editStatusName}', mcs_update_by = '{$empcodeadmin}',mcs_update_date = CURRENT_TIMESTAMP
		WHERE mcs_id = '{$IDeditStatusName}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	// ****************************** mst Inspection Type ***********************************************

	public function getTableInspection()
	{
		$sql = "SELECT mit_id, mit_name , mit_status
		FROM mst_inspection_type_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusInspection($InspectionId, $empcodeadmin)
	{
		$sql = "select * from mst_inspection_type_app WHERE mit_id = '{$InspectionId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mit_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_inspection_type_app SET mit_status = 0 WHERE  mit_id = '{$InspectionId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_inspection_type_app SET mit_update_by = '{$empcodeadmin}' , mit_update_date = CURRENT_TIMESTAMP
			WHERE  mit_id  = '{$InspectionId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_inspection_type_app SET mit_status = 1 WHERE  mit_id = '{$InspectionId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_inspection_type_app SET mit_update_by = '{$empcodeadmin}' , mit_update_date = CURRENT_TIMESTAMP
			WHERE  mit_id  = '{$InspectionId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function modelCheckAddInspection($addinspectiontype)
	{
		$sql = "SELECT mit_name FROM mst_inspection_type_app WHERE mit_name = '{$addinspectiontype}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function modelAddInspection($addinspectiontype, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_inspection_type_app (mit_name, mit_create_by , mit_create_date)
		VALUES ('{$addinspectiontype}', '{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditInspection($inspectionid)
	{
		$sql = "SELECT mit_id, mit_name 
		FROM mst_inspection_type_app
		WHERE mit_id = '{$inspectionid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditInspection($IDeditInspectionName, $editInspectionName, $empcodeadmin)
	{
		$sql = "UPDATE mst_inspection_type_app 
		SET mit_name = '{$editInspectionName}', mit_update_by = '{$empcodeadmin}',mit_update_date = CURRENT_TIMESTAMP
		WHERE mit_id = '{$IDeditInspectionName}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	// ______________________________________________ mst DMC DATA_________________________________


	public function getTableDMCData()
	{
		$sql = "SELECT mdd_id, mdd_name , mdd_status
		FROM mst_dmc_data_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusDMC($dmcId, $empcodeadmin)
	{
		$sql = "select * from mst_dmc_data_app WHERE mdd_id = '{$dmcId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mdd_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_dmc_data_app SET mdd_status = 0 WHERE  mdd_id = '{$dmcId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_dmc_data_app SET mdd_update_by = '{$empcodeadmin}' , mdd_update_date = CURRENT_TIMESTAMP
			WHERE  mdd_id  = '{$dmcId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_dmc_data_app SET mdd_status = 1 WHERE  mdd_id = '{$dmcId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_dmc_data_app SET mdd_update_by = '{$empcodeadmin}' , mdd_update_date = CURRENT_TIMESTAMP
			WHERE  mdd_id  = '{$dmcId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function modelCheckAddDMC($adddmcname)
	{
		$sql = "SELECT mdd_name FROM mst_dmc_data_app WHERE mdd_name = '{$adddmcname}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}
	public function modelAddDMC($adddmcname, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_dmc_data_app (mdd_name, mdd_create_by , mdd_create_date)
		VALUES ('{$adddmcname}', '{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditDMC($dmcid)
	{
		$sql = "SELECT mdd_id, mdd_name 
		FROM mst_dmc_data_app
		WHERE mdd_id = '{$dmcid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditDMC($IDeditdmcname, $editdmcname, $empcodeadmin)
	{
		$sql = "UPDATE mst_dmc_data_app 
		SET mdd_name = '{$editdmcname}', mdd_update_by = '{$empcodeadmin}',mdd_update_date = CURRENT_TIMESTAMP
		WHERE mdd_id = '{$IDeditdmcname}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	// ************************************** mst DMC TYPE *******************************


	public function getTableDMCType()
	{
		$sql = "SELECT *
		FROM mst_dmc_type_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function editStatusDMCType($dmctypeId, $empcodeadmin)
	{
		$sql = "select * from mst_dmc_type_app WHERE mdt_id = '{$dmctypeId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mdt_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_dmc_type_app SET mdt_status = 0 WHERE  mdt_id = '{$dmctypeId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_dmc_type_app SET mdt_update_by = '{$empcodeadmin}' , mdt_update_date = CURRENT_TIMESTAMP
			WHERE  mdt_id  = '{$dmctypeId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_dmc_type_app SET mdt_status = 1 WHERE  mdt_id = '{$dmctypeId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_dmc_type_app SET mdt_update_by = '{$empcodeadmin}' , mdt_update_date = CURRENT_TIMESTAMP
			WHERE  mdt_id  = '{$dmctypeId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelCheckAddDMCType($adddmctypename)
	{
		$sql = "SELECT mdt_name FROM mst_dmc_type_app WHERE mdt_name = '{$adddmctypename}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}
	public function modelAddDMCType($adddmctypename, $adddmcdigit, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_dmc_type_app (mdt_name, mdt_digit, mdt_create_by , mdt_create_date)
		VALUES ('{$adddmctypename}','{$adddmcdigit}', '{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditDMCType($dmctypeid)
	{
		$sql = "SELECT mdt_id , mdt_name , mdt_digit
		FROM mst_dmc_type_app
		WHERE mdt_id = '{$dmctypeid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditDMCType($IDeditdmctype, $editdmctypename, $editdmcdigit, $empcodeadmin)
	{
		$sql = "UPDATE mst_dmc_type_app 
		SET mdt_name = '{$editdmctypename}', mdt_digit = '{$editdmcdigit}', mdt_update_by = '{$empcodeadmin}', mdt_update_date = CURRENT_TIMESTAMP
		WHERE mdt_id = '{$IDeditdmctype}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	// ************************************* mst FA Code ***************************

	public function getTableFACode()
	{
		$sql = "SELECT *
		FROM mst_fa_code_master_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusFACode($facodeId, $empcodeadmin)
	{
		$sql = "SELECT * FROM mst_fa_code_master_app WHERE mfcm_id = '{$facodeId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mfcm_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_fa_code_master_app SET mfcm_status = 0 WHERE  mfcm_id = '{$facodeId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_fa_code_master_app SET mfcm_update_by = '{$empcodeadmin}' , mfcm_update_date = CURRENT_TIMESTAMP
			WHERE  mfcm_id  = '{$facodeId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_fa_code_master_app SET mfcm_status = 1 WHERE  mfcm_id = '{$facodeId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_fa_code_master_app SET mfcm_update_by = '{$empcodeadmin}' , mfcm_update_date = CURRENT_TIMESTAMP
			WHERE  mfcm_id  = '{$facodeId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function modelCheckAddFACode($addfaname)
	{
		$sql = "SELECT mfcm_name_code FROM mst_fa_code_master_app WHERE mfcm_name_code = '{$addfaname}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function modelAddFACode($addfaline, $addfaname, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_fa_code_master_app (mfcm_line_code, mfcm_name_code, mfcm_create_by , mfcm_create_date)
		VALUES ('{$addfaline}','{$addfaname}', '{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	public function getDataEditFACode($facodeid)
	{
		$sql = "SELECT mfcm_id , mfcm_line_code , mfcm_name_code
		FROM mst_fa_code_master_app
		WHERE mfcm_id = '{$facodeid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditFACode($IDeditfacode, $editfaline, $editfaname, $empcodeadmin)
	{
		$sql = "UPDATE mst_fa_code_master_app 
		SET mfcm_line_code = '{$editfaline}', mfcm_name_code = '{$editfaname}', mfcm_update_by = '{$empcodeadmin}', mfcm_update_date = CURRENT_TIMESTAMP
		WHERE mfcm_id = '{$IDeditfacode}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	// ******************************************* mst WORK SHIFT *****************************************

	public function getTableWorkShift()
	{
		$sql = "SELECT *
		FROM mst_work_shift_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}



	public function editStatusWorkShift($workshiftId, $empcodeadmin)
	{
		$sql = "select * from mst_work_shift_app WHERE mws_id = '{$workshiftId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mws_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_work_shift_app SET mws_status = 0 WHERE  mws_id = '{$workshiftId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_work_shift_app SET mws_update_by = '{$empcodeadmin}' , mws_update_date = CURRENT_TIMESTAMP
			WHERE  mws_id  = '{$workshiftId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_work_shift_app SET mws_status = 1 WHERE  mws_id = '{$workshiftId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_work_shift_app SET mws_update_by = '{$empcodeadmin}' , mws_update_date = CURRENT_TIMESTAMP
			WHERE  mws_id  = '{$workshiftId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function modelCheckWorkShift($addshift)
	{
		$sql = "SELECT
		mws_shift
		FROM
		mst_work_shift_app
		WHERE mws_shift = '{$addshift}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}


	public function modelAddWorkShift($addshift, $addstarttime, $addendtime, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_work_shift_app (mws_shift, mws_time_start, mws_time_end , mws_create_by , mws_create_date)
		VALUES ('{$addshift}','{$addstarttime}', '{$addendtime}','{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	public function getDataEditWorkShift($workshiftId)
	{
		$sql = "SELECT mws_id , mws_shift , mws_time_start , mws_time_end
		FROM mst_work_shift_app
		WHERE mws_id = '{$workshiftId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function modelEditWorkShift($IDeditworkshift, $editshift, $editstarttime, $editendtime, $empcodeadmin)
	{
		$sql = "UPDATE mst_work_shift_app 
		SET mws_shift = '{$editshift}', mws_time_start = '{$editstarttime}', mws_time_end = '{$editendtime}',mws_update_by = '{$empcodeadmin}', mws_update_date = CURRENT_TIMESTAMP
		WHERE  mws_id = '{$IDeditworkshift}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}


	// *************************************************** mst DEFECT ****************************************************


	public function getTableDefect()
	{
		$sql = "SELECT *
		FROM mst_defect_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}




	public function editStatusDefect($defectId, $empcodeadmin)
	{
		$sql = "select * from mst_defect_app WHERE md_id = '{$defectId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["md_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_defect_app SET md_status = 0 WHERE  md_id = '{$defectId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_defect_app SET md_update_by = '{$empcodeadmin}' , md_update_date = CURRENT_TIMESTAMP
			WHERE  md_id  = '{$defectId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_defect_app SET md_status = 1 WHERE  md_id = '{$defectId}'";
			$res = $this->db->query($sql);
			$sqlupdate = "UPDATE mst_defect_app SET md_update_by = '{$empcodeadmin}' , md_update_date = CURRENT_TIMESTAMP
			WHERE  md_id  = '{$defectId}'";
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelCheckDefect($defect)
	{
		$sql = "SELECT
		md_defect_code
		FROM
		mst_defect_app
		WHERE md_defect_code = '{$defect}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function modelAddDefect($adddefectcode, $adddefectnameth, $adddefectnameen, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_defect_app (md_defect_code, md_defect_th_name , md_defect_en_name , md_create_by , md_create_date)
		VALUES ('{$adddefectcode}','{$adddefectnameth}', '{$adddefectnameen}','{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditDefect($defectId)
	{
		$sql = "SELECT md_id,md_defect_code,md_defect_th_name,md_defect_en_name
		FROM mst_defect_app
		WHERE md_id = '{$defectId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function modelEditDefect($IDeditdefect, $editdefectcode, $editdefectnameth, $editdefectnameen, $empcodeadmin)
	{ {
			$sql = "UPDATE mst_defect_app 
			SET md_defect_code = '{$editdefectcode}', md_defect_th_name = '{$editdefectnameth}', md_defect_en_name = '{$editdefectnameen}',md_update_by = '{$empcodeadmin}', md_update_date = CURRENT_TIMESTAMP
			WHERE  md_id = '{$IDeditdefect}'";
			$res = $this->db->query($sql);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		}
	}


	// ****************************************************** Part Number ******************************************************

	public function getTablePartNo()
	{
		$sql = "SELECT *
		FROM mst_part_no";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function editStatusPartNo($partnoId, $empcodeadmin)
	{
		$sql = "select * from mst_part_no WHERE mpn_id = '{$partnoId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mpn_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_part_no SET mpn_status = 0 WHERE  mpn_id = '{$partnoId}'";
			$sqlupdate = "UPDATE mst_part_no SET mpn_update_by = '{$empcodeadmin}' , mpn_update_date = CURRENT_TIMESTAMP
			WHERE  mpn_id = '{$partnoId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_part_no SET mpn_status = 1 WHERE  mpn_id = '{$partnoId}'";
			$sqlupdate = "UPDATE mst_part_no SET mpn_update_by = '{$empcodeadmin}' , mpn_update_date = CURRENT_TIMESTAMP
			WHERE  mpn_id = '{$partnoId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelAddPartNo($addpartnumber, $addcuspartno, $addlocationpart, $adddmccheckpart, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_part_no (mpn_part_no, mpn_cus_part_no , mpn_location, mpn_dmc_check , mpn_create_by , mpn_create_date)
		VALUES ('{$addpartnumber}','{$addcuspartno}', '{$addlocationpart}','{$adddmccheckpart}','{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditPartNo($partnoId)
	{
		$sql = "SELECT mpn_id, mpn_part_no, mpn_cus_part_no, mpn_location, mpn_dmc_check
		FROM mst_part_no
		WHERE mpn_id = '{$partnoId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}



	public function modelEditPartNo($IDeditpartno, $editpartnumber, $editcuspartno, $editlocationpart, $editdmccheckpart, $empcodeadmin)
	{ {
			$sql = "UPDATE mst_part_no 
			SET mpn_part_no = '{$editpartnumber}', mpn_cus_part_no = '{$editcuspartno}', mpn_location = '{$editlocationpart}',
			mpn_dmc_check = '{$editdmccheckpart}',mpn_update_by = '{$empcodeadmin}', mpn_update_date = CURRENT_TIMESTAMP
			WHERE  mpn_id = '{$IDeditpartno}'";
			$res = $this->db->query($sql);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		}
	}

	// ****************************************************** mst Select Part******************************************************

	public function getTableSelectPart()
	{
		$sql = "SELECT DISTINCT
		msp_id,
		mpa.mpa_phase_plant,
		mza.mza_name ,
		msp_part_no ,
		msp_part_name ,
		msp_status
	FROM
		mst_select_part_app msp
	INNER JOIN mst_config_details_app mcd ON mcd.mcd_id = msp.mcd_id
	LEFT JOIN mst_plant_admin_app mpa ON mpa.mpa_id = mcd.mpa_id
	LEFT JOIN mst_zone_admin_app mza ON mza.mza_id = mcd.mza_id
	LEFT JOIN mst_dmc_type_app mdt ON mdt.mdt_id  = mcd.mcd_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusSelectPart($selectpId, $empcodeadmin)
	{
		$sql = "select * from mst_select_part_app WHERE msp_id = '{$selectpId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["msp_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_select_part_app SET msp_status = 0 WHERE  msp_id = '{$selectpId}'";
			$sqlupdate = "UPDATE mst_select_part_app SET msp_update_by = '{$empcodeadmin}' , msp_update_date = CURRENT_TIMESTAMP
			WHERE  msp_id = '{$selectpId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_select_part_app SET msp_status = 1 WHERE  msp_id = '{$selectpId}'";
			$sqlupdate = "UPDATE mst_select_part_app SET msp_update_by = '{$empcodeadmin}' , msp_update_date = CURRENT_TIMESTAMP
			WHERE  msp_id = '{$selectpId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelAddSelectPart($addselectConfig, $addselectpno, $addselectpname, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_select_part_app (
			mcd_id,
			msp_part_no,
			msp_part_name,
			msp_create_by,
			msp_create_date
		)
		VALUES
			(
				'{$addselectConfig}',
				'{$addselectpno}',
				'{$addselectpname}',
				'{$empcodeadmin}',
				CURRENT_TIMESTAMP
			)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditSelectPart($selectpId)
	{
		$sql = "SELECT
		msp_id,
		msp.mcd_id,
		mpa_phase_plant,
		mza_name,
		msp_part_no,
		msp_part_name
	FROM
		mst_select_part_app msp
	INNER JOIN mst_config_details_app mcd ON mcd.mcd_id = msp.mcd_id
	INNER JOIN mst_plant_admin_app mpa ON mcd.mpa_id = mpa.mpa_id
	INNER JOIN mst_zone_admin_app mza ON mcd.mza_id = mza.mza_id
	WHERE
		msp_id = '{$selectpId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function modelEditSelectPart($IDeditselectp, $editselectpCon, $editselectpno, $editselectpname, $empcodeadmin)
	{
		$sql = "UPDATE mst_select_part_app 
			SET mcd_id = '{$editselectpCon}',msp_part_no = '{$editselectpno}' , 
			msp_part_name = '{$editselectpname}' , msp_update_by = '{$empcodeadmin}', msp_update_date = CURRENT_TIMESTAMP
			WHERE  msp_id = '{$IDeditselectp}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}







	// ****************************************************** mst Plant Admin Web ******************************************************

	public function getTablePlantAdminWeb()
	{
		$sql = "SELECT *
		FROM mst_plant_admin_web";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusPlantAdminWeb($plantwebId, $empcodeadmin)
	{
		$sql = "select * from mst_plant_admin_web WHERE mpa_id = '{$plantwebId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mpa_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_plant_admin_web SET mpa_status = 0 WHERE  mpa_id = '{$plantwebId}'";
			$sqlupdate = "UPDATE mst_plant_admin_web SET mpa_update_by = '{$empcodeadmin}' , mpa_update_date = CURRENT_TIMESTAMP
			WHERE  mpa_id = '{$plantwebId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_plant_admin_web SET mpa_status = 1 WHERE  mpa_id = '{$plantwebId}'";
			$sqlupdate = "UPDATE mst_plant_admin_web SET mpa_update_by = '{$empcodeadmin}' , mpa_update_date = CURRENT_TIMESTAMP
			WHERE  mpa_id = '{$plantwebId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}


	public function modelAddPlantAdminWeb($addplantwebphase, $addplantwebname, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_plant_admin_web (mpa_phase_plant, mpa_name, mpa_create_by , mpa_create_date)
		VALUES ('{$addplantwebphase}','{$addplantwebname}','{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditPlantWeb($plantwebId)
	{
		$sql = "SELECT mpa_id, mpa_phase_plant, mpa_name
		FROM mst_plant_admin_web
		WHERE mpa_id = '{$plantwebId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function modelEditPlantAdminWeb($IDeditplantweb, $editplantwebphase, $editplantwebname, $empcodeadmin)
	{ {
			$sql = "UPDATE mst_plant_admin_web 
			SET mpa_phase_plant = '{$editplantwebphase}', mpa_name = '{$editplantwebname}',
			mpa_update_by = '{$empcodeadmin}', mpa_update_date = CURRENT_TIMESTAMP
			WHERE  mpa_id = '{$IDeditplantweb}'";
			$res = $this->db->query($sql);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		}
	}

	// ***************************************************** MST Plant Admin App *******************************************************

	public function getTablePlantAdminApp()
	{
		$sql = "SELECT *
		FROM mst_plant_admin_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function editStatusPlantAdminApp($plantappId, $empcodeadmin)
	{
		$sql = "select * from mst_plant_admin_app WHERE mpa_id = '{$plantappId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mpa_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_plant_admin_app SET mpa_status = 0 WHERE  mpa_id = '{$plantappId}'";
			$sqlupdate = "UPDATE mst_plant_admin_app SET mpa_update_by = '{$empcodeadmin}' , mpa_update_date = CURRENT_TIMESTAMP
			WHERE  mpa_id = '{$plantappId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_plant_admin_app SET mpa_status = 1 WHERE  mpa_id = '{$plantappId}'";
			$sqlupdate = "UPDATE mst_plant_admin_app SET mpa_update_by = '{$empcodeadmin}' , mpa_update_date = CURRENT_TIMESTAMP
			WHERE  mpa_id = '{$plantappId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelAddPlantAdminApp($addplantadminappphase, $addplantadminappname, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_plant_admin_app (mpa_phase_plant, mpa_name, mpa_create_by , mpa_create_date)
		VALUES ('{$addplantadminappphase}','{$addplantadminappname}','{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditPlantApp($plantappId)
	{
		$sql = "SELECT mpa_id, mpa_phase_plant, mpa_name
		FROM mst_plant_admin_app
		WHERE mpa_id = '{$plantappId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function modelEditPlantAdminApp($IDeditplantapp, $editplantappphase, $editplantappname, $empcodeadmin)
	{ {
			$sql = "UPDATE mst_plant_admin_app
			SET mpa_phase_plant = '{$editplantappphase}', mpa_name = '{$editplantappname}',
			mpa_update_by = '{$empcodeadmin}', mpa_update_date = CURRENT_TIMESTAMP
			WHERE  mpa_id = '{$IDeditplantapp}'";
			$res = $this->db->query($sql);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		}
	}
	// ****************************************** mst Zone Admin ********************************************************************

	public function getTableZone()
	{
		$sql = "SELECT mza_id,mza_name,mst_zone_admin_app.mfcm_id,mfcm_line_code,mza_status
		FROM mst_zone_admin_app
		INNER JOIN mst_fa_code_master_app ON mst_zone_admin_app.mfcm_id = mst_fa_code_master_app.mfcm_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function getZone()
	{
		$sql = "SELECT *
		FROM mst_fa_code_master_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function editStatusZone($zoneId, $empcodeadmin)
	{
		$sql = "select * from mst_zone_admin_app WHERE mza_id = '{$zoneId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mza_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_zone_admin_app SET mza_status = 0 WHERE  mza_id = '{$zoneId}'";
			$sqlupdate = "UPDATE mst_zone_admin_app SET mza_update_by = '{$empcodeadmin}' , mza_update_date = CURRENT_TIMESTAMP
			WHERE  mza_id = '{$zoneId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_zone_admin_app SET mza_status = 1 WHERE  mza_id = '{$zoneId}'";
			$sqlupdate = "UPDATE mst_zone_admin_app SET mza_update_by = '{$empcodeadmin}' , mza_update_date = CURRENT_TIMESTAMP
			WHERE  mza_id = '{$zoneId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}
	public function modelCheckZone($line)
	{
		$sql = "SELECT
		mza_name
		FROM
		mst_zone_admin_app
		WHERE mza_name = '{$line}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}
	public function modelAddZone($addnamezone, $addlinezone, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_zone_admin_app (mza_name, mfcm_id , mza_create_by , mza_create_date)
		VALUES ('{$addnamezone}','{$addlinezone}','{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditZone($zoneId)
	{
		$sql = "SELECT mza_id, mza_name, mfcm_id
		FROM mst_zone_admin_app
		WHERE mza_id = '{$zoneId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditZone($IDeditzone, $editnamezone, $editlinezone, $empcodeadmin)
	{
		$sql = "UPDATE mst_zone_admin_app
			SET mza_name = '{$editnamezone}', mfcm_id = '{$editlinezone}',
			mza_update_by = '{$empcodeadmin}', mza_update_date = CURRENT_TIMESTAMP
			WHERE  mza_id = '{$IDeditzone}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	// ****************************************** mst Station Admin ********************************************************************

	public function getTableStation()
	{
		$sql = "SELECT *
		FROM mst_station_admin_app";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function editStatusStation($stationId, $empcodeadmin)
	{
		$sql = "select * from mst_station_admin_app WHERE msa_id = '{$stationId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["msa_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_station_admin_app SET msa_status = 0 WHERE  msa_id = '{$stationId}'";
			$sqlupdate = "UPDATE mst_station_admin_app SET msa_update_by = '{$empcodeadmin}' , msa_update_date = CURRENT_TIMESTAMP
			WHERE  msa_id = '{$stationId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_station_admin_app SET msa_status = 1 WHERE  msa_id = '{$stationId}'";
			$sqlupdate = "UPDATE mst_station_admin_app SET msa_update_by = '{$empcodeadmin}' , msa_update_date = CURRENT_TIMESTAMP
			WHERE  msa_id = '{$stationId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelCheckStation($station)
	{
		$sql = "SELECT
		msa_station
		FROM
		mst_station_admin_app
		WHERE msa_station = '{$station}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function modelAddStation($addtablestation, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_station_admin_app (msa_station,msa_create_by,msa_create_date)
		VALUES ('{$addtablestation}','{$empcodeadmin}', CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	public function getDataEditStation($stationId)
	{
		$sql = "SELECT msa_id, msa_station
		FROM mst_station_admin_app
		WHERE msa_id = '{$stationId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditStation($IDeditStation, $editStation, $empcodeadmin)
	{
		$sql = "UPDATE mst_station_admin_app
			SET msa_station = '{$editStation}',
			msa_update_by = '{$empcodeadmin}', msa_update_date = CURRENT_TIMESTAMP
			WHERE  msa_id = '{$IDeditStation}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	// ---------------------------------------------- mst Config Detail ---------------------------------------------------------


	public function getTableConfigDetails()
	{
		$sql = "SELECT mcd_id , mcd_inspection_time , mcd_mac_address , mcd_status , mcd_select_part , 
		mst_plant_admin_app.mpa_id , mpa_name , 
		mst_zone_admin_app.mza_id , mza_name ,
		mst_station_admin_app.msa_id , msa_station ,
		mst_check_type_app.mct_id , mct_name ,
		mst_check_status_app.mcs_id , mcs_name , 
		mst_inspection_type_app.mit_id , mit_name
		FROM mst_config_details_app
		INNER JOIN mst_plant_admin_app ON mst_config_details_app.mpa_id = mst_plant_admin_app.mpa_id
		INNER JOIN mst_zone_admin_app ON mst_config_details_app.mza_id = mst_zone_admin_app.mza_id
		INNER JOIN mst_station_admin_app ON mst_config_details_app.msa_id = mst_station_admin_app.msa_id
		INNER JOIN mst_check_type_app ON mst_config_details_app.mct_id = mst_check_type_app.mct_id
		INNER JOIN mst_check_status_app ON mst_config_details_app.mcs_id = mst_check_status_app.mcs_id
		INNER JOIN mst_inspection_type_app ON mst_config_details_app.mit_id = mst_inspection_type_app.mit_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelGetPlantApp()
	{
		$sql = "SELECT  * FROM mst_plant_admin_app ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelgetZoneApp()
	{
		$sql = "SELECT * FROM mst_zone_admin_app ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelgetStationApp()
	{
		$sql = "SELECT * FROM mst_station_admin_app ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelgetCheckTypenApp()
	{
		$sql = "SELECT * FROM mst_check_type_app ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelgetCheckStatusApp()
	{
		$sql = "SELECT * FROM mst_check_status_app ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelgetInspectionApp()
	{
		$sql = "SELECT * FROM mst_inspection_type_app ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function editStatusConfigDetail($configId, $empcodeadmin)
	{
		$sql = "select * from mst_config_details_app WHERE mcd_id = '{$configId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mcd_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_config_details_app SET mcd_status = 0 WHERE  mcd_id = '{$configId}'";
			$sqlupdate = "UPDATE mst_config_details_app SET mcd_update_by = '{$empcodeadmin}' , mcd_update_date = CURRENT_TIMESTAMP
			WHERE  mcd_id = '{$configId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_config_details_app SET mcd_status = 1 WHERE  mcd_id = '{$configId}'";
			$sqlupdate = "UPDATE mst_config_details_app SET mcd_update_by = '{$empcodeadmin}' , mcd_update_date = CURRENT_TIMESTAMP
			WHERE  mcd_d = '{$configId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelAddConfigDetails(
		$addplantconfig,
		$addzoneconfig,
		$addstationconfig,
		$addtypeconfig,
		$addstatusconfig,
		$addinspectionconfig,
		$addTimeconfig,
		$addMacaddress,
		$addSelectpart,
		$empcodeadmin
	) {
		$sql = "INSERT INTO mst_config_details_app 
		(mpa_id , mza_id , msa_id , mct_id , mcs_id , mit_id , mcd_inspection_time , mcd_mac_address ,mcd_select_part, mcd_create_by , mcd_create_date)
		VALUES('{$addplantconfig}','{$addzoneconfig}','{$addstationconfig}','{$addtypeconfig}','{$addstatusconfig}',
		'{$addinspectionconfig}','{$addTimeconfig}','{$addMacaddress}','{$addSelectpart}', '{$empcodeadmin}' , CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditConfigDetails($configdetailId)
	{
		$sql = "SELECT mcd_id , mpa_id , mza_id ,  msa_id , mct_id , mcs_id ,  mit_id , mcd_inspection_time , mcd_mac_address ,  mcd_select_part 
		FROM mst_config_details_app
		WHERE mcd_id = '{$configdetailId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function checkConfigDetail($MacAddress)
	{
		$sql = "SELECT mcd_mac_address 
		FROM 
		mst_config_details_app
		WHERE mcd_mac_address = '{$MacAddress}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return "duplicate";
		} else {
			return "pass";
		}
	}

	public function modelEditConfigDetails(
		$IDeditconfig,
		$editplantconfig,
		$editzoneconfig,
		$editstationconfig,
		$edittypeconfig,
		$editstatusconfig,
		$editinspectionconfig,
		$edittimeconfig,
		$editMacaddressconfig,
		$empcodeadmin
	) {

		$sql = "UPDATE mst_config_details_app
		SET mpa_id = '{$editplantconfig}' ,
		mza_id = '{$editzoneconfig}',
		msa_id = '{$editstationconfig}', 
		mct_id = '{$edittypeconfig}',
		mcs_id = '{$editstatusconfig}' ,
		mit_id = '{$editinspectionconfig}',
		mcd_inspection_time ='{$edittimeconfig}',
		mcd_mac_address = '{$editMacaddressconfig}',
		mcd_update_by = '{$empcodeadmin}', 
		mcd_update_date = CURRENT_TIMESTAMP
		WHERE mcd_id = '{$IDeditconfig}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	// ****************************************************** mst  DEFECT GROUP ******************************************************

	public function getTableDefectGroup()
	{
		$sql = "SELECT
		DISTINCT
		mcda.mcd_id ,
		mpaa.mpa_phase_plant ,
		mzaa.mza_name  ,
		msaa.msa_station ,
		mcda.mcd_status ,
		mdg_status 
	FROM
		mst_defect_group_app mdga
		LEFT JOIN mst_config_details_app mcda ON mcda.mcd_id = mdga.mcd_id
		INNER JOIN mst_plant_admin_app mpaa ON mpaa.mpa_id = mcda.mpa_id 
		LEFT JOIN mst_zone_admin_app mzaa ON mzaa.mza_id = mcda.mza_id
		LEFT JOIN mst_station_admin_app msaa ON mcda.msa_id= msaa.msa_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function editStatusDefectGroup($defectId, $empcodeadmin)
	{
		$sql = "select * from mst_defect_group_app WHERE mdg_id = '{$defectId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mdg_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_defect_group_app SET mdg_status = 0 WHERE  mdg_id = '{$defectId}'";
			$sqlupdate = "UPDATE mst_defect_group_app SET mdg_update_by = '{$empcodeadmin}' , mdg_update_date = CURRENT_TIMESTAMP
			WHERE  mdg_id = '{$defectId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_defect_group_app SET mdg_status = 1 WHERE  mdg_id = '{$defectId}'";
			$sqlupdate = "UPDATE mst_defect_group_app SET mdg_update_by = '{$empcodeadmin}' , mdg_update_date = CURRENT_TIMESTAMP
			WHERE  mdg_id = '{$defectId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}


	public function getDataEditDefectGroup($defectGroupConfId)
	{
		$sql = "SELECT
		DISTINCT
		mcda.mcd_id ,
		mpaa.mpa_id,
		mpaa.mpa_phase_plant ,
		mzaa.mza_id ,
		mzaa.mza_name  ,
		msaa.msa_id,
		msaa.msa_station ,
		mdga.md_id ,
		mda.md_defect_en_name
	FROM
		mst_defect_group_app mdga
		LEFT JOIN mst_config_details_app mcda ON mcda.mcd_id = mdga.mcd_id
		INNER JOIN mst_plant_admin_app mpaa ON mpaa.mpa_id = mcda.mpa_id 
		LEFT JOIN mst_zone_admin_app mzaa ON mzaa.mza_id = mcda.mza_id
		LEFT JOIN mst_station_admin_app msaa ON mcda.msa_id= msaa.msa_id
		LEFT JOIN mst_defect_app mda ON mdga.md_id = mda.md_id
		WHERE mcda.mcd_id = '{$defectGroupConfId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	public function getDefectCode()
	{
		$sql = "SELECT * FROM mst_defect_app  where md_status ='1'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditDefectGroup($resdetailId, $value, $empcodeadmin)
	{
		$sql = "INSERT INTO mst_defect_group_app(mcd_id,md_id,mdg_create_by,mdg_create_date,mdg_update_by,mdg_update_date) VALUES ('{$resdetailId}','{$value}','{$empcodeadmin}',CURRENT_TIMESTAMP,'{$empcodeadmin}',CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	public function checkConfId($editzonedefectgroup, $editplantdefectgroup, $editstationdefectgroup)
	{
		$sql = "SELECT
		mcd_id 
		FROM
			mst_config_details_app mcd
		WHERE mcd.mpa_id ='{$editplantdefectgroup}'AND
			mcd.mza_id ='{$editzonedefectgroup}' AND
			mcd.msa_id ='{$editstationdefectgroup}' AND
			mcd.mcd_status ='1'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return 	$row[0]["mcd_id"];
	}

	// ******************************************************* mst dmc type detail **************************************************************

	public function getTableDMCTypeDetail()
	{
		$sql = "SELECT 
		mdtd_id ,
		mdt.mdt_id ,
		mdt.mdt_name ,
		mdd.mdd_id ,
		mdd.mdd_name ,
		mdtd_start ,
		mdtd_end ,
		mdtd_num_substring ,
		mdtd_status
	 
	 FROM
	 mst_dmc_type_detail_app mdtd
	 INNER JOIN mst_dmc_type_app mdt ON mdt.mdt_id = mdtd.mdt_id
	 INNER JOIN mst_dmc_data_app mdd ON mdd.mdd_id = mdtd.mdd_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return 	$row;
	}


	public function editStatusDMCTypeDetail($dmcdetailId, $empcodeadmin)
	{
		$sql = "select * from mst_dmc_type_detail_app WHERE mdtd_id = '{$dmcdetailId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["mdtd_status"];
		if ($result == 1) {
			$sql = "UPDATE mst_dmc_type_detail_app SET mdtd_status = 0 WHERE  mdtd_id = '{$dmcdetailId}'";
			$sqlupdate = "UPDATE mst_dmc_type_detail_app SET mdtd_update_by = '{$empcodeadmin}' , mdtd_update_date = CURRENT_TIMESTAMP
			WHERE  mdtd_id = '{$dmcdetailId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else if ($result == 0) {
			$sql = "UPDATE mst_dmc_type_detail_app SET mdtd_status = 1 WHERE  mdtd_id = '{$dmcdetailId}'";
			$sqlupdate = "UPDATE mst_dmc_type_detail_app SET mdtd_update_by = '{$empcodeadmin}' , mdtd_update_date = CURRENT_TIMESTAMP
			WHERE  mdtd_id = '{$dmcdetailId}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return  true;
		}
	}

	public function modelAddDMCTypeDetail(
		$adddmctypeofdetail,
		$adddmcdataofdetail,
		$addstartofdetail,
		$addendofdetail,
		$addsubstringdetail,
		$empcodeadmin
	) {
		$sql = "INSERT INTO mst_dmc_type_detail_app 
		(mdt_id , mdd_id , mdtd_start , mdtd_end , mdtd_num_substring , mdtd_create_by , mdtd_create_date )
		VALUES('{$adddmctypeofdetail}','{$adddmcdataofdetail}','{$addstartofdetail}','{$addendofdetail}','{$addsubstringdetail}',
		'{$empcodeadmin}' , CURRENT_TIMESTAMP)";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}

	public function getDataEditDMCTypeDetail($dmcdetailId)
	{
		$sql = "SELECT mdtd_id , mdt_id , mdd_id , mdtd_start ,  mdtd_end , mdtd_num_substring 
		FROM mst_dmc_type_detail_app
		WHERE mdtd_id = '{$dmcdetailId}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function modelEditDMCTypeDetail(
		$IDeditDMCTypeDetail,
		$editdmctypeofdetail,
		$editdatadmctypedetail,
		$editstartofdetail,
		$editendofdetail,
		$editsubstringdetail,
		$empcodeadmin
	) {
		$sql = "UPDATE mst_dmc_type_detail_app
		SET mdt_id = '{$editdmctypeofdetail}' ,
		mdd_id = '{$editdatadmctypedetail}',
		mdtd_start = '{$editstartofdetail}', 
		mdtd_end = '{$editendofdetail}',
		mdtd_num_substring = '{$editsubstringdetail}' ,
		mdtd_update_by = '{$empcodeadmin}', 
		mdtd_update_date = CURRENT_TIMESTAMP
		WHERE mdtd_id = '{$IDeditDMCTypeDetail}'";
		$res = $this->db->query($sql);
		if ($res) {
			return "true";
		} else {
			return "false";
		}
	}
	//======================================== Qgate Check Data ===========================================================================

	public function getTableCheckData()
	{
		$sql = "SELECT
		iodc_id,
		ifts_line_cd,
		ifts_plan_date,
		ifts_seq_paln,
		ifts_part_no,
		ifts_snp,
		ifts_box,
		ifts_lot_no_prod,
		ifts_lot_current,
		mpa_name,
		mza_name,
		msa_station ,
		FORMAT (
			iodc_created_date,
			'yyyy-MM-dd'
		) AS iodc_created_date
	
	FROM
		info_operation_detail_count_app iodc
	INNER JOIN info_fa_tag_scan_app ifts ON ifts.ifts_id = iodc.ifts_id
	INNER JOIN mst_config_details_app mcd ON mcd.mcd_id = iodc.mcd_id
	INNER JOIN mst_plant_admin_app mpa ON mcd.mpa_id = mpa.mpa_id
	INNER JOIN mst_zone_admin_app mza ON mcd.mza_id = mza.mza_id
	INNER JOIN mst_station_admin_app msa ON mcd.mcd_id = msa.msa_id";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}

	public function SearchCheckData($plantID, $zoneID, $stationID, $Date)
	{
		$sql = "SELECT
		iodc_id,
		ifts_line_cd,
		ifts_plan_date,
		ifts_seq_paln,
		ifts_part_no,
		ifts_snp,
		ifts_box,
		ifts_lot_no_prod,
		ifts_lot_current,
		mpa_name,
		mza_name,
		msa_station ,
		FORMAT (
			iodc_created_date,
			'yyyy-MM-dd'
		) AS iodc_created_date
	
	FROM
		info_operation_detail_count_app iodc
	INNER JOIN info_fa_tag_scan_app ifts ON ifts.ifts_id = iodc.ifts_id
	INNER JOIN mst_config_details_app mcd ON mcd.mcd_id = iodc.mcd_id
	INNER JOIN mst_plant_admin_app mpa ON mcd.mpa_id = mpa.mpa_id
	INNER JOIN mst_zone_admin_app mza ON mcd.mza_id = mza.mza_id
	INNER JOIN mst_station_admin_app msa ON mcd.mcd_id = msa.msa_id
	WHERE mpa.mpa_id = '$plantID' AND mza.mza_id = '$zoneID' AND msa.msa_id = '$stationID' AND 	CAST(iodc_created_date AS DATE) ='{$Date}' ";
		$res = $this->db->query($sql);
		// $row = $res->result_array();
		// return $row;
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result;
		} else {
			return "false";
		}
	}



	// ---------------------------------------- NC NG Data ---------------------------------------------------------------------------------

	public function SearchNCNGModle($plant, $zone, $station,$date)
	{
		$sql = "SELECT
		idd.idd_id,
		ifts_part_no,
		mpa.mpa_id ,
		mpa_name,
		mza.mza_id ,
		mza_name,
		msa.msa_id ,
		msa_station,
		idd_status,
		FORMAT (
			idd_create_date,
			'yyyy-MM-dd'
		) AS idd_create_date,
		CASE idd_type
	WHEN '1' THEN
		'NC'
	WHEN '0' THEN
		'NG'
	ELSE
		'Unknown'
	END AS idd_type
	FROM
		info_defect_detail_app idd
	INNER JOIN info_operation_detail_count_app iodc ON idd.iodc_id = iodc.iodc_id
	INNER JOIN info_fa_tag_scan_app ifts ON iodc.ifts_id = ifts.ifts_id
	INNER JOIN mst_defect_group_app mdg ON idd.mdg_id = mdg.mdg_id
	INNER JOIN mst_config_details_app mcd ON mdg.mcd_id = mcd.mcd_id
	INNER JOIN mst_plant_admin_app mpa ON mcd.mpa_id = mpa.mpa_id
	INNER JOIN mst_zone_admin_app mza ON mcd.mza_id = mza.mza_id
	INNER JOIN mst_station_admin_app msa ON mcd.msa_id = msa.msa_id
	WHERE mpa.mpa_id = '{$plant}' AND mza.mza_id = '{$zone}' AND msa.msa_id = '{$station}' AND 	CAST(idd_create_date AS DATE) ='{$date}'";

		$res = $this->db->query($sql);
		// $row = $res->result_array();
		// return $row;
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result;
		} else {
			return "false";
		}
	}

	public function getTableNCNG()
	{
		$sql = "SELECT
		idd.idd_id,
		ifts_part_no,
		mpa_name,
		mza_name,
		msa_station,
		idd_status,
		FORMAT (
			idd_create_date,
			'yyyy-MM-dd'
		) AS idd_create_date,
		CASE idd_type
	WHEN '1' THEN
		'NC'
	WHEN '0' THEN
		'NG'
	ELSE
		'Unknown'
	END AS idd_type
	FROM
		info_defect_detail_app idd
	INNER JOIN info_operation_detail_count_app iodc ON idd.iodc_id = iodc.iodc_id
	INNER JOIN info_fa_tag_scan_app ifts ON iodc.ifts_id = ifts.ifts_id
	INNER JOIN mst_defect_group_app mdg ON idd.mdg_id = mdg.mdg_id
	INNER JOIN mst_config_details_app mcd ON mdg.mcd_id = mcd.mcd_id
	INNER JOIN mst_plant_admin_app mpa ON mcd.mpa_id = mpa.mpa_id
	INNER JOIN mst_zone_admin_app mza ON mcd.mza_id = mza.mza_id
	INNER JOIN mst_station_admin_app msa ON mcd.msa_id = msa.msa_id";

		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	public function confirmStatusNG($ngid, $empcodeadmin)
	{
		$sql = "select * from info_defect_detail_app WHERE idd_id = '{$ngid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["idd_status"];
		if ($result == 0 || $result == 1 || $result == 5) {
			$sql = "UPDATE info_defect_detail_app SET idd_status = 5 WHERE  idd_id = '{$ngid}'";
			$sqlupdate = "UPDATE info_defect_detail_app SET idd_update_by = '{$empcodeadmin}' , idd_update_date = CURRENT_TIMESTAMP
			WHERE  idd_id = '{$ngid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		} else if ($result == 9) {
			$sql = "UPDATE info_defect_detail_app SET idd_status = 0 WHERE  idd_id = '{$ngid}'";
			$sqlupdate = "UPDATE info_defect_detail_app SET idd_update_by = '{$empcodeadmin}' , idd_update_date = CURRENT_TIMESTAMP
			WHERE  idd_id = '{$ngid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		}
	}

	public function confirmStatusNC($ncid, $empcodeadmin)
	{
		$sql = "select * from info_defect_detail_app WHERE idd_id = '{$ncid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["idd_status"];
		if ($result == 0 || $result == 1) {
			$sql = "UPDATE info_defect_detail_app SET idd_status = 5 WHERE  idd_id = '{$ncid}'";
			$sqlupdate = "UPDATE info_defect_detail_app SET idd_update_by = '{$empcodeadmin}' , idd_update_date = CURRENT_TIMESTAMP
			WHERE  idd_id = '{$ncid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		} else if ($result == 5) {
			$sql = "UPDATE info_defect_detail_app SET idd_status = 0 WHERE  idd_id = '{$ncid}'";
			$sqlupdate = "UPDATE info_defect_detail_app SET idd_update_by = '{$empcodeadmin}' , idd_update_date = CURRENT_TIMESTAMP
			WHERE  idd_id = '{$ncid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		}
	}


	public function restoreNC($ncid, $empcodeadmin)
	{
		$sql = "select * from info_defect_detail_app WHERE idd_id = '{$ncid}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		$result = $row[0]["idd_status"];
		if ($result == 5 || $result == 1 || $result == 0) {
			$sql = "UPDATE info_defect_detail_app SET idd_status = 9 WHERE  idd_id = '{$ncid}'";
			$sqlupdate = "UPDATE info_defect_detail_app SET idd_update_by = '{$empcodeadmin}' , idd_update_date = CURRENT_TIMESTAMP
			WHERE  idd_id = '{$ncid}'";
			$res = $this->db->query($sql);
			$resupdate = $this->db->query($sqlupdate);
			if ($res) {
				return "true";
			} else {
				return "false";
			}
		}
	}
	public function checknameedit($id,$dropdowneditmenu){
		$sql = "SELECT
		*
		FROM 
		sys_permission_detail_app
		WHERE spg_id = '{$id}' AND sm_id = '{$dropdowneditmenu}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if($res){
			return "duplicate";
		}else{
			return "pass";
		}
	
	}
}


