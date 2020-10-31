<html>
<head>
    <title>Ruet CSE Alumni</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
     <link href="Sign.css" rel="stylesheet" type="text/css">
    <style>
    .float
        {
            float:left;
            margin-left:6px;
        }
    </style>
    
     
</head>


<body>
     <?php
        session_start();
        $_SESSION['message']='';
     ?>
    
    <?php
        $host = 'localhost';
        $user = 'root';

     //create mysql connection
      $mysqli = new mysqli($host,$user,'');
      $mysqli=new mysqli($host,$user,'','demoproject');
      
      $username="";
      $email="";
      $tel="";
      $recent="";
      $district="";
      $series="";
      $roll_no="";
      /*CREATE TABLE demoalumni (
         username varchar(20) NOT NULL,
         email varchar(25) NOT NULL,
         phone varchar(12) NOT NULL,
         recentaddress varchar(12) NOT NULL,
         district varchar(20) NOT NULL,
         series int NOT NULL,
         roll int NOT NULL,
         gender varchar(10) NOT NULL,
         avatar varchar(255) NOT NULL,
         password varchar(200) NOT NULL,
        user_activation_code varchar(300) NOT NULL,
        user_email_status varchar(20) NOT NULL,
        PRIMARY KEY (roll)
      );*/
       
        
      if($_SERVER['REQUEST_METHOD']=='POST'){
                $username=$mysqli->real_escape_string($_POST['username']);
                $email=$mysqli->real_escape_string($_POST['email']);
                $tel=test_input($_POST['phone']);
                $recent=test_input($_POST['recentAddress']);
                $district=test_input($_POST['district']);
                $series=test_input($_POST['series']);
                $roll_no=test_input($_POST['roll']);
                $gender=$mysqli->real_escape_string($_POST['gender']);
                $avatar_path=$mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
                
                
                  
                
                $query_code = "SELECT * FROM demoalumni WHERE email='$email' OR roll='$roll_no'";
                $result_login = mysqli_query($mysqli,$query_code);
                $anything_found = mysqli_num_rows($result_login);

                if($anything_found > 0) {
                    $_SESSION['message']="Given email or roll is already taken,please try again";
                }
                 else{
                       if(preg_match("!image!",$_FILES['avatar']['type'])){
                        if(copy($_FILES['avatar']['tmp_name'],$avatar_path)){
                            
                            		$user_password = rand(100000,999999);
		                            $user_encrypted_password =md5($user_password);
		                            $user_activation_code = md5(rand());
                                    $status='not verified';
                            
                            $sql="INSERT INTO demoalumni(username,email,phone,recentAddress,district,series,roll,gender,avatar,password,user_activation_code,user_email_status)
                                  VALUES('$username','$email','$tel','$recent','$district',' $series','$roll_no','$gender','$avatar_path','$user_encrypted_password','$user_activation_code','$status')";
                            
                            $query="INSERT INTO work(roll)
                                  VALUES('$roll_no')";
                            
                        
                            
                            if($mysqli->query($sql)==true && $mysqli->query($query)==true){
                                echo "hello";
                                $base_url = "http://localhost/demo/";  //change this baseurl value as per your file path
			                          $mail_body = "
			                         <p>Hi ".$_POST['username'].",</p>
			                         <p>Thanks for Registration. Your password is ".$user_password.", This password will work only after your email verification.</p>
			                        <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
			                        <p>Best Regards,<br />CSE ALUMNI</p>
			                        ";
			                        require 'class/class.phpmailer.php';
			                       $mail = new PHPMailer;
                                $mail->isSMTP();                                      // Set mailer to use SMTP
                                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                $mail->Username = 'example@gmail.com';                 // SMTP username
                                $mail->Password = '******';                           // SMTP password
                                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                $mail->Port = 587;                                    // TCP port to connect to
			                          $mail->AddAddress($_POST['email'], $_POST['username']);		//Adds a "To" address			
			                          $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			                          $mail->IsHTML(true);							//Sets message type to HTML				
                                  $mail->Subject = 'Email Verification';			//Sets the Subject of the message
			                        $mail->Body = $mail_body;							//An HTML or plain text message body
			                          if($mail->Send())								//Send an Email. Return true on success or false on error
			                         {
				                         $_SESSION['message']="Registration successfull,a mail has been sent to your gmail.";
			                         }
                                 else{
                                         $_SESSION['message']="Sorry,mail couldn't be sent,please try again.";
                                 }
                             }
                        }
                        else{
                            $_SESSION['message']="FILE upload failed,please try again";
                        }
                       }
                else{
                    $_SESSION['message']="Please upload a valid file (jpg,jpeg or gif)";
                }
        }
      }
         function test_input($data) {
                       $data = trim($data);
                       $data = stripslashes($data);
                       $data = htmlspecialchars($data);
                       return $data;
        }
?>
    
    <header>
    <div class="row">
        <div class="logo">
            <img src="Ruet Logo.jpg">
        </div>
    <ul class="main-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="SignUp.php">Sign Up</a></li>
         <li><a href="organization.php">Ornanizing Members</a></li>
        <li><a href="alumni_list.php">Alumni Members</a></li>
        <li><a href="Search.php">Search</a></li>
        <li><a href="login.php">Log In</a></li>
    </ul>    
        
    <div class="main">
    <h1><strong>Sign Up</strong></h1>
			<div class="success"></div>
		<form action="SignUp.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"><strong><?=$_SESSION['message']?></strong></div>
				<input type="text" name="username" class="inp" placeholder="Username" value="<?php echo $username;?>" required>
				<input type="email" name="email" class="inp" placeholder="Email" value="<?php echo $email;?>" required>
                <input type="tel" name="phone" class="inp" placeholder="Mobile No" value="<?php echo $tel;?>" required>
                <input type="text" name="recentAddress" class="inp" placeholder="Recent Address" value="<?php echo $recent;?>" required>
                <input type="text" name="district" class="inp" placeholder="Home District" value="<?php echo $district;?>" required>
                <input type="number" name="series" class="inp" placeholder="Series"  value="<?php echo $series;?>" required>
                <input type="number" name="roll" class="inp" placeholder="Roll no" value="<?php echo $roll_no;?>" required>
                <div class="row float">      Gender:
                <select name="gender" value="Gender"required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                </select>
               </div>
				<input type="file" name="avatar" class="inp" placeholder="Choose photo"> 
				<input type="submit" name="register" value="GET STARTED" class="sub-btn">
			</form>
    </div>    
     </header>
        
        
        
    
   