<?php
session_start();
          if(isset($_POST['submit']))
          {
            
          	$t=$_POST['t_name'];
            if($t==NULL)
            {
              $r=TRUE;
              

            }
            else
            {
          	$_SESSION['team']=$_POST['t_name'];
          
           

          	$ip=getenv('REMOTE_ADDR');
          	$i=$ip;
          	$_SESSION['ip']=$ip;
          	$conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
           $db=mysql_select_db('buzzer',$conn)or die("could not select database");
           $t=mysql_real_escape_string($t);
           $n=mysql_query("select * from quiz where IPAddress= '$i' ");
           $m=mysql_query("select * from quiz where TeamName= '$t' ");
           $o=mysql_num_rows($n);
           $p=mysql_num_rows($m);

           if(($o>0)&&($p>0))
           {
           
            $g=TRUE;
    
          }
          else if($o>0)
          {
            $e=TRUE;
          }

          else if($p>0)
          {
            $f=TRUE;
          }



          else
          {
            
           $result=mysql_query("insert into quiz(TeamName,IPAddress)values('$t','$i')") or die('query execution failed'.mysql_error());
           if($result>0)
           {
              $success=true;
              header('location: index.php');

           }
         }
           
          }

}



?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
  <style>
  body {
        font-family: 'Tangerine', serif;
        font-size: 30px;
      }
      img
      {
        margin-left: 200px;
        margin-right: 300px;
      }
      #k
      {
        margin-left: 200px;
      
        font-size: 30px;
      }
      #l
      {
        font-size:30px;
      }
      #ko
      {
        display: inline-block;
        height: 50px;
        width: 100px;
      }
      #e::-webkit-input-placeholder {
    font-family: Arial;
    font-size: 15px;

}
#e
{
  height: 50px;
  font-family: Arial;
    font-size: 15px;
}
      </style>
 <div class="row">
    <div class="col-md-6 col-md-push-3">
      <img src="nm.gif">
        
          <b><p id="k">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Enter Team Name </p></b>
          <form class="form-horizontal" role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
           <div class="form-group">
            <div class"col-xs-2">
                 <input type="text" class="form-control span3" name="t_name" id="e" placeholder="Enter Team Name">
              </div>
           </div>
            <p align="center"><button type="submit" class="btn btn-primary span5" name="submit" id="ko"><p id="l">Submit</p></button> </p>
          </form>
          <?php if(isset($r)) { unset($r); ?>
           <p class="alert alert-danger">Fill team name</p>
   <?php } ?>
          <?php if(isset($f)) { unset($f); ?>
           <p class="alert alert-danger">Dont use same team name</p>
   <?php } ?>
          <?php if(isset($e)) { unset($e); ?>
           <p class="alert alert-danger">Same IP address cannot be used by different teams</p>
   <?php } ?>
   <?php if(isset($g)) { unset($g); ?>
           <p class="alert alert-danger">Dont use same team name and same IP address</p>
   <?php } ?>




          

