<?php
ob_start();
session_start();
include 'config.php';
require('header.php'); 


if (isset($_SESSION['logIns'])){
    $rmes= $_SESSION['logIns'];
    echo "<script>alert('".$rmes."')</script>";
    unset($_SESSION['logIns']);
    
}else{
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="forms.css">
    
</head>

<body>
    <div id="box"><?php

                    if ($conn) {
                        if (isset($_POST['admNo'])) {
                            $AdmNo = $_POST['admNo'];
                            $AdmCode = md5($_POST['admCode']);

                            $query = "SELECT * FROM Apcs_Ass WHERE Code = '$AdmNo' AND Pass ='$AdmCode'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while($row=mysqli_fetch_assoc($result)){
                                        $apcs_table=$row[DOMid];
                                        $table_email=$row[Email];
                                    }
                                    $_SESSION['apcs_logIn'] = $apcs_table;
                                    $_SESSION['table_email'] = $table_email;
                                    header('location:manage.php');
                                
                            } else {
                                echo "<p id='denied' style='text-align:center;'>Access Denied, try again!<p>";
                            }
                        }
                    } else {
                        echo 'failed to fetch database, please try again later';
                    }
                    ?>
                    <br>
                    <br>
        <form action="portal.php" method="POST" id='form2'>
          <div class="form-items">
          <label for="AdmNo">Unit Code</label><br> <br>
            <input type="varchar" placeholder='eg. ICS 2122' name="admNo" id="AdminNo" required>
            
            <br>
            <label for="Admcode">Managing Password</label><br> <br>
            <input type="password" name="admCode" id="AdminCode" required> <br> <br>
            <button type="submit" name='logIn'>Log In</button>
          
          </div>
        </form>
        <br>
        <br>
      
    </div>
</body>

</html>