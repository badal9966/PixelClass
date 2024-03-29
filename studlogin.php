<html>

<head>
  <link rel="stylesheet" href="studlogincss.css">
</head>




<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['mail'];
$password = $_POST['pass'];

$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
echo "<script type='text/javascript'>
            if($count == 1) {
              alert('Login Successful');
            }
             else {
            alert('Login Failed');
             }
            </script>";
?>




<body>
  <div id="name">
    <img class="img" src="new pixel logo.jpg" alt="student dp"><br>
        <?php 
         $rdata=$conn->query($sql);


         if($rdata->num_rows>0)
         {
          while($row1=$rdata->fetch_assoc())
          {
            echo "<h1>".$row1['name']."</h1>";
            echo "CLASS: ".$row1['class']."<br>";
            echo "RollNo: ".$row1['rollno']."<hr>";
          }
         }
        ?><br>
    <nav class="sidebar close">
      <div class="menu-bar">

        <div class="menu">
          <ul class="menu-links">
            <li class="nav-link"><a href="studlogin.php"><span class="text nav-text">Home</span></a></li>
            <li class="nav-link"><a href="studlogininfo.htm"><span class="text nav-text">Student Info</span></a></li>
            <li class="nav-link"><a href="studloginnotification.htm"><span class="text nav-text">Notifications</span></a></li>
            <li class="nav-link"><a href="studloginsyllabus.htmV"><span class="text nav-text">Syllabus</span></a></li>
            <li class="nav-link"><a href=""><span class="text nav-text">Notes</span></a></li>
            <li class="nav-link"><a href="#"><span class="text nav-text">Time-Table</span></a></li>
            <li class="logout"><a href="stud.htm"><span class="text nav-text">Logout</span></a></li>

          </ul>
        </div>
      </div>
    </nav>    
  </div>
  
  
  <div id="main">


  </div>
</body>

</html>