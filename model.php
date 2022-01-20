<?php
class UserType{
    function loginType($type)
    {
        $userTypeObj;
        if($type == 1) //doctor
        {
            $userTypeObj = new Doctor();
            return $userTypeObj;
        }
        if($type == 2) //nurse
        {
            $userTypeObj = new Nurse();
            return $userTypeObj;
        }
        if($type == 3) //receptionist
        {
            $userTypeObj = new Receptionist();
            return $userTypeObj;
        }
    }

    function login($username, $password)
    {
        //
    }
}

include_once("Myclasses.php");
class loginCheck
{
    function checkLogin($username, $pass)
    {
        $con = mysqli_connect("localhost", "root", "", "hospitalproject");
        if(!$con)
        {
            die('Could not connect: ' . mysqli_error());
        }

        $query = "select * from user where ID= '$username' limit 1";

        $sql = "select * from user where ID ='" . $username . "' and Password= '" . $pass.="'";
        $result = mysqli_query($con, $sql);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $userobj= new user($username);
                echo "welcome: " .$userobj->Name;
            }
            else
            {
                echo "not found";
            }
        }
    }
}




?>