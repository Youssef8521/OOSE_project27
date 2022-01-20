<?php
    /*class Login extends Controller{
        function __construct(){
            parent::__construct();
            //Session::init();
            session_start();
        }
        function Index(){
            $this->view->render('Index');
        }
        function run(){
            $this->model->run();
        }
        function logout(){
            //session::destroy();
            session_destroy();
            header('location: Index');
            exit;
        }
    }*/
    include_once('Index.php');
    include_once('model.php');


    if($_POST)
    {
        if(isset($_POST['login']) && $_POST['login'] == "Login" ){
            $userObj = new UserType();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $UserTypeID = $_POST['value'];
            $userObj = $userObj->loginType($UserTypeID);
            $view = $userObj->login($username, $password);

            if(isset($view)){
                $userObj->linkPage($page)
                {
                    if($UserTypeID == 1)//doctor
                    {
                        echo("this is the doctor site");
                    }
                    if($UserTypeID == 2)//nurse
                    {
                        echo("this is the nurse site")
                    }
                    if($UserTypeID == 3)//receptionist
                    {
                        echo("this is the receptionist site")
                    }
                }
            }
        }
    }
?>