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
       if(isset($_POST['work']) && !empty($_POST['work'])){
            $work=$mysqli->real_escape_string($_POST['work']);
            $sql="UPDATE work SET working_place='$work' WHERE roll='$roll'";
            $mysqli->query($sql);
            $bool1=1;
       }     
         
         
       if(isset($_POST['pos']) && !empty($_POST['pos'])){
            $pos=$mysqli->real_escape_string($_POST['pos']);
            $sql="UPDATE work SET position='$pos' WHERE roll='$roll'";
             $mysqli->query($sql);
             $bool2=1;
       }
         
        if(isset($_POST['deg']) && !empty($_POST['deg'])){
            $deg=$mysqli->real_escape_string($_POST['deg']);
            $sql="UPDATE work SET degree='$deg' WHERE roll='$roll'";
            $mysqli->query($sql);
            $bool4=1;
        }  
         
        if(isset($_POST['coun']) && !empty($_POST['coun'])){
            $coun=$mysqli->real_escape_string($_POST['coun']);
            $sql="UPDATE work SET country='$coun' WHERE roll='$roll'";
            $mysqli->query($sql);
            $bool5=1;
        }  
        
     
    }
    if($bool1 or $bool2 or $bool4 or $bool5){
        header("location:database_after_complete.php");
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
                <h4 class="heading"><strong>Complete Your Profile</strong></h4>
                 <div class="alert alert-error"><?=$_SESSION['message']?></div>
                <div class="form">
                <form action="complete.php" method="post" id="contactFrm" enctype="multipart/form-data" name="contactFrm">
                    <input type="text"  placeholder="Your job place or current educational institution."  name="work" class="txt">
                    <input type="text" placeholder="Position"  name="pos" class="txt">
                    <input type="text" placeholder="Receiving Degree(In case of higher degree)" name="deg" class="txt">
                    <input type="text" placeholder="Current Country" name="coun" class="txt">
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