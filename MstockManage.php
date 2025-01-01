<?php

session_start();

include "connection.php";


if (isset($_SESSION["m"])) {

?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Registration</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
        <style>
            body {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .card {
                border-radius: 15px;
            }

            .form-label {
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        

        <div class="container-fluid mt-5" id="product">
            
        <div class="container-fluid mt-5 " id="stock">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-header text-yellow text-center">
                            <h2>Stock Management</h2>
                        </div>
                        <div class="card-body p-4">
                            <form>
                                <div class="mb-3">
                                    <label for="form-label" class="form-label">Product Name</label>
                                    <select class="form-select" id="selectProduct">
                                        <option value="0">Select Product</option>
                                        
                                            <?php
                                            $rs = Database::search("SELECT * FROM `product`");
                                            $num = $rs->num_rows;

                                            for($i = 0; $i < $num; $i++){
                                                $d = $rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo$d["id"] ?>"><?php  echo$d["name"]?></option>
                                                <?php
                                            }
                                            
                                            ?>
                                        
                                        
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-label" class="form-label">Qty</label>
                                    <input type="text" class="form-control" id="qty" placeholder="Enter quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="stockPrice" class="form-label">Unit Price</label>
                                    <input type="text" class="form-control" id="unitprice" placeholder="Enter unit price">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary col-12 mt-3" onclick="updateStock();">Update Stock</button>
                                </div>
                                <div class="text-center">
                                <a href="MDashbord.php"> <span>Back</span> </a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlYkR0x0jdZtEz54uU7e4Pb6C2mnpfF+6bQuq6PpVgE4qJZA7y/s4ZOjtN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGKtLmoGL9g6N7mA3eB6tIDb9O4F4tvvOJOhGxVi5SlkScK3wOMp1pLWKdK" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

    </html>



<?php

} else {
    echo ("Your Not an Mannager");
}
?>