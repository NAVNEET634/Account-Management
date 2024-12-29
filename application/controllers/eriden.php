<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eriden extends CI_Controller {

	/*
	 * Vendor Page for this controller.
	 *
	 * Manage Vendor (Add, Edit and Delete)
	 
	 */
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('eridenmodel');
		if($this->session->userdata("loginUserData"))
		{
			$this->sessionData = $this->session->userdata("loginUserData");
		}
		else
		{
			 redirect(base_url(), 'refresh');
			 die;  	
		}
	}
	
	/* Manage FD Codes */
	public function FDList()
	{
		$this->load->innerTemplate('eriden/FDList');
	}
	
	public function FDListData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		echo json_encode($this->eridenmodel->FDListData($UserId));		
	}
	
	
	public function CompletedFDList()
	{
		$this->load->innerTemplate('eriden/CompletedFDList');
	}
	
	public function CompletedFDListData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		echo json_encode($this->eridenmodel->CompletedFDListData($UserId));		
	}
	
	public function SaveFDData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		if($_POST['FDId'])
		{
			$FDId=$_POST['FDId'];
			unset($_POST['FDId']);
			$this->eridenmodel->UpdateFDData($_POST,$FDId);	
		}
		else
		{
			unset($_POST['FDId']);
			$_POST['DateCreated']=date('Y-m-d H:i:s');
			$_POST['UserId']=$UserId;
			$this->eridenmodel->SaveFDData($_POST);	
		}
	}
	
	public function FDUpdate($FDId)
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		echo json_encode($this->eridenmodel->FDUpdate($FDId,$UserId));
	}
	
	public function FDDelete()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		$this->eridenmodel->FDDelete($_POST['FDId'],$UserId);
	}
	/* Manage FD Codes */
	
	
	
	
	/* Manage Insurance Codes */
	public function InsuranceList()
	{
		$this->load->innerTemplate('eriden/InsuranceList');
	}
	
	public function InsuranceListData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		echo json_encode($this->eridenmodel->InsuranceListData($UserId));		
	}
	
	public function SaveInsuranceData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		if($_POST['InsuranceId'])
		{
			$InsuranceId=$_POST['InsuranceId'];
			unset($_POST['InsuranceId']);
			$this->eridenmodel->UpdateInsuranceData($_POST,$InsuranceId);	
		}
		else
		{
			unset($_POST['InsuranceId']);
			$_POST['UserId']=$UserId;
			$_POST['DateCreated']=date('Y-m-d H:i:s');
			$this->eridenmodel->SaveInsuranceData($_POST);	
		}
	}
	
	public function InsuranceUpdate($InsuranceId)
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		echo json_encode($this->eridenmodel->InsuranceUpdate($InsuranceId,$UserId));
	}
	
	public function InsuranceDelete()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		$this->eridenmodel->InsuranceDelete($_POST['InsuranceId'],$UserId);
	}
	/* Manage Insurance Codes */
	
	
	
	
	/* Manage CSR Transaction Codes */
	public function CSRList($UserId=NULL)
	{
		$SessionData=$this->session->userdata("loginUserData");
		$PsersonId=$SessionData['Id'];
		
		$data['CSRData']=$this->eridenmodel->CSRListData($PsersonId,$UserId);
		$this->load->innerTemplate('eriden/CSRList',$data);
	}
	
	public function SaveCSRData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$PersonId=$SessionData['Id'];
		
		if($_POST['CSRId'])
		{
			$CSRId=$_POST['CSRId'];
			unset($_POST['CSRId']);
			$this->eridenmodel->UpdateCSRData($_POST,$CSRId);	
		}
		else
		{
			unset($_POST['CSRId']);
			$_POST['DateCreated']=date('Y-m-d H:i:s');
			$_POST['PersonId']=$PersonId;
			$this->eridenmodel->SaveCSRData($_POST);	
		}
	}
	
	public function CSRUpdate($CSRId)
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		echo json_encode($this->eridenmodel->CSRUpdate($CSRId,$UserId));
	}
	
	public function CSRDelete()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		$this->eridenmodel->CSRDelete($_POST['CSRId'],$UserId);
	}
	/* Manage CSR Transaction Codes */
	
	
	
	/* Manage Person Codes */
	public function PersonList()
	{
		$this->load->innerTemplate('eriden/PersonList');
	}
	
	public function PersonListData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		echo json_encode($this->eridenmodel->PersonListData($UserId));		
	}
	
	public function SavePersonData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		if($_POST['PersonId'])
		{
			$PersonId=$_POST['PersonId'];
			unset($_POST['PersonId']);
			$this->eridenmodel->UpdatePersonData($_POST,$PersonId);	
		}
		else
		{
			unset($_POST['PersonId']);
			$_POST['UserId']=$UserId;
			$_POST['DateCreated']=date('Y-m-d H:i:s');
			$this->eridenmodel->SavePersonData($_POST);	
		}
	}
	
	public function PersonUpdate($PersonId)
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		echo json_encode($this->eridenmodel->PersonUpdate($PersonId,$UserId));
	}
	
	public function PersonDelete()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		$this->eridenmodel->PersonDelete($_POST['PersonId'],$UserId);
	}
	/* Manage Person Codes */
	
	
	/* Manage Assets */
	public function AssetsList()
	{
		$this->load->innerTemplate('eriden/AssetsList');
	}
	
	public function AssetsListData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		echo json_encode($this->eridenmodel->AssetsListData($UserId));		
	}
	
	public function SaveAssetsData()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		if($_POST['AssetId'])
		{
			
			if($_FILES['FileName']['name'])
			{
				$FileName=str_replace(' ','_',$_FILES['FileName']['name']);
				$FileName=str_replace("'",'',$FileName);
				$FileName=str_replace('"','',$FileName);
				$OriginalFileName=$FileName;
				$FileName=rand(1,9).'_'.$FileName;
				move_uploaded_file($_FILES['FileName']['tmp_name'],ROOTPATH.'assets/ASSETS/'.$UserId.'/'.$FileName);
				$_POST['FileName']=$FileName;
			}
			
			$AssetId=$_POST['AssetId'];
			unset($_POST['AssetId']);
			$this->eridenmodel->UpdateAssetsData($_POST,$AssetId);	
		}
		else
		{
			if(!file_exists(ROOTPATH.'assets/ASSETS/'.$UserId)) 
			{
				mkdir(ROOTPATH.'assets/ASSETS/'.$UserId);	
			}
			
			if($_FILES['FileName']['name'])
			{
				$FileName=str_replace(' ','_',$_FILES['FileName']['name']);
				$FileName=str_replace("'",'',$FileName);
				$FileName=str_replace('"','',$FileName);
				$OriginalFileName=$FileName;
				$FileName=rand(1,9).'_'.$FileName;
				move_uploaded_file($_FILES['FileName']['tmp_name'],ROOTPATH.'assets/ASSETS/'.$UserId.'/'.$FileName);
				$_POST['FileName']=$FileName;
			}
						
			unset($_POST['AssetId']);
			$_POST['UserId']=$UserId;
			$_POST['DateCreated']=date('Y-m-d H:i:s');
			$this->eridenmodel->SaveAssetsData($_POST);	
		}
		redirect(base_url().'eriden/AssetsList/', 'refresh');
		die;
			
	}
	
	public function AssetsUpdate($AssetId)
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		echo json_encode($this->eridenmodel->AssetsUpdate($AssetId,$UserId));
	}
	
	public function AssetsDelete()
	{
		$SessionData=$this->session->userdata("loginUserData");
		$UserId=$SessionData['Id'];
		
		$this->eridenmodel->AssetsDelete($_POST['AssetId'],$UserId);
	}
	/* Manage Assets */
		
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */