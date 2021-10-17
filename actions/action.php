<?php
require_once('../Classes/loader.php');

$getError = new GetError();
$createController = new CreateController();
date_default_timezone_set("Asia/Singapore");
// $getError->errorAdminEmail = '';
// $getError->errorAdminPassword = '';
// $getError->errorConfirmAdminPassword = '';
// $getError->errorSystem = '';
session_start();

// var_dump('<br> post → ',$_POST);
// var_dump('<br> get → ',$_GET);


if(isset($_POST['addStudent'])){




    $data = [
        'admin_email' => 'email@email.com',
        'admin_password' => 'test'
    ];
    $createController->testMetods($data);

}else if(isset($_POST['registerAdmin'])){

    $adminEmail = $adminPassword = $confirmAdminPassword = "";
    $adminEmail_err = $adminPassword_err = $confirmAdminPassword_err = "";

    if(empty(trim($_POST["adminEmail"]))){
        $adminEmail_err = "Please enter a Email.";
    } else {

        $data = $createController->getAdmin('tbl_admin', '*', 'admin_email = "' . $_POST["adminEmail"] . '"');

        if($data->num_rows > 0 ){
            $adminEmail_err =  "This username is already taken.";
        } else {
            $adminEmail = $_POST["adminEmail"];
        }
    }

    // Validate password
    if(empty(trim($_POST["adminPassword"]))){
        $adminPassword_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["adminPassword"])) < 8){
        $adminPassword_err = "Password must have atleast 6 characters.";
    } else{
        $adminPassword = trim($_POST["adminPassword"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirmAdminPassword"]))){
        $confirmAdminPassword_err = "Please confirm password.";
    } else{

        $confirmAdminPassword = trim($_POST["confirmAdminPassword"]);

        if(empty($adminPassword_err) && ($adminPassword != $confirmAdminPassword)){
            $confirmAdminPassword_err = "Password did not match.";
        }

    }
    if(empty($adminEmail_err) && empty($adminPassword_err) && empty($confirmAdminPassword_err)){

        $dataInsert = $arrayName = array('admin_email' => $adminEmail , 'admin_password' => password_hash($adminPassword, PASSWORD_DEFAULT), 'admin_created_on' => date_format(date_create(),"Y/m/d H:iP") );

        $row = $createController->insertAdmin($dataInsert);
        if ($row === 'Successful Create Record.') {
            header("location: ../login.php");
            $_SESSION['getSuccess'] = 'Successful Create Admin Account';
        } else {
            # code...


            $getError->errorSystem = 'Creation of Admin Acount Error: ' . $row;
            echo 'Creation of Admin Acount Error: ' . $row;
            $_SESSION["getError"] = $getError;
            header("location: ../register.php");
        }
        // die('Creation of Admin Acount Error: ' . $row);
    } else {

        $getError->errorAdminEmail = $adminEmail_err;
        $getError->errorAdminPassword = $adminPassword_err;
        $getError->errorConfirmAdminPassword = $confirmAdminPassword_err;


        // var_dump($getError);
        $_SESSION["getError"] = $getError;
        header("location: ../register.php");


        // echo $adminEmail_err;
        // echo $adminPassword_err;
        // echo $confirmAdminPassword_err;
        /*
        if(!empty($adminEmail_err)){
            echo $adminEmail_err;
        }

        if(!empty($adminPassword_err)){
            echo $adminPassword_err;
        }

        if(!empty($confirmAdminPassword_err)){
            echo $confirmAdminPassword_err;
        }
        */
    }

} else if(isset($_POST['loginAdmin'])){

    $loginEmail = $loginPassword = "";
    $loginEmail_err = $loginPassword_err = $login_err = "";

    // Check if username is empty
    if(empty(trim($_POST["loginEmail"]))){
        $loginEmail_err = "Please enter username.";
    } else{
        $loginEmail = trim($_POST["loginEmail"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["loginPassword"]))){
        $loginPassword_err = "Please enter your password.";
    } else{
        $loginPassword = trim($_POST["loginPassword"]);
    }

    if(empty($loginEmail_err) && empty($loginPassword_err)){
        $data = $createController->getAdmin('tbl_admin', '*', 'admin_email = "' . $loginEmail . '"' );

        if($data->num_rows == 1){
            $row = $data->fetch_assoc();

            $getPassword = $row['admin_password'];
            $getAdminId = $row['admin_id'];
            $getAdminEmail = $row['admin_email'];


            echo '<br>getPassword → ' .$getPassword;

            if(password_verify($loginPassword, $getPassword)){
                $_SESSION["admin_id"] = $getAdminId;
                $_SESSION["admin_email"] = $getAdminEmail;

                $_SESSION['getSuccess'] = 'Successful Login';

                header("location: ../index.php");

            } else {
                $login_err = "Invalid password. ";

                $getError->errorSystem = $login_err;
                $_SESSION["getError"] = $getError;

                header("location: ../login.php");
            }

        }else {
            $login_err = "Invalid username or password. ";

            $getError->errorSystem = $login_err;


            $_SESSION["getError"] = $getError;
            echo 'get session';
            var_dump($_SESSION);
            header("location: ../login.php");

        }

    }
} else if(isset($_POST['addExam'])){

    echo '<br> ===== POST ====== <br>';
    var_dump($_POST);
    echo '<br> ===== POST ====== <br>';

    echo '<br> ===== Session ====== <br>';
    var_dump($_SESSION);
    echo '<br> ===== Session ====== <br>';

    $getExamCourse          = $_POST['examCourse'];
    $getExamTitle           = $_POST['examTitle'];
    $getExamCode            = $_POST['examCode'];
    $getExamDateTime        = $_POST['examDateTime'];
    $getExamTime            = $_POST['examTime'];
    $getExamDuration        = $_POST['examDuration'];
    $getExamTotalQuestion   = $_POST['examTotalQuestion'];
    $getMarkRightAns        = $_POST['markRightAns'];
    $getMarkWrongAns        = $_POST['markWrongAns'];
    $getExamStatus          = $_POST['examStatus'];
    $getAddExam             = $_POST['addExam'];
    $getAdminId             = $_SESSION['admin_id'];



    $dates = date_create($getExamDateTime);
    // $dateToday = date_create(date("Y-m-d H:i:s"));
    $dateToday = date_create();

    $diff = date_diff($dateToday,$dates);

    $isValid = $diff->format("%R");
    if($isValid === '+'){


        /*
        echo '<br>'. $diff->format("%a days");
        echo '<br>'. $diff->format("%R days");
        echo '<br>'. $diff->format("%r days");
        echo '<br>'. $diff->format("%H hour");
        echo '<br>'. $diff->format("%h hour");
        */
        $formatDate = date_format($dates, "Y/m/d H:i");

        var_dump('<br> date today' , date_create());
        echo '<br> format date' . $formatDate;



        // $dataInsert = $arrayName = array('admin_id' => $getAdminId, 'exam_created' => date_format(date_create(),"Y/m/d H:iP") );
        $dataInsert = $arrayName = array('admin_id' => $getAdminId, 'exam_title' => $getExamTitle, 'exam_datetime' => $formatDate, 'exam_duration' => $getExamDuration, 'total_question' => $getExamTotalQuestion, 'marks_right_ans' => $getMarkRightAns, 'mark_wrong_ans' => $getMarkWrongAns, 'exam_created' => date('F d, Y h:i'), 'exam_status' => $getExamStatus, 'exam_code' => $getExamCode );


        var_dump('<br>dataInsert → ', $dataInsert);

        $row = $createController->insertExam($dataInsert);


        if ($row === 'Successful Create Record.') {
            // echo 'Successful Create Record.';
            $_SESSION['getSuccess'] = 'Successful Create Examination Record';

            header("location: ../examination.php");
        }
        else {

            $getError->errorSystem = 'Creation of Examination Error: ' . $row;
            echo 'Creation of Examination Error: ' . $row;
            $_SESSION["getError"] = $getError;
            header("location: ../examination.php");
        }


    } else {
        $getError->errorSystem = 'Creation of Examination Error: Examination is need in the Future Date';
        echo 'Creation of Examination Error: Examination is need in the Future Date';
        $_SESSION["getError"] = $getError;
        header("location: ../examination.php");
    }

} else if(isset($_POST['updateExam'])){


  $getExamCourse          = $_POST['examCourse'];
  $getExamTitle           = $_POST['examTitle'];
  $getExamCode            = $_POST['examCode'];
  $getExamDateTime        = $_POST['examDateTime'];
  $getExamDuration        = $_POST['examDuration'];
  $getExamTotalQuestion   = $_POST['examTotalQuestion'];
  $getMarkRightAns        = $_POST['markRightAns'];
  $getMarkWrongAns        = $_POST['markWrongAns'];
  $getExamStatus          = $_POST['examStatus'];

  $dates = date_create($getExamDateTime);
  // $dateToday = date_create(date("Y-m-d H:i:s"));
  $dateToday = date_create();

  $diff = date_diff($dateToday,$dates);

  $isValid = $diff->format("%R");
  if($isValid === '+'){

    $formatDate = date_format($dates, "Y/m/d H:i");

    $data = $arrayName = array(

    'exam_title' => $getExamTitle,
      'exam_datetime' => $formatDate,
      'exam_duration' => $getExamDuration,
      'total_question' => $getExamTotalQuestion,
      'marks_right_ans' => $getMarkRightAns,
      'mark_wrong_ans' => $getMarkWrongAns,
      'exam_status' => $getExamStatus,
      'exam_code' => $getExamCode );

    $rows = $createController->updateExam($_POST['recordId'], $data);
    echo 'update exam → ' . $rows;
    if($rows === 'Successfuly Updated Record.'){

        $_SESSION['getSuccess'] = 'Successful updated exam';
        header('location: ../examination.php');
    } else{
        $getError->errorSystem = 'Updating of Examination Error: ' .$rows;
        $_SESSION["getError"] = $getError;
        header("location: ../examination.php");
    }
      /*
      echo '<br>'. $diff->format("%a days");
      echo '<br>'. $diff->format("%R days");
      echo '<br>'. $diff->format("%r days");
      echo '<br>'. $diff->format("%H hour");
      echo '<br>'. $diff->format("%h hour");
      */


  } else {
      $getError->errorSystem = 'Updating of Examination Error: Examination is need in the Future Date';
      echo 'Creation of Examination Error: Examination is need in the Future Date';
      $_SESSION["getError"] = $getError;
      header("location: ../examination.php");
  }



}else if(isset($_POST['getSpecificExam'])){
    // echo 'saasdf';
    // var_dump($_POST);
    $id=null;
    $rows;
    if(isset($_POST['id'])){

        $id = $_POST['id'];
    }
    if($id){
        // echo 'id ☻6 '. $id;
        $rows = $createController->getExam('exam_id = ' . $id);
    } else {
        $rows = $createController->getExam();
    }
    // echo 'rews → '. $rows;
    echo json_encode(mysqli_fetch_assoc($rows));

}else if(isset($_POST['deleteExam'])){

    // echo "Success";
    // var_dump('<br> post → ',$_POST);
    $id = $_POST['Id'];
    $rows = $createController->deleteExam($id);

    echo $rows;
    
}else if(isset($_POST['getAdmin'])){

    if(isset($_SESSION)){

         $getAdminId = '';
 
         if(isset($_SESSION['admin_id'])){
             $getAdminId = $_SESSION['admin_id'];
         }

         if($getAdminId){
            $data = $createController->getAdmin('tbl_admin', '*', 'admin_id = "' . $getAdminId . '"' );
            echo json_encode(mysqli_fetch_assoc($data));
         }
 
     }
    
}else if(isset($_POST['updateExamAjax'])){

    $getExamTitle           = $_POST['examTitle'];
    $getExamCode            = $_POST['examCode'];
    $getExamDateTime        = $_POST['examDateTime'];
    $getExamDuration        = $_POST['examDuration'];
    $getExamTotalQuestion   = $_POST['examTotalQuestion'];
    $getMarkRightAns        = $_POST['markRightAns'];
    $getMarkWrongAns        = $_POST['markWrongAns'];
    $getExamStatus          = $_POST['examStatus'];
    $examId                 = $_POST['examId'];
  
    $dates = date_create($getExamDateTime);
    // $dateToday = date_create(date("Y-m-d H:i:s"));
    $dateToday = date_create();
  
    $diff = date_diff($dateToday,$dates);
  
    $isValid = $diff->format("%R");
    if($isValid === '+'){
  
      $formatDate = date_format($dates, "Y/m/d H:i");
  
      $data = $arrayName = array(
  
      'exam_title' => $getExamTitle,
        'exam_datetime' => $formatDate,
        'exam_duration' => $getExamDuration,
        'total_question' => $getExamTotalQuestion,
        'marks_right_ans' => $getMarkRightAns,
        'mark_wrong_ans' => $getMarkWrongAns,
        'exam_status' => $getExamStatus,
        'exam_code' => $getExamCode );
  
      $rows = $createController->updateExam($examId, $data);
      echo $rows;

  
    } else {
        echo 'Updating of Examination Error: Examination is need in the Future Date';
    }
  
  
  
}else if(isset($_POST['createQuestion'])){

    // echo 'Successful Create Record.';
    
    $examId         = $_POST['examId'];
    $questionTitle  = $_POST['questionTitle'];
    $options         = $_POST['option'];

    $dataInsert = array('exam_id' => $examId, 'question_title' => $questionTitle );

    $row = $createController->insertQuestion($dataInsert);

    $createdId = $row->insert_id;
    // $createdId = '10';

    if($createdId){
        $isSuccess = false;
        // working but not good 
        foreach($options as $arr){
            $obj =  array_keys($arr);
            $option = array();
            foreach($obj as $key){
                array_push($option, $arr[$key]);
            }

            $dataInsertOption = array('question_id' => $createdId, 'ans_option' => $option[0], 'correct_answer' => $option[1]);
            $row = $createController->insertOption($dataInsertOption);
            if($row == 'Successful Create Record.'){
                $isSuccess = true;
            } else {
                echo $row;
                return;
            }

        }
        if($isSuccess){
            echo 'Successful Create Record.';
        } else {
            echo 'Error Create Record.';
        }

    } else{
        echo $row->error;
    }
    

}else if(isset($_POST['getQuestion'])){

    // question Id
    $Id = $_POST['Id'];
    // echo $questionId;
    $rows = $createController->getQuestion('question_id = '.$Id);

    echo json_encode(mysqli_fetch_assoc($rows));
    // var_dump($rows);
    // echo 'Successful Create Record.';

}else if(isset($_POST['getOption'])){

    // question Id
    $Id = $_POST['Id'];
    // echo $questionId;
    $rows = $createController->getOption('question_id = '.$Id);

    echo json_encode($rows->fetch_all(MYSQLI_ASSOC));
    // echo json_encode($rows->fetch_assoc());
    // var_dump($rows);
    // echo 'Successful Create Record.';

}else{
    echo "wla";
    // $_SESSION['getSuccess'] = 'Successful updated exam';
    // header("location: ../examination.php");
}
