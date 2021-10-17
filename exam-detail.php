<?php 
     require_once('Classes/loader.php');

     session_start();
     $sweetAlert = new SweetAlert();
     $createController = new CreateController();

     $isDisabled = 'disabled';

     $getAdminId = '';
     $getParamId = '';

     if(isset($_SESSION)){

          print_r($_SESSION);
          if(isset($_SESSION['admin_id'])){
               $getAdminId = $_SESSION['admin_id'];
          }

     }

     if(isset($_GET)){
          var_dump($_GET);
          if(isset($_GET['id'])){
               $getParamId = $_GET['id'];
          }
     }

     if($getAdminId && $getParamId){
          $isDisabled = '';
     }
?>

<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Dashboard - Brand</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
     <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
     <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
     <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
     <link rel="stylesheet" href="style.css">
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
                    <li class="nav-item"><a class="nav-link" href="question.php"><i class="fas fa-table"></i> <span>Question</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="examination.php"><i class="fas fa-table"></i> <span>Examination</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fas fa-user-tie"></i> <span>Admin</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>

          <div class="d-flex flex-column" id="content-wrapper">
          <div id="content">
               <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <!-- <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form> -->
                         <ul class="navbar-nav flex-nowrap ms-auto">
                            <!-- <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li> -->
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
                    <h3 class="text-dark mb-4">Examination Detail</h3>
                    <div class="row mb-3">
                         <div class="col-lg-4">
                              <div class="card shadow mb-4">
                                   <div class="card-header py-3 d-sm-flex justify-content-between align-items-center">
                                        <h6 class="text-primary fw-bold m-0">Examination Details</h6>
                                        <button class="btn btn-primary btn-sm d-none d-sm-inline-block <?php echo $isDisabled ?>" id='saveChange'>Save Changes</button>
                                   </div>
                                   <div class="card-body">
                                        <form id='updateExamForm'>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_code"><strong>Exam Title</strong></label>
                                                            <input class="form-control" type="text"  name="examTitle" >
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_code"><strong>Exam Code</strong></label>
                                                            <input class="form-control" type="text"  name="examCode" >
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_status"><strong>Exam Status</strong></label>
                                                            <select class="form-select" name="examStatus">
                                                                 <option value="Draft">Draft</option>
                                                                 <option value="In-Progress">In Progress</option>
                                                                 <option value="Completed">Completed</option>
                                                            </select>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_code"><strong>Exam Date</strong></label>
                                                            <input class="form-control" type="datetime-local" name="examDateTime">
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_code"><strong>Exam Duration</strong></label>
                                                            <input class="form-control" type="time" step="3600000" placeholder="Exam Duration" name="examDuration">
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_code"><strong>Total Question</strong></label>
                                                            <input class="form-control" type="text"  name="examTotalQuestion" >
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_code"><strong>Mark Right Answer</strong></label>
                                                            <input class="form-control" type="text"  name="markRightAns" >
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="exam_code"><strong>Mark Right Answer</strong></label>
                                                            <input class="form-control" type="text"  name="markWrongAns" >
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="mb-3">
                                                            <label class="form-label" for="username"><strong>Exam Creator</strong></label>
                                                            <input class="form-control " type="text" id="username" name="username" disabled></div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" name="email" disabled></div>
                                                  </div>
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-8">
                              <div class="row">
                                   <div class="col">
                                        <div class="card shadow mb-3">
                                             <div class="card-header py-3 d-sm-flex justify-content-between align-items-center">
                                                  <p class="text-primary m-0 fw-bold">Question List</p>
                                                  <button class="btn btn-primary btn-sm d-none d-sm-inline-block <?php echo $isDisabled ?>" data-bs-toggle="modal" data-bs-target="#addQuestionModal" ><i class="fas fa-plus"></i> New</button>
                                             </div>
                                             <div class="card-body">
                                                  <!-- datatable -->

                                                  <table class="table my-0" id="dataTableExamQtnList">
                                                       <thead>
                                                            <tr>
                                                                 <th>Question Title</th>
                                                                 <th>Action</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                       <?php

                                                            if($getParamId){
                                                                 $rows = $createController->getQuestion('exam_id = '.$getParamId);
                                                                 // var_dump($rows);
                                                                 // echo 'no→'.$rows->num_rows;
                                                                 if($rows->num_rows != 0){

                                                                 
                                                                      while ($row = $rows->fetch_assoc()) {
                                                       ?>
                                                            <tr>
                                                                 <td class="col-6 text-truncate"><?php echo $row['question_title']; ?></td>
                                                                 <td  class="col-6 text-truncate">
                                                                      <button type="button" class="btn btn-info btn-sm text-white d-none d-sm-inline-block <?php echo $isDisabled ?>" name="updateQuestion_btn" data-bs-toggle="modal" data-bs-target="#addQuestionModal" value="<?php echo $row['question_id']; ?>" ><i class="fas fa-edit"></i></button>

                                                                      <button type="button" class="btn btn-danger btn-sm text-white d-none d-sm-inline-block <?php echo $isDisabled ?>" value=""><i class="fas fa-trash-alt">del</i></button>

                                                                      <!-- <a class="" <?php echo $isDisabled; ?> href="#" target="_blank" ><button type="button" class="btn btn-primary btn-sm text-white d-none d-sm-inline-block <?php echo $isDisabled ?>" ><i class="fas fa-eye <?php echo $isDisabled ?>"></i></button></a> -->
                                                                 </td>

                                                            </tr>

                                                       <?php 
                                                                      }
                                                                 } 
                                                            }

                                                       ?>
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <!-- ===========Add Question Modal============== -->
               <div class="modal fade" id="addQuestionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addnewstudentLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="addnewstudentLabel">Add New Question</h5>
                                   <button type="button" class="btn-close btn-md" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                   <form id='addQuestionForm'>
                                        
                                        <!-- <div class="row">
                                             <div class="col">
                                             <div class="input-group mb-3">
                                                  <input type="text" class="form-control" placeholder="Examination" aria-label="Examination" aria-describedby="examination-lookup_btn">
                                                  <button class="btn btn-outline-secondary" type="button" id="examination-lookup_btn"><i class="fas fa-search"></i></button>
                                                  </div>
                                             </div>
                                        </div> -->
                                        <div class="row">
                                             <div class="col">
                                             <div class="mb-3">
                                                  <label class="form-label" for="question-title">
                                                       <strong>Question</strong>
                                                  </label>
                                                  <textarea class="form-control" name="questionTitle" id="question-title" rows="5"></textarea>
                                             </div>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="col">
                                             <div class="mb-3" id="new-question-choices">
                                                  <div class="form-label d-flex justify-content-between align-items-center mb-4 mt-2" for="question-choices">
                                                       <strong>Options</strong>
                                                       <button type="button" class="btn btn-info btn-sm" id="add_new_option"><i class="fas fa-plus text-white"></i></button>
                                                  </div>
                                                  
                                                  <!-- <div class="input-group mb-3" name="divOptions">
                                                       <div class="input-group-text">
                                                       <input class="form-check-input mt-0" type="checkbox" name="optionCheckBox0" aria-label="Checkbox for following text input">
                                                       </div>
                                                       <input type="text" class="form-control" name="optionInput0" aria-label="Text input with checkbox">
                                                  </div> -->

                                             </div>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                                   <button type="button" id='addQuestionBtn' class="btn btn-primary">Add Question</button>
                              </div>
                         </div>
                    </div>
               </div>
               <!-- ===========Add Question Modal============== -->

               
               <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                         <div class="text-center my-auto copyright"><span>Copyright © Suicide Squad 2021</span></div>
                         <input id="adminId" value="<?php echo $getAdminId ?>" style="display: none; "></input>
                         <input id="examId" value="<?php echo $getParamId ?>" style="display: none; "></input>
                    </div>
               </footer>
          </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

     </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTableExamQtnList').DataTable();
        });
    </script>
</body>


</html>
<?php 

     if(isset($_SESSION)){

          $getAdminId = '';

          if(isset($_SESSION['admin_id'])){
          $getAdminId = $_SESSION['admin_id'];
          }
          if($getAdminId){
          $isDisabled = '';
          } else{
          $sweetAlert->displaySweetAlert('error', 'Please login first', '', "<a href='login.php'>Login</a>");
          }

     }

?>
