<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget Password</title>
    <link rel="stylesheet" href="style.css"/>
   <link rel="stylesheet" href="bootstrap.css"/>
   
</head>
<body class="body">
    

  <!-- SignIn Box--> 
  <div class="signInbox " id="signInbox">
 <h1 class="text-center text-warning">Forget Password</h1> 
 
 <div class="mt-3">
    <label for="form-label" >Email</label>
    <input type="text" class="form-control" id="e" />
 </div>

 
 
 <div class=" d-none" id="msgDiv">
    <div class="alert alert-danger" id="msg"> </div>
 </div>
 
 <div class="mt-3">
     <button class="btn btn-info col-12" onclick="forgetPassword();">Send Email</button>
 </div>
 
 
 

</div>
<!-- SignIn Box -->




<script src="script.js"> </script>


</body>
</html>