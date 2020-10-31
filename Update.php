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
   <?php
    session_start();
        $_SESSION['message']='';
     ?>
    
    <?php
        $host = 'localhost';
        $user = 'root';
        $bool1=0;
        $bool2=0;
        $bool3=0;
        $bool4=0;
        $bool5=0;

      $mysqli = new mysqli($host,$user,'');
      if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      die();
      }
      $mysqli=new mysqli($host,$user,'','demoproject');
    
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $roll=$_SESSION['roll'];
       if(isset($_POST['username']) && !empty($_POST['username'])){
            $username=$mysqli->real_escape_string($_POST['username']);
            $sql="UPDATE demoalumni SET username='$username' WHERE roll='$roll'";
            $mysqli->query($sql);
            $bool1=1;
       }     
         
         
       if(isset($_POST['phone']) && !empty($_POST['phone'])){
            $phone=test_input($_POST['phone']);
            $sql="UPDATE demoalumni SET phone='$phone' WHERE roll='$roll'";
              $mysqli->query($sql);
             $bool2=1;
       }
        if(isset($_POST['recent']) && !empty($_POST['recent'])){
            $recent=$mysqli->real_escape_string($_POST['recent']);
            $sql="UPDATE demoalumni SET recentAddress='$recent' WHERE roll='$roll'";
            $mysqli->query($sql);
             $bool4=1;
        }  
        $avatar_path=$mysqli->real_escape_string('images/'.$_FILES['photo']['name']);
        if($_FILES['photo']){
            if(preg_match("!image!",$_FILES['photo']['type'])){
                if(copy($_FILES['photo']['tmp_name'],$avatar_path)){
                $sql="UPDATE demoalumni SET avatar='$avatar_path' WHERE roll='$roll'";
                   $mysqli->query($sql);
                    $bool5=1;
                }
                else{
                    $_SESSION['message']='Sorry,server problem,please try again';
                }
                
            }
            else{
                 $_SESSION['message']='Please upload a valid image file';
                
            }
            
            
        }
     
    }
    if($bool1 or $bool2 or $bool4 or $bool5){
        header("location:database_after_update.php");
    }
         
    function test_input($data) {
                       $data = trim($data);
                       $data = stripslashes($data);
                       $data = htmlspecialchars($data);
                       return $data;
    }
    
?>
    
    
        
     
<div class="container" style="width:400px margin:0 auto; margin-top:60px; margin-left:20%; margin-right:20%">
	<div class="row">
    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading"><strong>Update Your Information </strong></h4>
                 <div class="alert alert-error"><?=$_SESSION['message']?></div>
                <div class="form">
                <form action="Update.php" method="post" id="contactFrm" enctype="multipart/form-data" name="contactFrm">
                    <input type="text"  placeholder="Update username"  name="username" class="txt">
                    <input type="tel" placeholder="Update phone number"  name="phone" class="txt">
                    <input type="text" placeholder="Update recent address" name="recent" class="txt">
                    <h4>Update your Photo</h4><input type="file"  placeholder="Update photo" name="photo" class="txt"  >
                    <br></br>
                    
                    
                     <input type="submit" value="submit" name="submit" class="txt2">
                </form>
            </div>
            </div>
            </div
	</div>
</div>
    </div>
    </body>
    </head>
    </html>