<?php

    if(isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = $_POST['id'];

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
        $input_bedNumber = trim($_POST['bedNumber']);
        
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

        if(empty($input_StartDate) && empty($input_Cost) && empty($input_roomID) && empty($input_bedNumber))
        {
            include_once '';
            $updator = new UpdateClass();
            if($updator -> updateRecord($StartDate, $Cost, $roomID, $bedNumber))
            {
                header(".../Index.php");
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
        mysql_close($link);
    }
    else
    {
        if(isset($_GET['id']) && !empty(trim($_GET['id'])))
        {
            $id = trim($_GET[$id]);
            $sql = "SELECT  * FROM appointmentdetails WHERE id= ?";
            if($stmt = mysqli_prepare($link, $sql))
            {
                mysql_stmt_bind_parameters($stmt, "i", $parameter_id);
                $parameter_id = $id;

                if(mysqli_stmt_execute($stmt))
                {
                    $result = mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result)==1)
                    {
                        $row = mysqli_fetch_array($result, mysqli_assoc);
                        $StartDate = $row["StartDate"];
                        $Cost = $row["Cost"];
                        $roomID = $row["roomID"];
                        $bedNumber =$row["bedNumber"];
                    }
                    else
                    {
                        header("location: error.php");
                        exit();
                    }
                }
                else
                {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        }
        else
        {
            header("location: error.php");
            exit();
        }
    }
?>
