<?php
require('header.php'); 
session_start();
include 'config.php';
?>

<html readonly>
    <head>
        
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="apcs.css?v=<?php echo time();?>"> 
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href='images/assignment.png' rel='icon'>
         <title>
      Assignment Submission
    </title>
    <link rel="stylesheet" href="assign.css">
    <script
      src="https://kit.fontawesome.com/3749f8064c.js"
      crossorigin="anonymous"
    ></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5719984481167538"
     crossorigin="anonymous"></script>
    <script>var MyTrue = true;</script>
    </head>
    <body readonly>
        <div id='part1'>
            
                
                <div id='confirm'>
                    <h3>Unit Details</h5>
                    <p id='innertxt'></p>
                    <button type'button' id='confirm_butt' onclick="choice_1()" >Confirm</button>
                    <button type'button' id= 'cancel' onclick="choice_2()">Cancel</button>
                </div>
            
        </div>
        <div id='part3'></div>
        <div id='part2'>
        <?php
        
          if (isset($_SESSION['status'])){
               
          echo $_SESSION['status'];
          
          echo "<script>
          setTimeout(function(){ 
          var mess = document.getElementById('message');
          mess.innerHTML = '';
          ; }, 4500);
          
          setTimeout(function(){ 
          var mess = document.getElementById('message');
          mess.style.display = 'none';
          ; }, 4850);
          </script>";
          unset($_SESSION['status']);
          session_destroy();
          }
        ?>
        <div class="loadingio-spinner-eclipse-26fnxnx80ir"><div class="ldio-lz1sx3tsu">
<div></div>
</div></div>


        <div id="body">
            <div id="menu"><i class="fas fa-bars" id="fas" onclick ="fas_bar()"></i>
            <div id='menu_cont'>
                <ul>
                    <li>
                        <a href='create.php'>Create</a>
                    </li>
                    
                    <li>
                        <a href='manage.php'>Manage</a>
                    </li>
                </ul>
            </div>
            <script>
                var fas = document.getElementById('fas');
                var menu_cont = document.getElementById('menu_cont');
                function fas_bar(){
                    if(menu_cont.style.display == 'none' || MyTrue ){
                        menu_cont.style.display = 'block';
                        menu_cont.style.height = '80px';
                        MyTrue = false;
                    }else{
                        menu_cont.style.display = 'none';
                        menu_cont.style.height = '0px';
                    }
                }
            </script>
            </div><br><br>
            
                
     
            <script><?php
                    
                    if(isset($text1)){
                    $choiceQuery = "SELECT * FROM Apcs_Ass WHERE Code='".$text1."' limit 1";
                    $results_2 = mysqli_query($conn,$choiceQuery);
                    if($results_2->num_rows > 0){
                        $row_3 = mysqli_fetch_assoc($results_2);
                        $datD = $row_3['Date'];
                    }
                    }else{
                        $datD = 0;
                    }
                    ?>
            </script>
            <script>
            </script>
            <script>
                    var innertxt = document.getElementById('innertxt');
                    var selectid = document.getElementById('selectid');
                    selectid.value = idvalue;
                    <?php
                    if(isset($text1)){
                    $choiceQuery = "SELECT * FROM Apcs_Ass WHERE Code='".$text1."' limit 1";
                    $results_2 = mysqli_query($conn,$choiceQuery);
                    if($results_2->num_rows > 0){
                        while($row_2 = mysqli_fetch_assoc($results_2)){
                          echo "innertxt.innerHTML = 'Unit Code : ".$row_2['Code']."<br/>Unit Title : ".$row_2['Name']."<br/>Lecturer : ".$row_2[Lecturer]."<br/><br/>Due : ".$row_2[Date]."'";
                        
                        $tbname = $row_2['Code'];
                            
                        }
                    }}
                    ?>
            </script>
            <h4>Assingment Submission</h4>
            <div id='deadline'>
                <h3>Deadline:</h3>
            <h3 id="deadline1"></h3>
            <h3 id="deadline2"></h3>
            <h3 id="deadline3"></h3>
            <h3 id="deadline4"></h3>
            </div>
            <br>
            <form action="back.php" method= "POST" enctype="multipart/form-data">
            <div id="big_box">
                
            <div class="box">
                <br>
				
                <label for="Admin" >Select Unit Code:</label><br>
				<select name="tbname" class="myselect">
                
				<?php
				$sql = "SELECT * FROM Apcs_Ass ORDER BY `No.` DESC";
				$result = $conn->query($sql);
				?>
				       <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value = '". $row['Code'] ."' id = '". $row['DOMid'] ."'>". $row['Code'] ."</option>";
                    
                    }
                    
                }
                    else{
                        echo "<option>null</option>";
                    }
                ?>               
            </select>
