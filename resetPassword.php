<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css"/>
   <link rel="stylesheet" href="bootstrap.css"/>
   
</head>
<body class="body">
    

  <!-- SignIn Box--> 
  <div class="signInbox " id="signInbox">
 <h1 class="text-center text-warning">Reset Password</h1>
 <div class="d-none">
    <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"])?>" />
 </div> 
 
 <div class="mt-3">
    <label for="form-label" >password</label>
    <input type="password" class="form-control" id="np" />
 </div>
 <div class="mt-3">
    <label for="form-label" >Re Enter Password</label>
    <input type="password" class="form-control" id="np2" />
 </div>

 
 
 <div class=" d-none" id="msgDiv">
    <div class="alert alert-danger" id="msg"> </div>
 </div>
 
 <div class="mt-3">
     <button class="btn btn-info col-12" onclick="resetPassword();" >Update</button>
 </div>
 
 
 

</div>
<!-- SignIn Box -->



<script src="script.js"> </script>

</body>
</html>