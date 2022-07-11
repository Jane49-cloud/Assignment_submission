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
        
        echo $file;
        $content = file_get_contents($file);
        $content = chunk_split(base64_encode($content));
        
        $mailto = $table_email;
        echo $table_email;
        $mailFrom = $row['Email'];
        $apcs_sub = strtoupper($apcs_table);
        $subject = "APCS $apcs_sub COMBINED ASSIGNMENT";
        
        $boundary = md5(time());
        
        $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
        // $headers .= "From: info@social-ci.org"."\r\n"; // Sender Email
        $headers .= "Reply-To: ".$mailFrom."\r\n"; // Email addrress to reach back
        $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
        $headers .= "boundary = $boundary\r\n"; //Defining the Boundary
        
        $message = 'Name : '.$row['Name']."\r\n";
        $message .= 'Adm No : '.$row['Adm_Num']."\r\n";
        $message .= 'Email : '.$row['Email']."\r\n";
        
        $message .= 'Please Find Attached File :'.$row['File'].'. This Is My Assignment.';
        
        $body = "--".$boundary."\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 
          
        //attachment
        $body .= "--".$boundary."\r\n";
        $body .="Content-Type:  multipart/mixed; name=".$filename."\r\n";
        $body .="Content-Disposition: attachment; filename=".$name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n"; 
        $body .= $content . "\r\n";
        $body .= "--" . $boundary . "--";
        
         //SEND Mail
         $sendMail = mail($mailto, $subject, $body, $headers);
    if ($sendMail) {
        echo 'sent ';
        $_SESSION['Sent']= "mail sent ... of $apcs_table ... to $table_email"; // or use booleans here
    } else {
        echo 'not sent';
        $_SESSION['Sent']= "mail send ... ERROR!";
        // print_r( error_get_last() );
    }
      
    }
}}else{
    
        $_SESSION['Sent']= "No specified table, please log out and try again";
    header('location:manage.php');
}


// if ($_SESSION['Sent']){
//     header('location:manage.php');
// }s