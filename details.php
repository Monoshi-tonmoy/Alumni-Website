 
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
    .top{
        margin-top:100px;
    }
</style>
    </head>
<!------ Include the above in your HEAD tag ---------->
<body>
    <?php
     $conn=mysqli_connect("localhost","root","", "demoproject");
        if($conn->connect_error){
            die("Connection Failed".$conn->connect_error);
        }
     $roll=$_GET['roll'];
     $avatar="";
     $username="";
     $email="";
     $mobile="lll";
     $address="";
     $district="";
     $gender="";
     $job="";
     $job_position="";
     $degree="";
     $country="";
     $sql="SELECT avatar,username,email,phone,recentAddress,district,roll,gender,working_place,position,degree,country FROM demoalumni natural join work WHERE roll='$roll'";
     $result=$conn->query($sql);
     $row=mysqli_fetch_row($result);
     
     $avatar=$row[0];
     $username=$row[1];
     $email=$row[2];
     $mobile=$row[3];
     $address=$row[4];
     $district=$row[5];
     $gender=$row[7];
     $job=$row[8];
     $roll=$row[6];
     $job_position=$row[9];
     $degree=$row[10];
     $country=$row[11];
     
     ?>

<div class="container">
	<div class="row">
        
        
       <div class="col-md-7 left">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >Profile</h4></div>
   <div class="panel-body">
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img src="<?php echo $avatar; ?>" alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
                <div class="row top">
<div class="col-sm-5 col-xs-6 tital" >Name:<span style="color:#00b1b1;"> <?php echo $username; ?></span></div>
<div class="clearfix"></div>
<div class="bot-border"></div>
    
              
<div class="col-sm-5 col-xs-6 tital" >Email:<span style="color:#00b1b1;"> <?php echo $email; ?></span></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Mobile No.:<span style="color:#00b1b1;"><?php echo $mobile; ?></span></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Current Address:<span style="color:#00b1b1;"><?php echo $address;  ?></span></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>
                
<div class="col-sm-5 col-xs-6 tital " >Home district:<span style="color:#00b1b1;"><?php echo $district;  ?></span></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Roll:<span style="color:#00b1b1;"><?php echo $roll; ?></span></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Gender:<span style="color:#00b1b1;"><?php echo $gender; ?></span></div>
 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Job:<span style="color:#00b1b1;"><?php echo $job;  ?></span></div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Job Position:<span style="color:#00b1b1;"><?php echo $job_position; ?></span></div>
 <div class="clearfix"></div>
<div class="bot-border"></div>


<div class="col-sm-5 col-xs-6 tital " >Degree:<span style="color:#00b1b1;"><?php echo $degree;  ?></span></div> 
        <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Current Country:<span style="color:#00b1b1;"><?php echo $country;  ?></span></div> 
    
                <br></br>
        <div class="clearfix"></div>
                
<div class="bot-border"></div>

        </div>
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
                  