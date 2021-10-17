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
                    <li class="nav-item"><a class="nav-link" href="student-list.php"><i class="fas fa-user"></i> <span>Students</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="question.php"><i class="fas fa-table"></i> <span>Question</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="examination.php"><i class="fas fa-table"></i> <span>Examination</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-user-tie"></i> <span>Admin</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i> <span>Login</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i> <span>Register</span></a></li> -->
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="badge bg-danger badge-counter">3+</span>
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
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                                            &nbsp;Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Questions</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center mb-2">
                            <p class="text-primary m-0 fw-bold">Question List</p>
                            <button class="btn btn-primary d-block d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#addnewstudent">Add Question</button>
                            <div class="modal fade" id="addnewstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addnewstudentLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addnewstudentLabel">Add New Question</h5>
                                                <button type="button" class="btn-close btn-md" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" placeholder="Examination" aria-label="Examination" aria-describedby="examination-lookup_btn">
                                                                <button class="btn btn-outline-secondary" type="button" id="examination-lookup_btn"><i class="fas fa-search"></i></button>
                                                              </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="question-title">
                                                                    <strong>Question</strong>
                                                                </label>
                                                                <textarea class="form-control" name="question_title" id="question-title" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3" id="new-question-choices">
                                                                <div class="form-label d-flex justify-content-between align-items-center mb-4 mt-2" for="question-choices">
                                                                    <strong>Options</strong>
                                                                    <button type="button" class="btn btn-info btn-sm" id="add_new_option" onclick={}><i class="fas fa-plus text-white"></i></button>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-text">
                                                                      <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                                    </div>
                                                                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary">Add Question</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTableQuestionList">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th>Choices</th>
                                            <th>Answer</th>
                                            <th>Course</th>
                                            <th>Examination</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-3 text-truncate">What's my name?</td>
                                            <td class="col-2 text-truncate">A. Tao, B. Ako, C. Me, D. You</td>
                                            <td>E. Out of the Above</td>
                                            <td class="col-2 text-truncate">BS Information Technology</td>
                                            <td>Course 1</td>
                                            <td>
                                                <button class="btn btn-danger mx-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary">Edit Question</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>The question is about yourself?</td>
                                            <td>Chief Executive Officer(CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>Course 5<br></td>
                                            <td>
                                                <button class="btn btn-danger mx-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary">Edit Question</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>Course 3<br></td>
                                            <td>
                                                <button class="btn btn-danger mx-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary">Edit Question</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>Course 7<br></td>
                                            <td>
                                                <button class="btn btn-danger mx-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary">Edit Question</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>Course 2<br></td>
                                            <td>
                                                <button class="btn btn-danger mx-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary">Edit Question</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>Course 4<br></td>
                                            <td>
                                                <button class="btn btn-danger mx-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <button class="btn btn-primary">Edit Question</button>
                                            </td>
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
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script>
        $(document).ready(function(){
            $('#dataTableQuestionList').DataTable();
            $('#add_new_option').click( function() {
                $('#new-question-choices').append("<div class='input-group mb-3'><div class='input-group-text'><input class='form-check-input mt-0' type='checkbox' value=''></div><input type='text' class='form-control'></div>")
            } );

        });
    </script>
</body>

</html>