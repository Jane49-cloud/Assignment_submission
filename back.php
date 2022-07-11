<?php
ob_start();
session_start();
$uploadtime=date("Y-m-d");
include 'config.php';

if(isset($_POST['Admin'])){
$stdName = ucwords($_POST['Name']);
$stdAdmin = strtoupper($_POST['Admin']);
$stdEmail = lcfirst($_POST['Email']);
$tbname = $_POST['tbname'];
$tbname = str_replace(' ', '_', $tbname);


$name= $_FILES['file']['name'];
$tmp_name= $_FILES['file']['tmp_name'];
$position= strpos($name, "."); 
$fileextension= substr($name, $position + 1);
$fileextension= strtolower($fileextension);

if (isset($name)) {

$path= 'Uploads/files/';

if (!empty($name) && $name !=" "){
    
move_uploaded_file($tmp_name, $path.$name);
}
$id = "SELECT * FROM $tbname where Adm_Num = '$stdAdmin' ";

$result_1 = mysqli_query($conn,$id);
$rows = mysqli_num_rows($result_1);
if( $rows != 0){
    
$updt = "UPDATE $tbname SET File ='$name', Name ='$stdName', Email = '$stdEmail', Adm_Num ='$stdAdmin' where Adm_Num = '$stdAdmin'";
$result_2 = mysqli_query($conn,$updt);

if($result_2){
   
    $_SESSION['status'] = "<div id='message'><img src = 'images/downloadsmile.jfif'><br><p>Your assiaagnment has been updated successfully</p></div>";
    header('location: assign.php');
}
else{
    $_SESSION['status'] ="<div id='message'><img src = 'images/mood.jfif'><br><p>Something went wrong when updating</p></div>";
    header('location: assign.php');
}

}
else{
$sqli = "INSERT INTO $tbname(Adm_Num, Name, Email, File, Time) VALUE('$stdAdmin','$stdName','$stdEmail','$name', '$uploadtime')";

$query = mysqli_query($conn,$sqli);

if ($query){
    $_SESSION['status'] = "<div id='message'><img src = 'images/downloadsmile.jfif'><br><p>Your assignment has been submited successfuly to $tbname</p></div>";
    header('location : assign.php');
}else{
   //die(mysqli_error($conn));
   $_SESSION['status']="<div id='message'><img src = 'images/mood.jfif'><br><p>Submission failed, something went wrong. Please try again</p></div>";
    
    header('location:assign.php');
}
}
}


}