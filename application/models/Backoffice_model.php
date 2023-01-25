<?php
class Backoffice_model extends CI_Model
{
	// *********************************LOGINPAGE *********************************************************
	public function modelCheckLogin($empcode, $password_encoded)
	{
		$sql = "select * from sys_staff_web where ss_emp_code ='{$empcode}' and ss_emp_password ='{$password_encoded}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if (empty($row)) {
			return "false";
		} else {
			return "true";
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
		// if($email =! ""){
		$sql = "select * from sys_staff_web where ss_email ='{$email}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		// var_dump();
		// exit();
		if ($row == null) {
			return 'false';
		} else {
			$sql = "update sys_staff_web set ss_emp_password = '{$password_encoded}' where ss_email = '{$email}'";
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
		INNER JOIN sys_permision_group_web ON sys_staff_web.spg_id=sys_permision_group_web.spg_id
		INNER JOIN sys_permision_detail_web ON sys_permision_group_web.spg_id = sys_permision_detail_web.spg_id
		INNER JOIN sys_submenu_web ON sys_permision_detail_web.ssm_id =sys_submenu_web.ssm_id
		INNER JOIN sys_menu_web ON sys_submenu_web.sm_id = sys_menu_web.sm_id
		INNER JOIN mst_plant_admin_web  ON  sys_staff_web.mpa_id = mst_plant_admin_web.mpa_id 
		
		WHERE  ss_emp_code = 'SD463' and  ssm_status = '1' ORDER BY ss_id";

		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
		// echo "<pre>";
		//  print_r($row);
		// echo "</pre>";
	}
	// *********************** getphasetoEditProfile ***********************************************************************

	public function modelGetPhase()
	{
		$sql = "select mpa_phase_plant,mpa_name from mst_plant_admin_web ";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	// *********************** UPDATEUSER IN EDITPROFILEPAGE ***********************************************************************

	public function convert($attr, $table, $condition){
		$sql ="select $attr from $table where $condition";
		$query = $this->db->query($sql);
		$get = $query->result_array();
		if (empty($get)) {
			return "0";
		} else {
			return $get["0"][$attr];
		}
	}
	public function modelUpdateDetailUser($empcode,$firstname,$lastname,$email,$plant)
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
}
