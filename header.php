
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm7uG6JM6kMR8M7xC/7tB7NfEXR4RKE05kph7YfEZGq5m3l7Q" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <style>
      

    </style>
</head class="bg-dark">
<body class="body bg-dark text-warning" >
 <nav class="navbar navbar-expand-lg navbar-light fixed-top mt-2 mb-2">
  <div class="container">
    <a class="navbar-brand h1 text-warning" href="index.php">
        <i class="bi bi-speedometer2"></i>
        OZIZ Store 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item me-5">
          <a class="nav-link active text-warning" aria-current="page" href="userProfile.php">User Profile</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active text-warning" aria-current="page" href="PerchesHistory.php">History</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active text-warning" aria-current="page" href="cart.php"> <i class="bi bi-cart"></i> CartCart</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active text-warning" aria-current="page" href="wishlist.php"> <i class="bi bi-heart"></i> Wish List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-warning" aria-current="page" href="signin.php" onclick="signOut();">Sign Out</a>
        </li>
      </ul>
      <!-- <button class="btn btn-outline-secondary" id="theme-toggle">
        <i id="theme-icon" class="bi bi-moon"></i>
      </button> -->
    </div>
  </div>
</nav> 


<script src="script.js" ></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
