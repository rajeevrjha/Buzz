

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.min.css" rel="stylesheet">
 <link href="../css/bootstrap-theme.min.css" rel="stylesheet">

<div class="container ">
  <div class="row">
    <div class="col-md-6 col-md-push-3">
      <div class="jumbotron">
        <fieldset>
          <legend class="center-block"><b>Select Team Name</b></legend>
            <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
              <div class="form-group">
               <select name='team'  class='form-control input-sm' id='team'>;
                    <?php
                    
                    $conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
$db=mysql_select_db('buzzer',$conn)or die("could not select database");
$n=mysql_query("select * from quiz");

                    while($row=mysql_fetch_array($n)){
                      echo "<option value='{$row['TeamName']}'>{$row['TeamName']}</option>";
                    }
                    echo "</select>";
                  ?>
                   
                  
                       </div>
              <input type="submit" name="submit" value="Delete" class="btn btn-info btn-medium pull-right">

            </form>
        </fieldset>
      </div>
     
    </div>
  </div>
</div>

<?php
{
  session_start();
  if(isset($_POST['submit']))
{
  $c=$_POST['team'];
    $conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
$db=mysql_select_db('buzzer',$conn)or die("could not select database");
$e=mysql_query("delete from quiz where TeamName = '{$c}' ");
<<<<<<< HEAD
if(mysql_num_rows($e)==0)
{
$_POST['b']=1;
header('location:control.php?id1='.$_POST['b']);
}
else
{
$_POST['a']=1;
header('location:control.php?id='.$_POST['a']);
}
=======
$_POST['a']=1;
header('location:control.php?id='.$_POST['a']);

>>>>>>> 6440a9446500d2b0915b495fa50c0a99e7aecceb
}
}
?>