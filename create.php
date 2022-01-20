<?php

    $ID = $StartDate  = $Cost = $roomID = $bedNumber = "";
    $StartDate_err = $Cost_err = $roomID_err = $bedNumber_err = "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        //StartDate
        $input_StartDate = trim($_POST['StartDate']);
        if(empty($input_StartDate))
        {
            $StartDate_err = "please enter a starting date";
        }
        else
        {
            $StartDate = $input_StartDate;
        }

        //Cost
        $input_Cost = trim($_POST['Cost']);

        if(empty($input_Cost))
        {
            $Cost_err = "please enter a cost";
        }
        elseif (!ctype_digit($input_Cost)) 
        {
            $Cost_err = "Please enter a positive integer value.";
        }
        else
        {
            $Cost = $input_Cost;
        }

        //roomID
        $input_roomID = trim($_POST['roomID']);
        if(empty($input_roomID))
        {
            $roomID_err = "please enter a cost";
        }
        elseif (!ctype_digit($input_roomID)) 
        {
            $roomID_err = "Please enter a positive integer value.";
        }
        else
        {
            $roomID = $input_roomID;
        }

        //bedNumber
        $input_bedNumber = trim($_POST['bedNumber'])
        if(empty($input_bedNumber))
        {
            $bedNumber_err = "please enter a bed number";
        }
        elseif (!ctype_digit($input_bedNumber)) 
        {
            $bedNumber_err = "Please enter a positive integer value.";
        }
        else
        {
            $bedNumber = $input_bedNumber;
        }

        if(empty($StartDate_err) && empty($Cost_err) && empty($roomID_err) && empty($bedNumber_err))
        {
            include_once ''; ////
            $creator = new CreateAppointment();
            if($creator -> insertAppointmentDetails($StartDate, $Cost, $roomID, $bedNumber))
            {
                header(".../Index.php"); ////
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }
    }
?>