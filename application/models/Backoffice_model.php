<?php
class Backoffice_model extends CI_Model
{
	// LOGINPAGE
	public function modelCheckLogin($empcode, $password_encoded)
	{
		$sql = "select * from sys_staff_web where ss_emp_code ='{$empcode}' and ss_emp_password ='{$password_encoded}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		// return json_encode($row);
		if (empty($row)) {
			return "false";
		} else {
			return "true";
		}
	}
	public function modelCheckLoginSession($empcode, $password_encoded)
	{
		$sql = "select * from sys_staff_web where ss_emp_code ='{$empcode}' and ss_emp_password ='{$password_encoded}'";
		$res = $this->db->query($sql);
		if($res->num_rows()!=0)
        {
            $result = $res->result_array();
            return $result[0];  
        }
        else
        {    
            return false;
        }
		// if (empty($row)) {
		// 	return "false";
		// } else {
		// 	return "true";
		// }
	}
	
	// FORGOTPASSWORD
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

		// GETNAMETOHOME

	
	}
	public function modelGetName($empcode)
	{
		$sql = "select ss_emp_fname from sys_staff_web where ss_emp_code ='{$empcode}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
		// print_r($row);
	}
}
