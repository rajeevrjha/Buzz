<?php
session_start();
          if(isset($_POST['submit']))
          {
          	$t=$_POST['t_name'];
          	$_SESSION['team']=$_POST['t_name'];
          	$ip=getenv(REMOTE_ADDR);
          	$i=$ip;
          	$_SESSION['ip']=$ip;
          	$conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
           $db=mysql_select_db('buzzer',$conn)or die("could not select database");
          
           $result=mysql_query("insert into quiz(TeamName,IPAddress)values('$t','$i')") or die('query execution failed'.mysql_error());
           if($result>0)
           {
              $success=true;
              header('location: index.php');

           }
           
          }





?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/bootstrap-theme.min.css" rel="stylesheet">
 
 <div class="row">
    <div class="col-md-6 col-md-push-3">
      <div class="jumbotron">
        <fieldset>
          <legend class="center-block"><b>Enter Team Name</b></legend>
          <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
           <div class="form-group">
            <div class"col-xs-2">
                 <input type="text" class="form-control span3" name="t_name" placeholder="Enter Team Name">
              </div>
           </div>
            <p align="center"><button type="submit" class="btn btn-primary span5" name="submit" >Submit</button> </p>
          </form>

          

