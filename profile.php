 <?php
        session_start();
?>
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
        margin-left: 25%;
        margin-right:30%;
    }
</style>
    </head>
<!------ Include the above in your HEAD tag ---------->
<body>

<div class="container">
	<div class="row">
        
        
       <div class="col-md-7 left">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img src="<?php echo $_SESSION['avatar']; ?>" alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     </div>
              
              <br>
    
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?=$_SESSION['username'] ?><br><?=$_SESSION['series']?><?php echo " Series" ?></h4>          
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital" >Email:<span style="color:#00b1b1;"> <?=$_SESSION['email'] ?></span></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Mobile No.:<span style="color:#00b1b1;"><?=$_SESSION['phone'] ?></span></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Current Address:<span style="color:#00b1b1;"><?=$_SESSION['recentAddress'] ?></span></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>
                
<div class="col-sm-5 col-xs-6 tital " >Home district:<span style="color:#00b1b1;"><?=$_SESSION['district'] ?></span></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Roll:<span style="color:#00b1b1;"><?=$_SESSION['roll'] ?></span></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Gender:<span style="color:#00b1b1;"><?=$_SESSION['gender'] ?></span></div>
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
                                                                 