<?php
class loginmodel extends CI_Model
{
	public function __construct() 
	{
		parent::__construct();
	} 
	
	public function validate($data)
	{
		$query = $this->db->query("select Id,FirstName,LastName,Email from SystemAdmin where UserName='".$data['userName']."' and Password='".md5($data['password'])."'");
		if($query->num_rows())
		{
			$dataRow=$query->result_array();
			$dataRow=$dataRow['0'];
			$dataRow['MenuItem']='All';
			return $dataRow;
		}
		else
		{
			return "Invalid";	
		}
	}	
		
}
?>