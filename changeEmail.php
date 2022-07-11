<?php
ob_start();
session_start();

include 'config.php';

if (isset($_SESSION['apcs_logIn'])) {
    $apcs_table = $_SESSION['apcs_logIn'];
    $table_email = $_SESSION['table_email'];
} else {
    header('location:portal.php');
}
$TBName = $_SESSION['apcs_logIn'];
if(isset($_POST['butLogOut'])){
    session_destroy();
    header('location:assign.php');
    
}

$oldMail = $_POST['oldEmail'];
$newMail = $_POST['newEmail'];
$table = $_POST['table'];

// echo $oldMail;
// echo $newMail;
// echo $table;

$changeSql = "UPDATE Apcs_Ass SET Email = '$newMail' WHERE Email = '$oldMail' AND DOMid = '$table'";
$changeRes = mysqli_query($conn,$changeSql);
// echo $changeSql;

if ($changeRes){
    $_SESSION['table_email'] = $newMail;
    $_SESSION['emailChange'] = "<script>alert('Email Changed Successfuly')</script>";
    header('Location:manage.php');
}else{
    $_SESSION['emailChange'] = "<script>alert('Changing Email Failed, Try Again')</script>";
    header('Location:manage.php');
}