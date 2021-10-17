$(document).ready(function () {

  var locationSearch = this['location'].search;

  //remove ? 
  var urlParameter = locationSearch.slice(1);

  // split the urlParameter if contains &
  var split = urlParameter.split('&');


  if (split != '') {
    var arrayUrlParameter = [];

    for (const iterator of split) {

      // split the split if contains =
      var split2 = iterator.split('=');
      arrayUrlParameter.push({
        'param': split2[1]
      });
    }
  }

  var firstParam;
  // console.log('arrayUrlParameter ', arrayUrlParameter);
  if (arrayUrlParameter) {
    if (arrayUrlParameter[0]) {
      firstParam = arrayUrlParameter[0]['param'];
    }
    // console.log('test arrayUrlParameter');
  }

  // console.log('firstParam '+firstParam);

  if (firstParam) {

    // console.log('#adminId ',$('#adminId'));
    var adminId = $('#adminId').val();
    var examId = $('#examId').val();

    // console.log('examId '+examId);
    // console.log('adminId '+adminId);

    if (examId != '' && adminId != '') {

      getExams('filtered', '"' + firstParam + '"');
      // getExams('*');
      getAdmin();
    }
  }

  /* ask
  // add option question
  var count = 1;
  $('#add_new_option').on('click', function(){
    var getOuterHTML = $(this).parent().next()[0]['outerHTML'];
    $('#new-question-choices').append(getOuterHTML);
    count ++;

  });
  */

  // add option question / use exam-detail.php
  var count = 0;
  $('#add_new_option').on('click', function () {

    $('#new-question-choices').append('<div class="input-group mb-3" name="divOptions">' +
      '<div class="input-group-text">' +
      '<input class="form-check-input mt-0" type="checkbox" name="optionCheckBox' + count + '" aria-label="Checkbox for following text input">' +
      '</div>' +
      '<input type="text" class="form-control" name="optionInput' + count + '" aria-label="Text input with checkbox">' +
      '</div>');
    count++;

  });

  // Save Question  button / use in exam-detail.php
  $('#addQuestionBtn').on('click', function () {

    var divOptions = $('#addQuestionForm').find('[name=divOptions]');
    // var questionTitle = $('[name=questionTitle]').val();

    var arrayOption = [];

    for (let index = 0; index < divOptions.length; index++) {
      data = {};
      var optionInputName = 'optionInput' + index;
      var optionCheckBoxName = 'optionCheckBox' + index;

      var optionInput = divOptions.find('[name=' + optionInputName + ']').val();
      // console.log(optionInput);

      var optionCheckBox = divOptions.find('[name=' + optionCheckBoxName + ']')[0]['checked'];
      // console.log(optionCheckBox);
      // data.push('saasfd');
      data[optionInputName] = optionInput;
      data[optionCheckBoxName] = optionCheckBox;

      arrayOption.push(data);
      // data[optionCheckBoxName]= optionCheckBox;

    }

    createQuestion(arrayOption);

  });

  // X button / use in exam-detail.php
  $('#addQuestionModal > div > div > div.modal-header > button').on('click', function () {
    emptyOption();
  });

  // cancel button / use in exam-detail.php
  $('#addQuestionModal > div > div > div.modal-footer > button.btn.btn-secondary.btn-sm').on('click', function () {
    emptyOption();
  })

  // Update Question / use in exam-detail.php
  $('[name=updateQuestion_btn]').on('click', function () {
    $('#addnewstudentLabel').text('Update Question');
    $('#addQuestionBtn').text('Update Question');

    var questionId = $(this).val();
    // console.log('questionId '+ questionId);

    getQuestion(questionId);

    getOption(questionId);

  });

  // Update clicked / use in examination.php
  $('[name=updateExam]').on('click', function () {
    $('[name=recordId]').val($(this).attr('value'));
    getExams('filtered', $(this).attr('value'));
    $('#addnewexamLabel').text('Edit Exam Details');
    $('.examBtn').attr('name', 'updateExam');

  });

  // make null/empty the value / use in examination.php
  $('#addNewExamBtn').on('click', function () {
    $('.examBtn').attr('name', 'addExam');
    $('#addnewexamLabel').text('Add New Examination');
    $('[name=examTitle]').val('');
    $('[name=examCode]').val('');
    $('[name=examDateTime]').val('');
    $('[name=examDuration]').val('');
    $('[name=examTotalQuestion]').val('');
    $('[name=markRightAns]').val('');
    $('[name=markWrongAns]').val('');
    $('[name=examStatus]').val('');

  });

  // detele Exam / use in examination.php
  $('[name=deleteExam]').on('click', function () {
    var Id = $(this).val();

    // console.log('Id ' +Id);
    Swal.fire({
      title: 'Are you Sure???',
      // showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Ok'
    }).then((result) => {
      // console.log('result → ',result);

      if (result.isConfirmed) {
        // console.log('isConfirmed');
        deleteExam(Id, this);
      }

    })
    // console.log();

  });

  // save change Exam details / use exam-detail.php
  $('#saveChange').on('click', function () {
    updateExam();
  });


  function getExams(filter = '*', id) {
    // console.log('getExams '+id);
    $.ajax({
      url: 'actions/action.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        'filter': filter,
        'getSpecificExam': true,
        // if(id){
        'id': (id) ? id : ''
        // }
      },
      success: function (response) {

        if (response) {

          let examStrTime = response['exam_datetime'].split(' ');

          // divTitle
          $('#divTitle').text(response['exam_title']);
          $('[name=examTitle]').val(response['exam_title']);
          $('[name=examCode]').val(response['exam_code']);
          $('[name=examDateTime]').val(examStrTime[0] + 'T' + examStrTime[1]);
          $('[name=examDuration]').val(response['exam_duration']);
          $('[name=examTotalQuestion]').val(response['total_question']);
          $('[name=markRightAns]').val(response['marks_right_ans']);
          $('[name=markWrongAns]').val(response['mark_wrong_ans']);
          $('[name=examStatus]').val(response['exam_status']);
        } else {
          Swal.fire({
            icon: "error",
            title: "No record found",
            text: response,
            footer: ""
          })
        }


      },
      error: function (err) {
        console.log('Error: ', err);
      }
    })
  }


  function deleteExam(id, event) {
    // console.log('event → ', event);
    // $(event).parents("tr").css({"color": "red", "border": "2px solid red"});
    // $(event).parents("tr").css({"display": "none"});
    /*
    xhttp.open("POST", "./actions/action.php", true);
    console.log('test delete');


    var data = {
      'deleteExam' : true,
      'Id': id
    };
    xhttp.send('deleteExam = true & Id = id');
    */


    $.ajax({
      url: 'actions/action.php',
      method: 'POST',
      // dataType: 'JSON',
      data: {
        'deleteExam': true,
        'Id': id
      },
      success: function (response) {
        // console.log('success');
        // console.log('response ',response);
        if (response === 'Successfuly Delete Record.') {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: response,
            footer: ""
          })
          $(event).parents("tr").css({
            "display": "none"
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: response,
            footer: ""
          })

        }


      },
      error: function (error) {
        console.log('error → ', error);
      }
    })


  }

  function getAdmin() {
    $.ajax({
      url: 'actions/action.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        'getAdmin': true
      },
      success: function (response) {
        // console.log('response '+response);

        if (response != null) {
          $('#username').val(response['admin_firstName'] + ' ' + response['admin_lastName']);
          $('#email').val(response['admin_email']);

        }
      },
      error: function (err) {
        console.log('Error: ', err);
      }
    })
  }

  function updateExam() {

    var examTitle = $("#updateExamForm").find("[name=examTitle]").val();
    var examCode = $("#updateExamForm").find("[name=examCode]").val();
    var examStatus = $("#updateExamForm").find("[name=examStatus]").val();
    var examDateTime = $("#updateExamForm").find("[name=examDateTime]").val();
    var examDuration = $("#updateExamForm").find("[name=examDuration]").val();
    var examTotalQuestion = $("#updateExamForm").find("[name=examTotalQuestion]").val();
    var markRightAns = $("#updateExamForm").find("[name=markRightAns]").val();
    var markWrongAns = $("#updateExamForm").find("[name=markWrongAns]").val();

    $.ajax({
      url: 'actions/action.php',
      method: 'POST',
      // dataType: 'JSON',
      data: {
        'updateExamAjax': true,
        'examTitle': examTitle,
        'examCode': examCode,
        'examDateTime': examDateTime,
        'examDuration': examDuration,
        'examTotalQuestion': examTotalQuestion,
        'markRightAns': markRightAns,
        'markWrongAns': markWrongAns,
        'examStatus': examStatus,
        'examId': firstParam
      },
      success: function (response) {
        // console.log('response '+response);


        if (response === 'Successfuly Updated Record.') {
          $('#divTitle').text(examTitle);

          Swal.fire({
            icon: "success",
            title: "Success",
            text: response,
            footer: ""
          })
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: response,
            footer: ""
          })

        }

      },
      error: function (err) {
        console.log('Error: ', err);
      }
    })
  }

  function createQuestion(arrayOption) {
    console.log('arrayOption → ' + JSON.stringify(arrayOption));

    //testing data
    // arrayOption = [{"optionInput0":"Options1","optionCheckBox0":true},{"optionInput1":"Options2","optionCheckBox1":false},{"optionInput2":"Options3","optionCheckBox2":false},{"optionInput3":"Options4","optionCheckBox3":true}];

    // testing data 2
    //arrayOption = [{"optionInput":"Options1","optionCheckBox":true},{"optionInput":"Options2","optionCheckBox":false},{"optionInput":"Options3","optionCheckBox":false},{"optionInput":"Options4","optionCheckBox":true}];


    // for testing onlt↓
    /*
    for (var iterator of arrayOption) {
      // console.log('iterator → ',iterator);

      const keySet = Object.keys(iterator);

      for (const key of keySet) {
        console.log('the keySet → '+ key +' And value → '+ iterator[key]);
        
      }
    }
    */

    $.ajax({
      url: 'actions/action.php',
      method: 'POST',
      // dataType: 'JSON',
      data: {
        'createQuestion': true,
        'questionTitle': $('[name=questionTitle]').val(),
        'option': arrayOption,
        'examId': examId
      },
      success: function (response) {
        console.log('response ' + response);


        if (response === 'Successful Create Record.') {
          $('#addQuestionModal').removeClass("show");
          $('div.modal-backdrop.fade').remove();
          /*
          $('#addQuestionModal').attr("role", "");
          $('#page-top').attr("class", "");
          $('#page-top').attr("style", "" );
          */
          Swal.fire({
            icon: "success",
            title: "Success",
            text: response,
            footer: ""
          }).then((result) => {
            if (result.isConfirmed) {

              window.location.reload();
            }

          })
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: response,
            footer: ""
          })

        }


      },
      error: function (err) {
        console.log('Error: ', err);
      }
    })

  }

  function getQuestion(id) {

    $.ajax({
      url: 'actions/action.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        'getQuestion': true,
        'Id': id
      },
      success: function (response) {
        // console.log('get Question response ',response);

        $('#question-title').val(response['question_title']);
        /*
        if(response === 'Successfuly Updated Record.'){
          $('#divTitle').text(examTitle);

            Swal.fire({
                icon: "success",
                title: "Success",
                text: response,
                footer: ""
            })
        } else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: response,
                footer: ""
            })

        } */

      },
      error: function (err) {
        console.log('Error: ', err);
      }
    })

  }

  function getOption(id) {

    return xhr = $.ajax({
      url: 'actions/action.php',
      method: 'POST',
      // dataType: 'JSON',
      data: {
        'getOption': true,
        'Id': id
      },
      success: function (response) {
        // console.log('response get option ',response);

        var toArray = JSON.parse(response);
        // console.log('toArray '+toArray);

        var count = 0;
        for (const key in toArray) {
          if (toArray.hasOwnProperty(key)) {
            const element = toArray[key];
            // console.log('element ',element);
            var isChecked = 'checked';
            if (element['correct_answer'] == 'false') {
              isChecked = '';
            }
            $('#new-question-choices').append('<div class="input-group mb-3" name="divOptions">' +
              '<div class="input-group-text">' +
              '<input class="form-check-input mt-0" type="checkbox" name="optionCheckBox' + count + '" aria-label="Checkbox for following text input" ' + isChecked + '>' +
              '</div>' +
              '<input type="text" class="form-control" name="optionInput' + count + '" aria-label="Text input with checkbox" value="' + element['ans_option'] + '">' +
              '</div>');
            count++;
          }
        }

        // $('#question-title').val(response['question_title']);
        /*
        if(response === 'Successfuly Updated Record.'){
          $('#divTitle').text(examTitle);

            Swal.fire({
                icon: "success",
                title: "Success",
                text: response,
                footer: ""
            })
        } else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: response,
                footer: ""
            })

        } */

      },
      error: function (err) {
        console.log('Error: ', err);
      }
    })


    // xhr.abort();

  }

  // make empty the option
  function emptyOption() {
    $('#new-question-choices > div.input-group').remove();
    $('#question-title').val('');
  }
})