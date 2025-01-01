<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

   $rs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`id` ORDER BY `user`.`id` ASC ");
   $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">


    </head>

    <body>


        <body>
            <a href="adminReport.php"><button class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </button></a>

            <div class="container mt-3" >
                <div class="" id="prinArea">
                <h2 class="text-center mb-5">User Report</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>user Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>User Type</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        for ($i=0; $i < $num; $i++) { 
                           $d =  $rs->fetch_assoc();

                           ?>
                            <tr>
                                <td><?php echo $d["id"]?></td>
                                <td><?php echo $d["fname"]?></td>
                                <td><?php echo $d["lname"]?></td>
                                <td><?php echo $d["email"]?></td>
                                <td><?php echo $d["mobile"]?></td>
                                <td><?php echo $d["utype"]?></td>
                                <td>
                                    <?php
                                    if ($d["status"]  == 1) {
                                        echo("Active");
                                    }else{
                                        echo("Inactive");
                                    }
                                    
                                    ?>
                                </td>
                                


                            </tr>

                           
                           
                           <?php
                        }
                            
                            
                            
                            ?>
                           

                        </tbody>
                    </table>
                </div>
                </div>
                <div class="d-flex justify-content-end container-fluid mt-5">
                    <button class="btn btn-outline-info col-3" onclick="printDiv()">Print</button>
                </div>
            </div>





            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlYkR0x0jdZtEz54uU7e4Pb6C2mnpfF+6bQuq6PpVgE4qJZA7y/s4ZOjtN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGKtLmoGL9g6N7mA3eB6tIDb9O4F4tvvOJOhGxVi5SlkScK3wOMp1pLWKdK" crossorigin="anonymous"></script>
            <script src="script.js"></script>









        </body>

    </html>


<?php



} else {
    echo ("you are Not a Valid User");
}




?>