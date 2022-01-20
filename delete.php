<?php
if(isseet($_POST['id']) && !empty($_POST['id']))
{
    $id = $_POST['id'];
    include_once('');///model
    $delete = new DeleteClass();
    $delete->DeleteRow($id);
}
else 
{
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
?>