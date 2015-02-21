<?php
session_start();
if(isset($_POST['submit']))
{
   $u=$_POST['username'];
   $p=$_POST['password'];
   
   if(!$u or !$p){
      $empty=true;
   }
   else{
       $p=md5($p);
       
       $conn=mysql_connect('localhost','root','yomahesh9094') or die("connection failed");
       $db=@mysql_select_db('buzzer',$conn)or die("could not select database");
        $a=mysql_real_escape_string($u);
        $b=mysql_real_escape_string($p);
       $sql="select * from admin where username = '{$a}' and password = '{$b}' ";
       $result=mysql_query($sql,$conn)or die('query execution failed'.mysql_error());
       $num=mysql_num_rows($result);
       $row=mysql_fetch_assoc($result);
       if($num>0){
            $_SESSION['user']=$row['username'];
            header("location:control.php");
       }
       else{
            $empty=true;
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
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.min.css" rel="stylesheet">


      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
         queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page 
         via file:// -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
            html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
            respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="bg-warning">
   

<br>
<br>
<br>
<br>
<br>

<div class="container" id="content">
   <div class="row">
      <h3 align="center">Log In</h3>
      </div></div>
   </div>
      <div class="col-md-6 col-md-push-3">
   <div class="jumbotron">
      <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">UserName:</label>
      <div class="col-sm-10">
         <input type="text" class="form-control" id="firstname" name="username"
            placeholder="Enter Username">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" id="lastname"  name="password"
            placeholder="Enter Password">
      </div>
   </div>
   <br>
    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-12">
         <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
      </div>
   </div>
   <?php if(isset($empty)) { //If errors are found ?>
            <p class="alert alert-danger"><small>Incorrect Username or Password</small></p>    
    <?php unset($empty);} ?>
    <?php if(isset($loggedIn)) { //If errors are found ?>
        <p class="alert alert-warning"><small>User is already logged In</small></p>    
    <?php unset($loggedIn);} ?>
</form>
<style>
    #content {
       z-index: 500;
       opacity: 0.6;
   }
   #content <.row {
       min-height: 0px;
       background: #cccccc;
   }
   .jumbotron{
      background: #cccccc;
   }
</style>
</body>
</html>