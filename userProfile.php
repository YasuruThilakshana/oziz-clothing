<?php

include "connection.php";

session_start();

$user = $_SESSION['u'];


if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `user`.`id` = '" . $user['id'] . "'");
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en"  >

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styel.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body class="user_body">

        <div class="container rounded bg-white mt-5 mb-5">
            <a href="index.php"><button class="bg-warning">
                    <i class="bi bi-arrow-left"></i> Back
                </button></a>
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="<?php  
                        if (!empty($d['path'])) {
                           echo $d['path'];
                        } else {
                            echo ("resources/logo/profile.png");
                        
                        }
                        
                        
                        
                        
                        ?>" id="i">
                        <label for="form-label">Profile Image</label>
                        <input type="file" class="form-control"  id="imgUploader" />
                        <div>
                            <button class="btn btn-outline-info mt-2" onclick="uplordImage();">Uplord</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" id="fname" placeholder="first name" value="<?php echo $d['fname'];?>"></div>
                            <div class="col-md-6"><label class="labels">Last Anme</label><input type="text" class="form-control" value="<?php echo $d['lname'];?>" id="lname" placeholder="surname"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">User Name</label><input type="text" class="form-control" placeholder="enter phone number" id="uname" value="<?php echo $d['username'];?>" disabled></div>
                            <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" placeholder="enter email id" id="email" value="<?php echo $d['email'];?>"></div>
                            <div class="col-md-12"><label class="labels">Mobile</label><input type="text" class="form-control" placeholder="education" id="mobile" value="<?php echo $d['mobile'];?>"></div>
                            <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control" placeholder="education" id="password" value="<?php echo $d['password'];?>" disabled></div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><h4>Shipping Detailes</h4></div><br>
                        <div class="col-md-12"><label class="labels">NO</label><input type="text" class="form-control" placeholder="no" id="no" value="<?php echo $d['no'];?>"></div> <br>
                        <div class="col-md-12"><label class="labels">Address Line 01</label><input type="text" class="form-control" id="line1" placeholder="Address Line 01" value="<?php echo $d['address_line_1'];?>"></div>
                        <div class="col-md-12 mt-3"><label class="labels">Address Line 02</label><input type="text" class="form-control" id="line2" placeholder="address Line 02" value="<?php echo $d['address_line_2'];?>"></div>
                    </div>

                    <div class="mt-3 text-center"><button class="btn btn-primary profile-button" type="button" onclick="updataProfile();">Update Profile</button></div>

                </div>
            </div>
        </div>
        </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>


    </body>

    </html>

<?php

} else {
    header("location: signIn.php");
}


?>