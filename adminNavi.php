 
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm7uG6JM6kMR8M7xC/7tB7NfEXR4RKE05kph7YfEZGq5m3l7Q" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <style>
        body[data-bs-theme="dark"] {
            background-color: #121212;
            color: white;
        }
        body[data-bs-theme="light"] {
            background-color: #f8f9fa;
            color: black;
        }
    </style>
</head>
<body class="bg-custom-dark" data-bs-theme="dark">
<nav class="navbar navbar-expand-lg navbar-light fixed-top mt-2 mb-2">
  <div class="container">
    <a class="navbar-brand h1" href="adminDashbord.php">
        <i class="bi bi-speedometer2"></i>
        OZIZ Store Admin Dashbord
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="AdminUser.php">User Management</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="adminProduct.php">Product Management</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="adminStock.php"> Add Product</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="AdminMannager.php">Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminReport.php">Report</a>
        </li>
      </ul>
      <button class="btn btn-outline-secondary" id="theme-toggle">
        <i id="theme-icon" class="bi bi-moon"></i>
      </button>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlYkR0x0jdZtEz54uU7e4Pb6C2mnpfF+6bQuq6PpVgE4qJZA7y/s4ZOjtN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGKtLmoGL9g6N7mA3eB6tIDb9O4F4tvvOJOhGxVi5SlkScK3wOMp1pLWKdK" crossorigin="anonymous"></script>
<script > </script>
</body>
</html> 
