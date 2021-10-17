<?php
    require_once('Classes/loader.php');
    session_start();
    // print_r($_SESSION);

    if(isset($_SESSION)){
        $getSuccess = '';

        if(isset($_SESSION['getSuccess'])){
            $getSuccess = $_SESSION['getSuccess'];
        }
        
        if($getSuccess){
            $sweetAlert->displaySweetAlert('success', 'Success', $getSuccess);
        }
    }   

    // clear Session
    $_SESSION['getError'] = array();
    $_SESSION['getSuccess'] = '';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <?php
        include 'script_loader.php';
    ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-dark p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>NMSC</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="student-list.php"><i class="fas fa-user"></i> <span>Students</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="question.php"><i class="fas fa-table"></i> <span>Question</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="examination.php"><i class="fas fa-table"></i> <span>Examination</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-user-tie"></i> <span>Admin</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="badge bg-danger badge-counter">99+</span>
                                        <i class="fas fa-bell fa-fw"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['admin_email']; ?></span>
                                        <i class="fas fa-caret-down fa-lg"></i>
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                                            &nbsp;Profile
                                        </a>
                                        <!-- <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                                            &nbsp;Settings
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>
                                            &nbsp;Activity log
                                        </a> -->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400">
                                            </i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Northwest Mindanao State College of Science and Technology</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center mb-2">
                            <p class="text-primary m-0 fw-bold">Student List</p>
                            <button class="btn btn-primary d-block d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#addnewstudent">Add Student</button>
                            <!-- Modal -->
                            <div class="modal fade" id="addnewstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addnewstudentLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addnewstudentLabel">Add New Student</h5>
                                                <button type="button" class="btn-close btn-md" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="lastname"><strong>Lastname</strong></label><input class="form-control" type="text" id="lastname" placeholder="Lastname" name="lastname"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="firstname"><strong>Firstname</strong></label><input class="form-control" type="text" id="firstname" placeholder="Firstname" name="firstname"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="course">
                                                                    <strong>Course</strong>
                                                                </label>
                                                                <select name="course" id="course" class="form-select">
                                                                    <option value=""></option>
                                                                    <option value="BSIT">BS Information technology</option>
                                                                    <option value="BAT">BS Agricultural Technology</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="email-student">
                                                                    <strong>Email</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="email-student" placeholder="Email" name="email_student"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="password-student">
                                                                    <strong>Password</strong>
                                                                </label>
                                                                <input class="form-control" type="password" id="password-student" placeholder="Password" name="password_student">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gender-student">
                                                                    <strong>Gender</strong>
                                                                </label>
                                                                <select name="gender_student" id="gender-student" class="form-select">
                                                                    <option value="Female">Female</option>
                                                                    <option value="Male">Male</option>
                                                                </select>
                                                            </div> 
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="mobile-student">
                                                                    <strong>Mobile No.</strong>
                                                                </label>
                                                                <input class="form-control" type="phone" id="mobile-student" placeholder="09*********" name="mobile_student">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary">Add Student</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                         <label class="form-label">
                                              <input type="search" class="form-control form-control-md" aria-controls="dataTable" placeholder="Student Name">
                                        </label>
                                   </div>
                                </div>
                            </div> -->
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTableStudList">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Year</th>
                                            <th>Verification Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td>
                                            <td>BS Information Technology</td>
                                            <td>II</td>
                                            <td>Confirm</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Angelica Ramos</td>
                                            <td>BS Business Administration</td>
                                            <td>I</td>
                                            <td>Approved</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Ashton Cox</td>
                                            <td>BS Information Technology</td>
                                            <td>III</td>
                                            <td>Failed</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg">Bradley Greer</td>
                                            <td>BS Information Technology</td>
                                            <td>IV</td>
                                            <td>In Progress</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar5.jpeg">Brenden Wagner</td>
                                            <td>BS Information Technology</td>
                                            <td>III</td>
                                            <td>Waiting</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Brielle Williamson</td>
                                            <td>BS Agricultural Technology</td>
                                            <td>II</td>
                                            <td>Processing</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Bruno Nash<br></td>
                                            <td>BS Information Technology</td>
                                            <td>IV</td>
                                            <td>Confirm</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar3.jpeg">Caesar Vance</td>
                                            <td>BS Agricultural Technology</td>
                                            <td>II</td>
                                            <td>Denied</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar4.jpeg">Cara Stevens</td>
                                            <td>BS Information Technology</td>
                                            <td>I</td>
                                            <td>Confirm</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar5.jpeg">Cedric Kelly</td>
                                            <td>BS Agricultural Technology</td>
                                            <td>I</td>
                                            <td>Confirm</td>
                                            <td><a href="student.php" class="btn btn-info text-white">View Student Details</a></td>
                                        </tr>
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Course</strong></td>
                                            <td><strong>Year</strong></td>
                                            <td><strong>Verification Status</strong></td>
                                            <td></td>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Suicide Squad</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTableStudList').DataTable();
        });
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>

</body>

</html>