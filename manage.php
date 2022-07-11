<?php

ob_start();
session_start();
require('header.php'); 
include 'config.php';
if (isset($_SESSION['apcs_logIn'])) {
    $apcs_table = $_SESSION['apcs_logIn'];
    $table_email = $_SESSION['table_email'];
	
} else {
    header('location:portal.php');
}

if(isset($_SESSION['emailChange'])){
    echo $_SESSION['emailChange'];
    unset($_SESSION['emailChange']);
}
$TBName = $_SESSION['apcs_logIn'];
if(isset($_POST['butLogOut'])){
    session_destroy();
    header('location:assign.php');
    
}


if(isset($_SESSION['del'])){
    echo $_SESSION['del'];
    unset($_SESSION['del']);
}


?>
<html>
    <head>
    <link rel="stylesheet" href= "table.css?v=<?php echo time(); ?>"/>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>" />
  <link rel="shortcut icon" href="images/29066895_1562567347195202_6346748618694721536_n.jpg" type="images/x-icon" />
  <title>Apcs Assignments</title>
  <style>
      #delButt{
          float:right;
          margin-right:20px;
      }
      tr{
          height:30;
      }
      td{
          padding-left:15px;
      }
      #confirmBox {
          border:1px solid grey;
          position:fixed;
          width:200px;
          background-color:red;
          padding:10px;
          top:30%;
          left:35%;
          text-align:center;
          display:none;
      }
      #changeEmailBox{
          position:fixed;
          border:1px solid grey;
          background:white;
          width:400px;
          left:35%;
          top:30%;
          padding:5%;
          display:none;
      }
      #changeEmailBox input{
          margin-top:5px;
      }
      #changeEmailBox button{
          margin-left:20px;
      }
  </style>
    </head>
    <body>

        <br>
        
        <form method = 'POST' action='manage.php' style='margin-left:30px;'>
            <button type='submit' name ='butLogOut'>Log out</button>
        </form>
        <?php
        if(isset($_SESSION['Sent'])){
            echo "<h4 style='margin-left:30px;'>".$_SESSION['Sent']."</h4>";
        }
        ?>
        <div style='border:1px solid grey;padding:10px; margin-left:30px;margin-top:5px; width:fit-content;'>
            <p>Email : <?php echo $table_email?> <span onclick='change()' style='color:blue;cursor:pointer;'> <i>Change?</i></span></p>
            
            <div id='changeEmailBox'>
                <form method='POST' action='changeEmail.php'>
                    <label for='newEmail'>New Email</label>
                    <input name='newEmail' type='email' required id='newEmail'/>
                    <br>
                    <br>
                    <input value='<?php echo $table_email?>' name ='oldEmail' style='display:none;'/>
                    <input value= '<?php echo $apcs_table?>' name ='table' style='display:none'/>
                    <button type='submit' style="background:#00d900; padding-left:10px;">Change</button>
                    <button type='button' style="background:#ff0000;" onclick= closeTab()>Cancel</button>
                    
                </form>
                
            </div>
            <script>
                function change(){
                    openChangeTab();
                }
            </script>
  <a href='send_ass.php'><button>Send to Email</button></a>
  
  <p><i>(This may take a while to upload. make sure you have a good internet connection)</i></p>
  <h4>the submited assingments are listed here below.</h4>
  </div>
  <br>
  <?php
include 'config.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $apcs_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  // output data of each row
  echo "<table>";
echo "<tr>";
echo "<th>Adm_Num</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>File</th>";
echo "</tr>";
?>
<script>
    let urls = [];
</script>
<?php

  while($row = $result->fetch_assoc()) {

echo "<tr>";
            //   $frstName = str_word_count('$row["Name"]',1);
            $names = $row['Name'];
            // echo $names;
               $been = 'Hello world';
              // if (str_word_count($names,1)[0]){
                 //  $frstName = str_word_count($names,1)[0];
               //if (str_word_count($names,1)[1]){
                  // $scndName = str_word_count($names,1)[1];
              // }
               //}
               echo "<td>".$row['Adm_Num']."<button id='delButt' onclick= delRow('".$row['Adm_Num']."','".$names."'>Delete</button></td>";
               echo "<td>".$row['Name']."</td>";
               echo "<td>".$row['Email']."</td>";
               echo "<td>".$row['File']."</td>";
               
           echo "</tr>";
           ?>
           <script>
               urls.push('http://social-ci.org/Uploads/files/'+'<?php echo $row['File']?>')
           </script>
           <?php

  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();

?>
<div id='confirmBox'>
    <h4>Do you realy want to delete the assignment of : </h4>
    <form method = 'POST' action = 'manage.php'>
        <label for = 'frstName' id = 'frstName'></label>
        <input id = 'inFrstName' name = 'frstName' style='display:none'/>
        <label for = 'scndName' id = 'scndName'></label><br>
        <input id = 'inScndName' name = 'scndName' style='display:none'/>
        <label for = 'adm' id = 'adm'></label><br>
        <input id = 'inAdm' name = 'adm' style='display:none'/>
        <br>
        <button type='submit' style='border-radius:5px;padding-right:10px;padding-left:10px;width:50px'>Yes</button>
    </form>
    <button onclick = closeTab() type='button' style='border-radius:5px;padding-right:10px;padding-left:10px;width:50px;margin-top:-38px;float:right;margin-right:5px'>No</button>
</div>
<script>
        function closeTab(){
        var confirmBox = document.getElementById('confirmBox')
        var changeEmailBox = document.getElementById('changeEmailBox')
        confirmBox.style.display = 'none';
        changeEmailBox.style.display = 'none';
        }
        
        function openTab(){
        var confirmBox = document.getElementById('confirmBox')
        confirmBox.style.display = 'block';
        }
        
        function openChangeTab(){
        var changeEmailBox = document.getElementById('changeEmailBox')
        changeEmailBox.style.display = 'block';
        }
    function delRow (adm, frstName, scndName) {
        
        var frstBox = document.getElementById('frstName')
        var scndBox = document.getElementById('scndName')
        var admBox = document.getElementById('adm')
        
        var inFrst = document.getElementById('inFrstName')
        var inScnd = document.getElementById('inScndName')
        var inAdm = document.getElementById('inAdm')
        
        inFrst.value = frstName
        inScnd.value = scndName
        inAdm.value = adm
        
        frstBox.innerHTML = frstName + ' '
        scndBox.innerHTML = scndName
        admBox.innerHTML = adm
        openTab()
    }
    
//     var zip = new JSZip();
// var count = 0;
// var zipFilename = "zipFilename.zip";
// var urls = [
//   'http://image-url-1',
//   'http://image-url-2',
//   'http://image-url-3'
// ];

// urls.forEach(function(url){
//   var filename = "filename";
//   // loading a file and add it in a zip file
//   JSZipUtils.getBinaryContent(url, function (err, data) {
//      if(err) {
//         throw err; // or handle the error
//      }
//      zip.file(filename, data, {binary:true});
//      count++;
//      if (count == urls.length) {
//       var zipFile = zip.generate({type: "blob"});
//       saveAs(zipFile, zipFilename);
//      }
//   });
// });

console.log(urls)
</script>
</body>
    
</html>