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
<<<<<<< HEAD
$q=mysql_query("select TeamName from quiz where Count=1 order by PressTime ");
=======
$q=mysql_query("select TeamName from quiz order by PressTime ");
>>>>>>> 6440a9446500d2b0915b495fa50c0a99e7aecceb
 echo "<table class='table table-hover'> <tr><th> S No. </th> <th> TeamName </th> </tr>";

$id=1;
while($row=mysql_fetch_assoc($q))
{
	 echo "<tr> <td align='center' >$id</td> <td> {$row['TeamName']} </td>  </tr>";
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


