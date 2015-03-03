<?php
session_start();
if(!isset($_SESSION['team']))
{
   $c=$_SESSION['ip'];
  $conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
$db=mysql_select_db('buzzer',$conn)or die("could not select database");
$m=mysql_query("select Count from quiz where IPAddress='$c' ");
while($row=mysql_fetch_assoc($m))
{
if($row['Count']==0)
{
$r=mysql_query("update quiz set PressTime=now() where IPAddress='$c' ");

$t=mysql_query("update quiz set Count=1 where IPAddress='$c' ");
$a=TRUE;

} 
}
}
else
{
$s=$_SESSION['team'];
$conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
$db=mysql_select_db('buzzer',$conn)or die("could not select database");
$m=mysql_query("select Count from quiz where TeamName='$s' ");
while($row=mysql_fetch_assoc($m))
{
if($row['Count']==0)
{
$r=mysql_query("update quiz set PressTime=now() where TeamName='$s' ");

$t=mysql_query("update quiz set Count=1 where TeamName='$s' ");
$a=TRUE;

}
}

}



?>

<!DOCTYPE html>
   <html>
      <head>
         <title>Online Quiz Admin</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Bootstrap -->
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      </head>
      <body>

      	<?php if(isset($a)) {  ?>
      <p><center><strong> 
      <div class="alert alert-success">
         <p><strong>Buzzer pressed!</strong></p>
      </div></strong></center></p>
   <?php } ?>
   
