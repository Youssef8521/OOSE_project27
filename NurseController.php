<?php
include_once '../ModelUsers/Nurse.php';
include_once '../Interfaces/Salarysubj.php';
include_once '../Interfaces/Observer.php';
include_once '../ModelUsers/Doctor.php';
include_once '../Interfaces/NotifyAllUsers.php';
include_once '../Command/input.php';
include_once '../Command/MoveDown.php';
include_once '../Command/MoveLeft.php';
include_once '../Command/MoveRight.php';
include_once '../Command/MoveUp.php';
include_once '../Command/RemoteControlInput.php';
include_once '../Command/Bed.php';
include_once '../EAV/OrderT.php';
include_once 'Medicine.php';
include_once 'ProxyMedicine.php';
if ($_POST) {
    if (isset($_POST['Salupdate'])) {
     

        $NS = new Nurse(-1);
        $s = new Salarysubj();
        $s->setState($_POST['salary']);
	    $List = $NS->NotifyUsers($s , 4);
        $s->notify($List);
    }
    if (isset($_POST['BloodTest'])) {
     
	   
        $Bl = new BloodTest();
        $Bl_Details = new BloodTest();
        $Bl_Details->Haemoglobin = $_POST['Haemoglobin'];
        $Bl_Details->Neutrophilis = $_POST['Neutrophilis'];
        $Bl_Details->Lymphocytes = $_POST['Lymphocytes'];
        
 
        $D = new Nurse(1);
	    $D->SetTest($Bl);
        $D->DoTestFunction($Bl_Details , 2);
    }

    if (isset($_POST['UrineTest'])) {
     
 
        $Ur = new UrineTest();
        $Ur_Details = new UrineTest();
        $Ur_Details->Color = $_POST['color'];
        $Ur_Details->Appearance = $_POST['Appearance'];
        $Ur_Details->Mucus = $_POST['Mucus'];
        $Ur_Details->PH = $_POST['Ph'];
        

 
        $D = new Nurse(1);
	    $D->SetTest($Ur);
        $D->DoTestFunction($Ur_Details , 2);
      
    }
    if(isset($_POST['Move']))
	{
		$mov_adjuster = null;
		if($_POST['MoveOption'] == 'LEFT')
		{
			$mov_adjuster = new moveLeft($_POST['BedID']);
			$b = new Bed();
			$b->takeInput($mov_adjuster);
			$b->executeInput();
		}
		if($_POST['MoveOption'] == 'RIGHT')
		{
			$mov_adjuster = new moveRight($_POST['BedID']);
			$b = new Bed();
			$b->takeInput($mov_adjuster);
			$b->executeInput();	
		}
		if($_POST['MoveOption'] == 'UP')
		{
			$mov_adjuster = new moveUp($_POST['BedID']);
			$b = new Bed();
			$b->takeInput($mov_adjuster);
			$b->executeInput();	
		}
		if($_POST['MoveOption'] == 'DOWN')
		{
			$mov_adjuster = new moveDown($_POST['BedID']);
			$b = new Bed();
			$b->takeInput($mov_adjuster);
			$b->executeInput();	
		}
	}

	if(isset($_POST['Order']))
	{

	  $ns = new Nurse("");
	  $ord = new TestOrder("");
	  $ord->NurseId = $_POST['Nid'];
	  $ord->PatientId = $_POST['Pid'];
	   date_default_timezone_set('Africa/Cairo');
	  $ord->DateTimeStamp = date('l jS \of F Y h:i:s A');
	  $ns->AddOrder($ord);

	}     

    if(isset($_POST['mSubmit']))
    {

        $m = new Medicine();
        $m->medicineName = $_POST['mName'];
        $m->medicineID = $_POST['mID'];
        $m->medicineExpirationYear = $_POST['mYear'];

        $p = new Proxy();
        $p->InsertMedicine($m);

    }
}

?>