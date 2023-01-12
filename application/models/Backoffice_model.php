<?php
class Backoffice_model extends CI_Model
{

	public function Login($usr = '', $pwd = '')
	{
		$p['usr'] = trim($usr);
		$p['pwd'] = base64_encode(trim($pwd));

		$sqlSel = "SELECT * FROM sys_users WHERE username='{$p['usr']}' and password='{$p['pwd']}';";
		$query = $this->db->query($sqlSel);

		if ($query->num_rows() != 0) {

			$result = $query->result_array();

			if ($result['0']['enable'] != 0) {

				return $result[0];
			} else {

				$error = array('action' => 'err', 'value' => 'b');
				return $error;
			}
		} else {

			$error = array('action' => 'err', 'value' => 'i');
			return $error;
		}
	}
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

		// }

	}
	public function modelGetName($empcode)
	{
		$sql = "select ss_emp_fname,ss_emp_lname from sys_staff_web where ss_emp_code ='{$empcode}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
		// print_r($row);
	}
}
