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
    <title>Admin</title>
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
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon"><i class="fas fa-university"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>NMSC</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="student-list.php"><i class="fas fa-user"></i> <span>Students</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="question.php"><i class="fas fa-table"></i> <span>Question</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="examination.php"><i class="fas fa-table"></i> <span>Examination</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="admin.php"><i class="fas fa-user-tie"></i> <span>Admin</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i> <span>Login</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i> <span>Register</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                         <ul class="navbar-nav flex-nowrap ms-auto">
                              <li class="nav-item dropdown no-arrow mx-1">
                                   <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
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
                                                <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile
                                            </a>
                                            <!-- <a class="dropdown-item" href="#">
                                                <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log
                                            </a> -->
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout
                                            </a>
                                        </div>
                                   </div>
                              </li>
                         </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Administrator</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-sm-flex justify-content-between align-items-center">
                            <p class="text-primary m-0 fw-bold">Administrator List</p>

                            <button class="btn btn-info btn-sm text-white d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#addnewexam"><i class="fas fa-plus"></i> New Admin</button>
                            <!-- Modal -->
                            <!--
                            <div class="modal fade" id="addnewexam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addnewexamLabel" aria-hidden="false">
                                <div class="modal-dialog">
                                    <form method="POST" action="actions/action.php">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addnewexamLabel">Add New Examination😊😊</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exam-name">
                                                                    <strong>Course</strong>
                                                                </label>
                                                                <select class="form-select" name="exam_status" id="exam-status">
                                                                    <option value="Draft">Bs Information Tech</option>
                                                                    <option value="In-Progress">In Progress</option>
                                                                    <option value="Completed">Completed</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                            <div class="mb-6">
                                                                <label class="form-label" for="exam-name">
                                                                    <strong>Examination Title</strong>
                                                                </label>
                                                                <input class="form-control" type="text" id="exam-name" placeholder="Examination Title" name="exam_name">
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exam-date">
                                                                    <strong>Date</strong>
                                                                </label>
                                                                <input class="form-control" type="date" id="exam-date" name="exam_date">
                                                            </div>
                                                    </div>
                                                    <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exam-time">
                                                                    <strong>Time</strong>
                                                                </label>
                                                                <input class="form-control" type="time" id="exam-time" placeholder="Examination Title" name="exam_time">
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exam-name">
                                                                    <strong>Examination Status</strong>
                                                                </label>
                                                                <select class="form-select" name="exam_status" id="exam-status">
                                                                    <option value="Draft">Draft</option>
                                                                    <option value="In-Progress">In Progress</option>
                                                                    <option value="Completed">Completed</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-info text-white" name="addStudent">Add Student</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            -->

                        </div>
                        <div class="card-body">
                            <div class="table-responsive table p-1" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTableAdminLst">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profile/Permission</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>What's my name?</td>
                                            <td class="col-2 text-truncate">A. Tao, B. Ako, C. Me, D. You</td>
                                            <td class="col-2">E. Out of the Above</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Suicide Squad 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTableAdminLst').DataTable();
        });
    </script>
</body>

</html>