<?php
if(isseet($_POST['id']) && !empty($_POST['id']))
{
    $id = $_POST['id'];
    $Date = $_POST['Date'];
    include_once('');///model
    $update = new UpdateClass();
    $update->UpdateRow($id, $Date);
}
else 
{
    if (empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
?>