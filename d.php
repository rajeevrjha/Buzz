<?php
session_start();
if(!isset($_SESSION['team']))
header('location: team.php');
$s=$_SESSION['team'];
$conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
           $db=mysql_select_db('buzzer',$conn)or die("could not select database");

$r=mysql_query("update quiz set PressTime=now() where TeamName='$s' ");
if($r>0)
{
	$s=TRUE;
	
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

      	<?php if(isset($s)) {  ?>
      <p><center><strong> 
      <div class="alert alert-success">
         <p><strong>Buzzer pressed!</strong></p>
      </div></strong></center></p>
   <?php } ?>
   
