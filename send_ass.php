<?php

ob_start();
session_start();

if (isset($_SESSION['apcs_logIn'])) {
    $apcs_table = $_SESSION['apcs_logIn'];
    $table_email = $_SESSION['table_email'];
} else {
    header('location:portal.php');
}
include 'config.php';
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $apcs_table";
$result = mysqli_query($conn, $sql);

if ($result){
if (mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
      
        $filename = $row['File'];
        $path = 'Uploads/files';
        $file = $path . "/" . $filename;
        
         $apcs_sub = strtoupper($apcs_table);
       
require_once('mailer/class.phpmailer.php');

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = 'mail.compsight.co.ke';
$mail->Port = 465; // or 465
$mail->IsHTML(true);
$mail->Username = 'irene@compsight.co.ke';
$mail->Password = 'ipass2022xx';
$mail->SetFrom('irene@compsight.co.ke', 'Compsight Tech');
$mail->Subject ="APCS $apcs_sub COMBINED ASSIGNMENT";
$mail->addAttachment($file);
$mail->Body = "<div id='wholebody' style='width: auto; height: auto; margin: 0 auto; padding: 50px auto; background-color: #eff0f2; '>
			<div id='mycontent' style='width: 80%; height: auto;  margin: 0 auto; padding: 0px 15px; background-color: #ffffff; color:#4b4c4f; box-shadow: 3px 3px 5px 6px #ccc; '>
							<br />
							<h2>Hello,</h2>
							<hr width='100%' style='margin-left: auto; margin-right: auto; border-style: inset; border-width: 2px; border-color:#eff0f2; '/>
							<p>You have received a message from a user on the website. Details are as below.</p>
							
							
							
						</div>
						
					<div>
			";
$mail->AddAddress($table_email);
 if(!$mail->Send()) {
$send="false";
 } else {
	 
$send="true";

}

        
      
    }
}}else{
    
        $_SESSION['Sent']= "No specified table, please log out and try again";
    header('location:manage.php');
}


// if ($_SESSION['Sent']){
//     header('location:manage.php');
// }