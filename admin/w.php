<?php
session_start();
if(!isset($_SESSION['user']))
{
   header('location:index.php');
}
else
{
$conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
$db=mysql_select_db('buzzer',$conn)or die("could not select database");
$q=mysql_query("update quiz set Count=0 where Count=1");
}
?>