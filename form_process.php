<?php 
// define variables and set to empty values
$username_error = $email_error = $phone_error = $recent_error=$permanent_error=$district_error=$series_error=$roll_error=$pass_error=$confirm_error="";
$username = $email = $phone = $recent=$permanent=$district=$series=$roll=$password = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $username_error = "Name is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["phone"])) {
    $phone_error = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phone_error = "Invalid phone number"; 
    }
  }
    
  if (empty($_POST["recentAddress"])) {
    $recent_error = "Recent Address is required";
  } else {
    $recent = test_input($_POST["recentAddress"]);
  }
  if (empty($_POST["permanentAddress"])) {
    $permanent_error = "Permanent Address is required";
  } else {
    $permanent = test_input($_POST["permanentAddress"]);
  }
  if (empty($_POST["district"])) {
    $district_error = "District is required";
  } else {
    $district = test_input($_POST["district"]);
  }
  if (empty($_POST["series"])) {
    $series_error = "Series is required";
  } else {
    $series = test_input($_POST["series"]);
  }
  if (empty($_POST["roll"])) {
    $roll_error = "Your varsity roll number is required";
  } else {
    $roll = test_input($_POST["roll"]);
  }
  if (empty($_POST["pass"])) {
    $pass_error="Password is necessary";
  }
  if($_POST["pass"]==$_POST["repass"]){
      $password=test_input($_POST["pass"]);
  }else{
      $confirm_error="Password must match";
  }
  
  if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '' ){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
      
      $to = 'vladi@clevertechie.com';
      $subject = 'Contact Form Submit';
      if (mail($to, $subject, $message)){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $phone = $message = $url = '';
      }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}