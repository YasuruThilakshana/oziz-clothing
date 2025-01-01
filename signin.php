<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css"/>
   <link rel="stylesheet" href="bootstrap.css"/>
    <title>OZIZ Store </title>
    
</head>
<body class="body">


<!-- SignIn Box--> 
<div class="signInbox " id="signInbox">


 <h1 class="text-center text-warning ">Sign In</h1>
 <?php
 
 $username ="";
 $password ="";
 if(isset($_COOKIE["username"])){
    $username =$_COOKIE["username"];
 }
 if(isset($_COOKIE["password"])){
    $password =$_COOKIE["password"];
 }
 ?>
 <div class="mt-3">
    <label for="form-label" >User name</label>
    <input type="text" class="form-control" id="un" value="<?php echo $username ?>"/>
 </div>

 <div class="mt-2">
    <label for="form-label" >Password</label>
    <input type="password" class="form-control" id="pw" value="<?php echo $password ?>"/>
 </div>
 <div class ="mt-2 mb-2">
     <input type="checkbox" class="form-chech-input" id="rm"/>
    <label for="form-label" >Remember me</label>
 </div>
 <div class=" d-none" id="msgDiv2">
    <div class="alert alert-danger" id="msg2"> </div>
 </div>
 <div class="mt-2">
    <a href="forgetPassword.php">forget Password?</a> 
 </div>
 <div class="mt-2">
     <button class="btn btn-secondary col-12" onclick="signin();">SignIn</button>
 </div>
 
 <div class="mt-2">
     <button class="btn btn-outline-secondary col-12" onclick="chageView();">Registor Now ,Sign Up </button>
 </div>
 

</div>
<!-- SignIn Box -->
<!-- Sign Up -->
<div class="signUpbox d-none " id="signUpbox">
    <h1 class="text-center text-warning">Sign Up </h1>
    <div class="row">
    <div class="mt col-6">
        <label for="form-label">First Name</label>
        <input type="text" class="form-control" id="fname"/>
    </div>
    <div class="mt col-6">
        <label for="form-label">Last Name</label>
        <input type="text" class="form-control" id="lname"/>
    </div>
    </div>
    
    <div class="mt">
        <label for="form-label">Email</label>
        <input type="email" class="form-control" id="email"/>
    </div>
    <div class="mt">
        <label for="form-label"> Mobile</label>
        <input type="text" class="form-control" id="mobile"/>
    </div>
    <div class="mt">
        <label for="form-label"> user name</label>
        <input type="text" class="form-control" id="uname"/>
    </div>
    <div class="mt mb-2">
        <label for="form-label">password</label>
        <input type="password" class="form-control" id="password"/>
    </div>
    <div class="  d-none" id="msgDiv1">
    <div class="alert alert-danger" id="msg1"> </div>
 </div>
 <div class="mt-2">
     <button class="btn btn-secondary col-12" onclick="signUp();">Sign Up</button>
 </div>
 <div class="mt-2">
     <button class="btn btn-outline-secondary col-12" onclick="chageView();">allready have an account? Sign In </button>
 </div>
</div>
<!-- Sign Up -->



    
<script src="script.js"> </script>
</body>
</html>