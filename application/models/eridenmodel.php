<?php
class eridenmodel extends CI_Model
{
	public function __construct() 
	{
		parent::__construct();
	}
	
	/* Manage FD Codes */
	
	public function FDListData($UserId)
	{
		$query = $this->db->query("select FD.*,P.PersonName as UserName from FD INNER JOIN Person P ON P.Id=FD.PersonName and FD.UserId='$UserId' and FD.MaturityDate>'".date('Y-m-d')."' order by MaturityDate ASC");
		return $query->result_array();
	}
	
	public function CompletedFDListData($UserId)
	{
		$query = $this->db->query("select FD.*,P.PersonName as UserName from FD INNER JOIN Person P ON P.Id=FD.PersonName and FD.MaturityDate<='".date('Y-m-d')."' and FD.UserId='$UserId' order by MaturityDate DESC");
		return $query->result_array();
	}
	
	public function SaveFDData($Data)
	{
		$this->db->insert('FD',$Data);		
	}
	
	public function FDUpdate($FDId,$UserId)
	{
		$query = $this->db->query("select * from FD where Id='$FDId' and FD.UserId='$UserId'");
		$FDData=$query->result_array();
		return $FDData['0'];
	}
	
	public function UpdateFDData($Data,$FDId)
	{
		$this->db->where('Id', $FDId);
		$this->db->update('FD',$Data);		
	}
	
	public function FDDelete($FDId,$UserId)
	{
		$query = $this->db->query("delete from FD where Id='$FDId' and UserId='$UserId'");
	}
	
	/* Manage FD Codes */
	
	
	
	/* Manage Insurance Codes */
	
	public function InsuranceListData($UserId)
	{
		$query = $this->db->query("select * from Insurance where UserId='$UserId' order by Id DESC");
		return $query->result_array();
	}
	
	public function SaveInsuranceData($Data)
	{
		$this->db->insert('Insurance',$Data);		
	}
	
	public function InsuranceUpdate($InsuranceId,$UserId)
	{
		$query = $this->db->query("select * from Insurance where Id='$InsuranceId' and UserId='$UserId'");
		$InsuranceData=$query->result_array();
		return $InsuranceData['0'];
	}
	
	public function UpdateInsuranceData($Data,$InsuranceId)
	{
		$this->db->where('Id', $InsuranceId);
		$this->db->update('Insurance',$Data);		
	}
	
	public function InsuranceDelete($InsuranceId,$UserId)
	{
		$query = $this->db->query("delete from Insurance where Id='$InsuranceId' and UserId='$UserId'");
	}
	
	/* Manage Insurance Codes */
	
	
	
	/* Manage CSR Transaction Codes */
	
	public function CSRListData($PersonId,$UserId)
	{
		$Where[]="CSR.UserId!='0'";
		if($UserId)
		{
			$Where[]="CSR.UserId='".$UserId."'";	
		}
		$query = $this->db->query("select CSR.*,P.PersonName from CSRTransaction CSR INNER JOIN Person P ON P.Id=CSR.UserId and CSR.PersonId='$PersonId' and ".implode(' and ',$Where)." order by CSR.DateCreated DESC");
		$DataRow=array();
		foreach($query->result_array() as $Key=>$data)
		{
			$DataRow[$data['PersonName']][]=$data;			
		}
		
		if($UserId=='')
		{
			foreach($DataRow as $PersonName=>$PersonData)
			{
				$TotalDebit=0;
				$TotalCredit=0;
				foreach($PersonData as $data)
				{
					$TotalCredit+=$data['CreditedBy'];	
					$TotalDebit+=$data['DebitedBy'];			
				}
				if($TotalCredit-$TotalDebit==0)
				{
					unset($DataRow[$PersonName]);	
				}
			}
		}
		
		//echo "<pre>";
		//print_r($DataRow);
		//echo "</pre>";
		return $DataRow;
		
	}
	
	public function SaveCSRData($Data)
	{
		$this->db->insert('CSRTransaction',$Data);		
	}
	
	public function CSRUpdate($CSRId,$UserId)
	{
		$query = $this->db->query("select * from CSRTransaction where Id='$CSRId' and PersonId='$UserId'");
		$CSRData=$query->result_array();
		return $CSRData['0'];
	}
	
	public function UpdateCSRData($Data,$CSRId)
	{
		$this->db->where('Id', $CSRId);
		$this->db->update('CSRTransaction',$Data);		
	}
	
	public function CSRDelete($CSRId,$UserId)
	{
		$query = $this->db->query("delete from CSRTransaction where Id='$CSRId' and PersonId='$UserId'");
	}
	
	/* Manage CSR Transaction Codes */
	
	
	
	
	/* Manage Pserson Codes */
	
	public function PersonListData($UserId)
	{
		$query = $this->db->query("select * from Person where UserId='$UserId' order by PersonName ASC");
		return $query->result_array();
	}
	
	public function SavePersonData($Data)
	{
		$this->db->insert('Person',$Data);		
	}
	
	public function PersonUpdate($PersonId,$UserId)
	{
		$query = $this->db->query("select * from Person where Id='$PersonId' and UserId='$UserId'");
		$PersonData=$query->result_array();
		return $PersonData['0'];
	}
	
	public function UpdatePersonData($Data,$PersonId)
	{
		$this->db->where('Id', $PersonId);
		$this->db->update('Person',$Data);		
	}
	
	public function PersonDelete($PersonId,$UserId)
	{
		$query = $this->db->query("delete from Person where Id='$PersonId' and UserId='$UserId'");
	}
	
	/* Manage Person Codes */
	
	
	
	/* Manage Assets */
	
	public function AssetsListData($UserId)
	{
		$query = $this->db->query("select * from Assets where UserId='$UserId' order by Id DESC");
		return $query->result_array();
	}
	
	public function SaveAssetsData($Data)
	{
		$this->db->insert('Assets',$Data);		
	}
	
	public function AssetsUpdate($InsuranceId,$UserId)
	{
		$query = $this->db->query("select * from Assets where Id='$InsuranceId' and UserId='$UserId'");
		$InsuranceData=$query->result_array();
		return $InsuranceData['0'];
	}
	
	public function UpdateAssetsData($Data,$InsuranceId)
	{
		$this->db->where('Id', $InsuranceId);
		$this->db->update('Assets',$Data);		
	}
	
	public function AssetsDelete($AssetId,$UserId)
	{
		$query = $this->db->query("delete from Assets where Id='$AssetId' and UserId='$UserId'");
	}
	
	/* Manage Assets */
	
		
}
?>