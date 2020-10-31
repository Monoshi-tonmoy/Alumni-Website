<?php
    session_start();
     $host = 'localhost';
     $user = 'root';

      $mysqli = new mysqli($host,$user,'');
      if ($mysqli->connect_errno) {
      printf("Connection failed: %s\n", $mysqli->connect_error);
      die();
      }
      $mysqli=new mysqli($host,$user,'','demoproject');
        
      $roll=$_SESSION['roll'];
      $sql="DELETE * from demoalumni join work ON demoalumni.roll=work.roll where demoalumni.roll='$roll';
      if($mysqli->query($sql)==true){
              header("location:index.php");
      }
      else{
             header("location:profile.php");
      }