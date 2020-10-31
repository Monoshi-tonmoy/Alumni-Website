<html>
<head>
<link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" id="bootstrap-css">
 <meta charset="utf-8">
<script src="bootstrap-3.3.7-dist/css/bootstrap-theme.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="Update.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container" style="width:400px margin:0 auto; margin-top:60px; margin-left:20%; margin-right:20%">
    <div class="row">
    <div class="col-md-4">
		<div class="form_main">
            <h4 class="heading"><strong>Change Password</strong></h4>
                <div class="form">
                <form action="update_pass.php" method="post" id="contactFrm" name="contactFrm">
                    <input type="password"  placeholder="Change password"  name="pass" class="txt">
                    <input type="password" placeholder="Confirm password"  name="repass" class="txt">
                     <input type="submit" value="submit" name="submit" class="txt2">
                </form>
            </div>
            </div>
            </div
	</div>
</div>
    </div>
     <?php
        $host = 'localhost';
        $user = 'root';

      $mysqli = new mysqli($host,$user,'');
      if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      die();
      }
      $mysqli=new mysqli($host,$user,'','demoproject');
      $password="";
      session_start();
    
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $roll=$_SESSION['roll'];
       if(isset($_POST['pass']) && !empty($_POST['pass']) && $_POST['pass']==$_POST['repass']){
            $pass=$_POST['pass'];
            $password=md5($pass);
            $sql="UPDATE demoalumni SET password='$password' WHERE roll='$roll'";
            $mysqli->query($sql);
            header("location:database_after_update.php");
       }
      else{
          $_SESSION['message']="Passwords didn't match,please try again";
          echo $_SESSION['message'];
      }
     }
?>    
        
        
        
    </body>
    </head>
    </html>