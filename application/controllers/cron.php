<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

	/*
	 * Vendor Page for this controller.
	 *
	 * Manage Vendor (Add, Edit and Delete)
	 
	 */
	var $sessionData;
	
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('eridenmodel');		
	}
	
	public function FDListCron()
	{
		require(APPPATH.'ExternalFiles/Email/class.phpmailer.php');
		
		$UserId=1;
		$KeyFields=array('Id','UserId','PersonId','UserName','BankName','StartDate','MaturityDate','DepositAmount','MaturityAmount','InterestRate','AccountNumber','SavingType','DateCreated');
		$UserData=$this->eridenmodel->FDListData($UserId);
		
		$CSVList=array();
		$CSVList[]=$KeyFields;
		foreach($UserData as $data)
		{
			$tmpArray=array();
			foreach($KeyFields as $Name)
			{
				$tmpArray[$Name]=$data[$Name];	
			}
			$CSVList[]=$tmpArray;
		}
		
		$FileName='RunningSaving-'.date('Y-m-d').'.csv';
		$fp = fopen(ROOTPATH.'assets/SavingCSV/'.$FileName, 'w');
		foreach ($CSVList as $fields) 
		{
			fputcsv($fp, $fields);
		}
		
		fclose($fp);
		
		$MailBody.='<table align="center" width="100%">';
		$MailBody.='<tr><td><b>Dear Ravi<b></td></tr>';
		$MailBody.='<tr><td>&nbsp;</td></tr>';
		$MailBody.='<tr><td>Your saving alert.</td></tr>';
		$MailBody.='<tr><td>&nbsp;</td></tr>';
		$MailBody.='<tr><td><b>Member Name : </b>Ravi Ranjan Kumar</td></tr>';
		$MailBody.='<tr><td><b>Company : </b>Eriden System India</td></tr>';
		$MailBody.='<tr><td>&nbsp;</td></tr>';
		$MailBody.='<tr><td>&nbsp;</td></tr>';
		$MailBody.='<tr><td>Thanks<br/><b>Eriden System India</b></td></tr>';
		
		$email = new PHPMailer();
		$email->isHTML(true);
		$email->From = 'ravi@eridenindia.com';
		$email->FromName  = 'Eriden Accounts';
		$email->Subject   = "Your running saving alert";
		$email->Body      = $MailBody;	
		$email->AddAddress('rravi.rranjan@gmail.com');
		$email->AddAddress('pranjan736@gmail.com');
		$email->AddAttachment(ROOTPATH.'assets/SavingCSV/'.$FileName,$FileName);		
	    $email->Send();
		
		
		
		$UserData=$this->eridenmodel->CompletedFDListData($UserId);
		
		$KeyFields=array('Id','UserId','PersonId','UserName','BankName','StartDate','MaturityDate','DepositAmount','MaturityAmount','InterestRate','AccountNumber','SavingType','ReInvestment','ReInvestmentDetail','DateCreated');
		
		$CSVList=array();
		$CSVList[]=$KeyFields;
		foreach($UserData as $data)
		{
			$tmpArray=array();
			foreach($KeyFields as $Name)
			{
				$tmpArray[$Name]=$data[$Name];	
			}
			$CSVList[]=$tmpArray;
		}
		
		$FileName='CompletedSaving-'.date('Y-m-d').'.csv';
		$fp = fopen(ROOTPATH.'assets/SavingCSV/'.$FileName, 'w');
		foreach ($CSVList as $fields) 
		{
			fputcsv($fp, $fields);
		}
		
		fclose($fp);
		
		$email = new PHPMailer();
		$email->isHTML(true);
		$email->From = 'ravi@eridenindia.com';
		$email->FromName  = 'Eriden Accounts';
		$email->Subject   = "Your completed saving alert";
		$email->Body      = $MailBody;	
		$email->AddAddress('rravi.rranjan@gmail.com');
		$email->AddAddress('pranjan736@gmail.com');
		$email->AddAttachment(ROOTPATH.'assets/SavingCSV/'.$FileName,$FileName);		
	    $email->Send();
		
		//echo "<pre>";
		//print_r($UserData);
		//echo "</pre>";
		
			
	}
		
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */