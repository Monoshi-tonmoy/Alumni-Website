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
          $_SESSION['message1']="No match";
          header("location:update_pass.php");
      }
     }
?>