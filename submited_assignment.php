

<html>
    <head>
    <link rel="stylesheet" href= "table.css?v=<?php echo time(); ?>"/>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>" />
  <link rel="shortcut icon" href="images/29066895_1562567347195202_6346748618694721536_n.jpg" type="images/x-icon" />
  <title>Apcs Assignments</title>

    </head>
    <body>

<?php
include 'config.php'; Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Apcs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  // output data of each row
  echo "<h4 style='font-size:20px;padding-left:5%;padding-top:55px;'>The following is a list of the submited assignment and the files, if you submited a zip file, create a word document and marge the images and document,"; 
  echo "then sumbit. If your Admission Number is not right, resend your assingment with the correct details.</h4><br><br><br>";
  echo "<table>";
echo "<tr>";
echo "<th>Adm_Num</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>File</th>";
echo "</tr>";
  while($row = $result->fetch_assoc()) {

echo "<tr>";
               echo "<td>".$row['Adm_Num']."</td>";
               echo "<td>".$row['Name']."</td>";
               echo "<td>".$row['Email']."</td>";
               echo "<td>".$row['File']."</td>";
           echo "</tr>";

  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();

?>

</body>
    
</html>