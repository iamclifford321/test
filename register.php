<?php
    require_once('Classes/loader.php');

    session_start();
    
    $getErrorEmail = $getErrorPassword = $getErrorCPassword = '';

    if(isset($_SESSION)){
        $getError = '';
        if(isset($_SESSION['getError'])){
            $getError = $_SESSION['getError'];
        }
        // var_dump($getError);
        if($getError){
            $getErrorEmail = $getError->errorAdminEmail;
            $getErrorPassword = $getError->errorAdminPassword;
            $getErrorCPassword = $getError->errorConfirmAdminPassword;
            $getErrorSystem = $getError->errorSystem;

            if($getErrorSystem){
                echo '<script>alert("' .$getErrorSystem. '")</script>';
            }

        }
    }
    

    //clear  $_SESSION['getError']
    $_SESSION['getError'] = array();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Account</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                                <?php
                                    // $row = new CreateController();
                                    // $data = $row->testMetods();
                                    // while($rows = mysqli_fetch_assoc($data)){
                                    //     echo $rows['admin_email'];
                                    // }
                                ?>
                            </div>

                            <form class="user" action="actions/action.php" method="post">
                            <!-- <form class="user" action="<?php # echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> -->
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="First Name" name="first_name"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Last Name" name="last_name"></div>
                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="adminEmail"></div>
                                <p><?php echo $getErrorEmail; ?></p>
                                <!-- <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="adminEmail"></div> -->
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="adminPassword">
                                        <span><?php echo $getErrorPassword; ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="confirmAdminPassword">
                                        <span ><?php echo $getErrorCPassword; ?></span>
                                    </div>
                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit" name="registerAdmin">Register Account</button>
                                <hr>
                                    <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Register with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Register with Facebook</a>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>