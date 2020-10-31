
<html>
<head>
    <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    
<link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" id="bootstrap-css">
 <meta charset="utf-8">
<script src="bootstrap-3.3.7-dist/css/bootstrap-theme.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="profile.css" rel="stylesheet" type="text/css">
    <style>
    .left
    {
        margin-left:25%;
        margin-right:30%;
    }
</style>
</head>
<!------ Include the above in your HEAD tag ---------->
<body> 
<?php
        session_start();
        $username=$email=$phone=$recentAddress=$district=$series=$roll=$password=$gender=$avatar='';
        $roll=$_SESSION['roll'];
        //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        $host = 'localhost';
        $user = 'root';

     //create mysql connection
      $mysqli = new mysqli($host,$user,'');
      if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      die();
      }
      $mysqli=new mysqli($host,$user,'','demoproject');

      $sql="SELECT * FROM demoalumni natural join work WHERE roll='$roll'";
                 $result=  mysqli_query($mysqli,$sql);
                 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                
                 $trws= mysqli_num_rows($result);
                 $result->data_seek(0);
                 if($trws==1){
                        $row = $result -> fetch_assoc();
                        $username=$row['username'];
                        $email=$row['email'];
                        $phone=$row['phone'];
                        $recentAddress=$row['recentAddress'];
                        $district=$row['district'];
                        $series=$row['series'];
                        $roll=$row['roll'];
                        $gender=$row['gender'];
                        $avatar=$row['avatar'];
                        if(is_null($row['working_place'])){
                            $_SESSION['working_place']="Not given";
                        }
                        else{
                            $_SESSION['working_place']=$row['working_place'];
                        }
                        if(is_null($row['position'])){
                            $_SESSION['position']="Not given";
                        }
                        else{
                            $_SESSION['position']=$row['position'];
                        }
                        if(is_null($row['degree'])){
                            $_SESSION['degree']="Not given";
                        }
                        else{
                            $_SESSION['degree']=$row['degree'];
                        }
                        if(is_null($row['country'])){
                            $_SESSION['country']="Not given";
                        }
                        else{
                            $_SESSION['country']=$row['country'];
                        }
                     
                     
                 }
?>
    
    <div class="container">
	<div class="row">
        
        
       <div class="col-md-7 left">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img src="<?php echo $avatar; ?>" alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php echo $username ?><br><?php echo $series ?><?php echo " Series" ?></h4>          
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
      
        <div class="col-sm-5 col-xs-6 tital" >Email:<span style="color:#00b1b1;"> <?php echo $email ?></span></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital" >Mobile no.:<span style="color:#00b1b1;"> <?php echo $phone ?></span></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital" >Current Address:<span style="color:#00b1b1;"> <?php echo $recentAddress ?></span></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital" >Home district:<span style="color:#00b1b1;"> <?php echo $district ?></span></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital" >Roll:<span style="color:#00b1b1;"> <?php echo $roll ?></span></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital" >Gender:<span style="color:#00b1b1;"> <?php echo $gender ?></span></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Job:<span style="color:#00b1b1;"><?=$_SESSION['working_place'] ?></span></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Job Position:<span style="color:#00b1b1;"><?=$_SESSION['position'] ?></span></div>
 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Degree:<span style="color:#00b1b1;"><?=$_SESSION['degree'] ?></span></div> 
        <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Current Country:<span style="color:#00b1b1;"><?=$_SESSION['country'] ?></span></div>  
    
                <br></br>
        <div class="clearfix"></div>
<div class="bot-border"></div>


<a href="Update.php" class="btn btn-info" role="button">Update Profile</a>
        <div class="clearfix"></div>
<div class="bot-border"></div>

<a href="Complete.php" class="btn btn-info" role="button">Complete Profile</a>
        <div class="clearfix"></div>
<div class="bot-border"></div>

<a href="update_pass.php" class="btn btn-info" role="button">Change Password</a>
        <div class="clearfix"></div>
<div class="bot-border"></div>
        
<a href="logout.php" class="btn btn-info" role="button">Log Out</a>
        <div class="clearfix"></div>
<div class="bot-border"></div>

-
        <div class="clearfix"></div>
<div class="bot-border"></div>


            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div> 
    </div>
    </body>
</html>
             