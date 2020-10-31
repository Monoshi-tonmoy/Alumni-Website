<html>
<head>
    <title>Ruet CSE Alumni</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="login.css" rel="stylesheet" type="text/css">
</head>
<body>
     <?php
        session_start();
        $_SESSION['message']='';
        $_SESSION['username']='';
        $host = 'localhost';
        $user = 'root';

      $mysqli=new mysqli($host,$user,'','demoproject');
            $myusername="";
            $myroll="";
            $mypassword="";
    
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                 $myusername=$mysqli->real_escape_string($_POST['username']);
                 $myroll=test_input($_POST['roll']);
                 $mypassword=$_POST['pass'];
                
                 $pass=md5($mypassword);
                 
                
        
                
                 $sql="SELECT * FROM demoalumni natural join work WHERE demoalumni.username='$myusername' AND demoalumni.password='$pass' AND demoalumni.roll='$myroll'";
                 $result=  mysqli_query($mysqli,$sql);
                 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                
                 $trws= mysqli_num_rows($result);
                 $result->data_seek(0);
                 $row = $result -> fetch_assoc();
                 
                 
                $_POST['pass']=md5($_POST['pass']);
                if($_POST['pass']==$row['password']){
                 if($row['user_email_status']=='verified'){
                   if($trws==1){
                        $_SESSION['username']=$row['username'];
                        $_SESSION['email']=$row['email'];
                        $_SESSION['phone']=$row['phone'];
                        $_SESSION['recentAddress']=$row['recentAddress'];
                        $_SESSION['district']=$row['district'];
                        $_SESSION['series']=$row['series'];
                        $_SESSION['roll']=$row['roll'];
                        $_SESSION['password']=$row['password'];
                        $_SESSION['gender']=$row['gender'];
                        $_SESSION['avatar']=$row['avatar'];
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
                        
    
                        header("location:profile.php");  
                   }
                 else{
                     $_SESSION['message']="username or roll no or password didn't match,pls try again.";
                     
                 }
                 }
            else{
                   $_SESSION['message']="At first,please verify your account from your email.";
            }
                }
           else{
               $_SESSION['message']="Wrong password";
           }
            }
        
        
        
                
        function test_input($data) {
                       $data = trim($data);
                       $data = stripslashes($data);
                       $data = htmlspecialchars($data);
                       return $data;
        }  
    
    
    /*include('database_connection.php');

     $_SESSION['message']='';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
      $myusername=$_POST['username'];

      $myroll=$_POST['roll'];
      $mypassword=$_POST['pass'];
                
      $pass=md5($mypassword);
                 
	  $query = "SELECT * FROM demoalumni natural join work WHERE demoalumni.username='$myusername' AND demoalumni.password='$pass' AND demoalumni.roll='$myroll'";
	
	$statement = $connect->prepare($query);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_email_status'] == 'verified')
			{
				if(password_verify($_POST["pass"], $row["password"]))
				//if($row["user_password"] == $_POST["user_password"])
				{
					    $_SESSION['username']=$row['username'];
                        $_SESSION['email']=$row['email'];
                        $_SESSION['phone']=$row['phone'];
                        $_SESSION['recentAddress']=$row['recentAddress'];
                        $_SESSION['district']=$row['district'];
                        $_SESSION['series']=$row['series'];
                        $_SESSION['password']=$row['password'];
                        $_SESSION['gender']=$row['gender'];
                        $_SESSION['avatar']=$row['avatar'];
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
                        
    
                        header("location:profile.php");  
				}
				else
				{
				       $_SESSION['message']="Wrong password";	
				}
			}
			else
			{
				$_SESSION['message']="At first,please verify your account from your email.";
			}
		}
	}
	else
	{
		  $_SESSION['message']="username or roll no or password didn't match,pls try again.";
	}
}
    function test_input($data) {
                       $data = trim($data);
                       $data = stripslashes($data);
                       $data = htmlspecialchars($data);
                       return $data;
        }  

?>*/
    
    
    
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
    </div>
   <div class="main">
    <h1>Log In</h1>
			<div class="success"></div>
		<form action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="alert alert-error"><?=$_SESSION['message'] ?></div>
				<input type="text" name="username" class="inp" placeholder="Username" required>
                <input type="number" name="roll" class="inp" placeholder="Roll no" required>
				<input type="password" name="pass" class="inp" placeholder="Password" required>
				 <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login_button">
                  Log In  
              </button>
			</form>
    </div>  
    
   
    </header>
    </body>
</html>