<br><br>
                <label for="Admin" >Admission No:</label><br>
                <input name = "Admin" id="Admin" type ="varchar" required><br><br>
                
                <label for="Name" >Full Name:</label><br>
                <input name = "Name" id="name" type="text" required><br><br>
                
                <label for="Email" >Email: </label><br>
                <input name = "Email" id="email" type="email" required><br><br>
            </div>
            
            <label  onchange="prev()" for= "File" style="margin-top:30%;" >
            <div id="box2" class="box" style= "background:url('images/index.png') no-repeat 50% 45% ;">
        <div id="spec" ></div>
        <div id="spec2" ></div>
                <div id="file_box">
                <h4 id='uploadtxt'>Upload File</h4>
                    <div id='filedir'><p id ="filedirp1">File Directory Allowed :</p><p id='filedirp2'><i>.pdf, .doc, .docx, images</i></p></div>
                <input name="file" id="File" type="file" style="display:none; " accept="image/*,.pdf,.docx,.doc" required>
                
                </div>
            </div></label><br>
        </div>
            <script>
                var deadline1 = document.getElementById("deadline1");
                var deadline2 = document.getElementById("deadline2");
                var deadline3 = document.getElementById("deadline3");
                var deadline4 = document.getElementById("deadline4");
                var countDownDate = new Date('<?php echo $datD ?>').getTime()
                
                var myfunc = setInterval(function() {
                  // code goes here
                var now =   new Date().getTime()
                
                var timeleft = countDownDate - now;
                if (timeleft<0){
                    timeleft = 0;
                
                
                var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
                
                
                deadline1.innerHTML = days + " D" ;
                deadline2.innerHTML = hours + " H" ;
                deadline3.innerHTML = minutes + " M"  ;
                deadline4.innerHTML = seconds + " S"  ;
                
                }else{
                var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
                
                
                deadline1.innerHTML = days + " D" ;
                deadline2.innerHTML = hours + " H" ;
                deadline3.innerHTML = minutes + " M"  ;
                deadline4.innerHTML = seconds + " S"  ;
                }
                  }, 1000)
            </script>
        <script>
        
        var chooseFile = document.getElementById("File");
        var imgPreview = document.getElementById("spec");
        var imgPreview2 = document.getElementById("spec2");
        var txt = document.getElementById('uploadtxt');
        var filedirp1 = document.getElementById('filedirp1');
        var filedirp2 = document.getElementById('filedirp2');
        var filedir = document.getElementById('filedir');
        var filext = ["vnd.openxmlformats-officedocument.wordprocessingml.document", ".docx"];
        chooseFile.addEventListener("change", function () {
            getImgData();
            
        });
        
        function getImgData() {
        var files = chooseFile.files[0];
        var fileFullName = files.name;
        if (files) {
            
        var fileExtension = files.type.split("/").pop();
        if (filext.includes(fileExtension)){
        imgPreview.style.display = "none";
        imgPreview2.style.display = "block";
        txt.innerHTML = 'Change File?'
        txt.style.color = 'orange';
        txt.style.marginLeft = '85px';
        txt.style.marginTop = '0';
        filedirp1.innerHTML = fileFullName;
        filedirp2.innerHTML = '';
        filedir.style.marginTop = '20px';
        filedir.style.marginLeft = '0';
        filedir.style.height = '';
        filedir.style.width = '';
        
        }
        else{
        var fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
        imgPreview.style.display = "block";
        imgPreview2.style.display = "none";
        txt.innerHTML = 'Change File?'
        txt.style.color = 'orange';
        txt.style.marginLeft = '150px';
        txt.style.marginTop = '120px';
        filedirp1.innerHTML = fileFullName;
        filedir.style.marginTop = '100px';
        filedirp1.lineHeight = '5px';
        filedir.style.width = "150px";
        filedir.style.height = '40px';
        
        filedirp2.innerHTML = '';
        imgPreview.innerHTML = '<embed id="scaled-frame" src="' + this.result + '" width="100%" height="100%">';
    });    
  }}
}
        function upload(){
            alert();
        }
            
        </script>
         <button type="submit" name='submit' id="sendbutt">SUBMIT</button>
         
         <button type="button" onclick= "Next()" id="next"><i class="material-icons">chevron_right</i></button>
         <button type="button" onclick ="Prev()" id="previous"><i class="material-icons">chevron_left</i></button>
           
            </form>
        </div>
        <footer>
            <center><p><i>developed and deployed group 3 members</i></p></center>
        </footer>
        
        </div>
    </body>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
    var scrnwidth = screen.width;
    
    if(scrnwidth<800){
        var next = document.getElementById('next')
        
        var prev = document.getElementById('previous')
        var send = document.getElementById('sendbutt');
        var box = document.getElementsByClassName('box');
        send.style.display = 'none';
        
        next.style.display = 'inline';
        for (i=1;i< box.length;i++){
            box[i].style.display = 'none';
        }
        var a = 0;
        function Next(){
            a++
            
            if (a>1){
                a=1;
            }
            
            if(a==1){
                box[1].style.display = 'block';
                box[0].style.display = "none";
                prev.style.display = 'block';
                next.style.display = 'none';
                send.style.display = 'block';
                
            }
        }
        function Prev(){
            a--
            
            if(a<0){
                a=0;
            }
            
            if(a==0){
                box[0].style.display = 'block';
                box[1].style.display = "none";
                prev.style.display = 'none';
                next.style.display = 'block';
                send.style.display = 'none';
            }
        }
    }
    
    
       var fileval = document.getElementById("File").files[0];
       
        var div = document.getElementById("scaled");
      div.onload = function() {
        div.style.height = div.contentWindow.document.body.scrollHeight + 'px';
      }
    </script>
   
</html>