<html>
<head>
    <title>Ruet CSE Alumni</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="Search.css" rel="stylesheet" type="text/css">
</head>
<body>
    
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
    
        
    <?php  
        session_start();
        $bool1=0;
        $bool2=0;
        $bool3=0;
    if($_SERVER['REQUEST_METHOD']=='POST'){
       if(isset($_POST['name']) && !empty($_POST['name'])){
           $_SESSION['s_name']= $_POST['name'];
           $bool1=1;
           
        }
        else{
            $_SESSION['s_name']= "";
        }
        
        if(isset($_POST['roll']) && !empty($_POST['roll'])){
           $_SESSION['s_roll']= $_POST['roll'];
            $bool2=1;
           
        }
        else{
            $_SESSION['s_roll']= "";
        }
        
        if(isset($_POST['job']) && !empty($_POST['job'])){
           $_SESSION['job']= $_POST['job'];
            $bool3=1;
           
        }
        else{
            $_SESSION['job']= "";
        }
        if(bool1 OR bool2 OR bool3){
         header("location:Search_result.php");
        }
}
        ?>
        
    
    <div class="container" style="width:400px margin:0 auto; margin-top:160px;">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Search</h4></div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Search By Name</label>
							<input type="text" name="name" class="form-control" />
						</div>
						<div class="form-group">
							<label>Search By Roll</label>
							<input type="text" name="roll" class="form-control"/>
						</div>
                        <div class="form-group">
							<label>Search By Job Company</label>
							<input type="text" name="job" class="form-control"/>
						</div>
						 <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login_button">
                  SEARCH 
              </button>
					</form>
				</div>
			</div>
		</div>
    
    
    
    </body>
</html>