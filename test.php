<?php
    // require_once('Classes/loader.php');

    // $test = new CreateController();
    // $data = [
    //     'admin_email' => 'email@email.com',
    //     'admin_password' => 'test'
    // ];
    // // $test->testMetods($data);
    // $getAdminId = '66';
    // $test = new CreateController();
    // $getExam = $test->getExam('exam_id = '.$getAdminId);
    // var_dump('<br> → ',$getExam);

   
    // var_dump('<br> sad → ',$getExam->fetch_assoc());


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

</head>



<!-- 
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.post("actions/action.php",
    {
      deleteExam: true,
      name: "Donald Duck",
      city: "Duckburg"
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>
</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body> -->

<!-- 
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").load("login.php");
  });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button target="_blank">Get External Content</button>

</body> -->

<!-- <script>
$(document).ready(function(){
  $("p").slice(2).css("background-color", "yellow");
});
</script>
</head>
<body>

<h1>Welcome to My Homepage</h1>

<p>My name is Donald (index 0).</p>
<p>Donald Duck (index 1).</p>
<p>I live in Duckburg (index 2).</p>
<p>My best friend is Mickey (index 3).</p>

<div>In this example, we start the selection of p elements from the p element with index position 2. All p elements from this point will be selected. Note that the index numbers start at 0.</div>

</body> -->

<script>
$(document).ready(function(){
  $("p").eq(3).css("background-color", "yellow");
});
</script>
</head>
<body>

<h1>Welcome to My Homepage</h1>

<p>My name is Donald (index 0).</p>
<p>Donald Duck (index 1).</p>
<p>I live in Duckburg (index 2).</p>
<p>My best friend is Mickey (index 3).</p>

</body>


</html>