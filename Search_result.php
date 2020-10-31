<html>
<head>
    <title>Ruet CSE Alumni</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="alumni_members.css" rel="stylesheet" type="text/css">
</head>
<style>
    table{
         width: 100%;
        color:#588c7e;
        font-family: monospace;
        font-size: 15px;
        text-align: center;
        margin-top: 5%;

        
    }
    th{
      background-color: #0099cc;
        color:white;
        text-align: center;
    }
    tr:nth-child(even){background-color: #f2f2f2};
</style>
<body>
    
    <header>
    <div class="row">
        <div class="logo">
            <img src="Ruet Logo.jpg">
        </div>
     <ul class="main-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="SignUp.php">Sign up</a></li>
         <li><a href="organization.php">Organizing members</a></li>
         <li><a href="alumni_list.php">Alumni Members</a></li>
         <li><a href="Search.php">Search</a></li>
        <li><a href="login.php">Log In</a></li>
    </ul>
    </div>
        <?php
        session_start();
        $name=$_SESSION['s_name'];
        $roll=$_SESSION['s_roll'];
        $job=$_SESSION['job'];
        $conn=mysqli_connect("localhost","root","", "demoproject");
        if($conn->connect_error){
            die("Connection Failed".$conn->connect_error);
        }
        if(empty($name)){
            $name="";
        }
        else
        {
            $name = strtolower($name);
            $name = '%' . $name . '%';
        }
        if(empty($job)){
            $job="";
        }
        else{
            $job = strtolower($job);
            $job='%'.$job.'%';
        }
        $sql="SELECT avatar,username,email,phone,series,recentAddress,district,roll,working_place FROM demoalumni natural join work WHERE LOWER(demoalumni.username) LIKE '$name'  OR roll='$roll' OR LOWER(work.working_place) LIKE '$job' ";
        $result=$conn->query($sql);
        
        if($result->num_rows>0){
        echo "<table>";
        echo "<tr>";
            echo "<th>Image</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone no.</th>";
            echo "<th>Recent Address</th>";
            echo "<th>Home District</th>";
            echo "<th>Working Place</th>";
            echo "<th>Roll number</th>";
            
        echo "</tr>";
            while($row=$result->fetch_assoc()){
                 $roll=$row["roll"];
                echo "<tr><td><img src=" .$row["avatar"]. " width=50 height=50></td><td>". $row["username"] . "</td><td>". $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["recentAddress"] . "</td><td>" . $row["district"]. "</td><td>". $row["working_place"]  . "</td><td><a href ='details.php?roll=" . $roll ."'>" . $roll . "</a></td></tr>";
            }
            echo "</table";
        }
        else{
            echo "no result in the database";
        }
        $conn->close();
        ?>
    </table>
    
   </header>
    </body> 
        
        