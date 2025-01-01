<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signin</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
</head>
<body class="adminSigninBody">


<div class="adminSignin_Box ">
    <h1 class="text-center">Admin Login </h1>
    <div class="mt-3">
        <label for="form-label  ">User Name</label>
        <input type="text" class="form-control border-black" placeholder="Ex: Sahan" id="un"/>
    </div>
    <div class="mt-3 mb-3">
        <label for="form-label">Password</label>
        <input type="password" class="form-control border-black" placeholder="Ex: Sahan" id="pw" />
    </div>
    <div class="d-none" id="msgDiv">
        <div class="alert alert-danger " id="msg"></div>
    </div>
    <div class="mt-4">

        <button class="btn btn-secondary col-12" onclick="adminSignIn();">sign In</button>

    </div>

</div>
    <script src="script.js"></script>
</body>
</html>