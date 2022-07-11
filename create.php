<?php
require('header.php'); 
include 'config.php';
if (isset($_POST['unitname'])){
    $unitname= $_POST['unitname'];
    $unitcode= $_POST['unitcode'];
    $lecname= $_POST['lecname'];
    $duedate= $_POST['duedate'];
    $total=$_POST['total'];
    $email= $_POST['email'];
    $pass= md5($_POST['password']);
    $DOMid = str_replace(' ', '_', $unitcode);
    
    if($unitname != '' && $unitcode != '' && $lecname != '' && $duedate != '' && $DOMid != '' && $email != '' && $total != ''  ){
    $selquery = "SELECT * FROM Apcs_Ass WHERE Lecturer= '$lecname'";
    
    $selres = mysqli_query($conn, $selquery);    
    if(mysqli_num_rows($selres)>0){
        echo 'assignment already exists please confirm </br>';
    }else{
    $insquery = "INSERT INTO Apcs_Ass(Code, Name,Lecturer,DOMid,Date,Email,Pass,total) VALUE('$unitcode','$unitname','$lecname','$DOMid','$duedate','$email','$pass', '$total') ";
    $tbsql = "CREATE TABLE $DOMid (
Adm_Num VARCHAR(100) PRIMARY KEY,
Name VARCHAR(30) NOT NULL,
Email VARCHAR(30) NOT NULL,
File VARCHAR(50),
Time date
)";
    
    $tbres = mysqli_query($conn, $tbsql);
    
    if ($tbres){
    $insres = mysqli_query($conn,$insquery);
    if($insres){
        echo 'assignment created<br>';
        session_destroy();
    }else{
        echo 'creation failed, please check on your entry data <br>';
        session_destroy();
    }
    }else{
        echo 'table not created, there might be a similar table <br>';
        session_destroy();
    }
    
    }
}else{
    echo 'A field was missing missing please retry';
    session_destroy();
}
    
}

?>
<html readonly>
    <head>
        
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- <link rel="stylesheet" href="apcs.css?v=<?php echo time();?>">  -->
 <link rel="stylesheet" href="forms.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href='images/assignment.png' rel='icon'>
         <title>
     Create-Assignment
    </title>
    <script
      src="https://kit.fontawesome.com/3749f8064c.js"
      crossorigin="anonymous"
    ></script>
    <style>
        input{
            display:block;
            margin-top:20px;
        }
    </style>
    <script>var MyTrue = true;</script>
    </head>
    <body readonly>
    
    <div>
    <form action='create.php' method='POST'>
        <h3>Create assignment </h3>
    <div class="form-items">
    <label for="Unitname">Unit Name: </label> 
    <input type='text' name = 'unitname' placeholder='unit title eg. Computer Science' required/>

    <label for="unitcode">Unit Code: </label>
    <input type='varchar' name = 'unitcode' placeholder='unit code eg. ICS 2122' required/>

    <label for="lecname">Lecturer Name: </label> 
    <input type='text' name = 'lecname' placeholder='lec name eg. Mark Okeyo' required/>

    <label for="email">Submission Email: </label> 
    <input type='email' name = 'email' placeholder='Sub email eg. example@gmail.com' required/>

    <label for="Date">Due Date: </label> 
    <input type='date' name = 'duedate' placeholder='due date'  required/>

    <label for="password">Managing Password: </label> 
    <input type='text' name = 'password' placeholder='managing password'  required/>

    <label for="total">Class Total: </label> <br/> 
    <input type='number' name = 'total' placeholder='class-total'  required/> <br>

    <button type='submit  style='border-radius:5px;'>create</button>
    </div>
    </form>
    
    <a href='assign.php'>back home</a>
    </div>
    </body>
    </html>