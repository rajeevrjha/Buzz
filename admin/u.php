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
$q=mysql_query("select TeamName,PressTime from quiz order by PressTime ");
 echo "<table class='table table-hover'> <tr><th> S No. </th> <th> TeamName </th> <th> PressTime </th> </tr>";

$id=1;
while($row=mysql_fetch_assoc($q))
{
	 echo "<tr> <td align='center' >$id</td> <td> {$row['TeamName']} </td> <td> {$row['PressTime']} </td> </tr>";
    $id=$id+1;
}
 echo "</table>";
}
?>
<!DOCTYPE html>
   <html>
      <head>
         <title>Online Quiz Admin</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Bootstrap -->
         <link href="../css/bootstrap.min.css" rel="stylesheet">
         <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
      </head>
      <body>


