<?php //Reused a team member's code from Semester 1 (Oudesha Choony)
$servername="localhost";
$username="root";
$password="";
$dbname="opal_glow";
$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn-> connect_error){
    die("database connection failed: ".$conn->connect_error);
}
?> 