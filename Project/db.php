<?php 
$user="root";
$password="";
$host="localhost";
$db="review corner";

$conn=mysqli_connect($host,$user,$password,$db);
if($conn)
{
    
}
else
{
    echo "Error connecting database";
}
?>