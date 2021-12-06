<?php
session_start();
if (strlen($_SESSION['username']) == 0) {
    header('location: login.php');
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SRIT | Automatic question paper generator</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   <link rel="shortcut icon" href="img/sritlogo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/107525cc11.js"></script>



<style type="text/css">
.form-style-4{
  width: 450px;
  font-size: 16px;
  background: #495C70;
  padding: 30px 30px 15px 30px;
  border: 5px solid #53687E;
}
.form-style-4 input[type=submit],
.form-style-4 input[type=button],
.form-style-4 input[type=text],
.form-style-4 input[type=email],
.form-style-4 textarea,
.form-style-4 label
{
  font-family: Georgia, "Times New Roman", Times, serif;
  font-size: 16px;
  color: #fff;

}
.form-style-4 label {
  display:block;
  margin-bottom: 10px;
}
.form-style-4 label > span{
  display: inline-block;
  float: left;
  width: 150px;
}
.form-style-4 input[type=text],
.form-style-4 input[type=email] 
{
  background: transparent;
  border: none;
  border-bottom: 1px dashed #83A4C5;
  width: 275px;
  outline: none;
  padding: 0px 0px 0px 0px;
  font-style: italic;
}
.form-style-4 input,select{
  font-style: italic;
  background: transparent;
  outline: none;
  border: none;
  border-bottom: 1px dashed #83A4C5;
  width: 275px;
  overflow: hidden;
  resize:none;
  height: 40px;
  
}

 
.form-style-4 input[type=text]:focus,
.form-style-4 input[type=email]:focus,
.form-style-4 input[type=email] :focus
{
  border-bottom: 1px dashed #D9FFA9;
}

.form-style-4 input[type=submit],
.form-style-4 input[type=button]{
  background: #576E86;
  border: none;
  margin-top: 10px;
  border-radius: 5px;
  color: #A8BACE;
}
.form-style-4 input[type=submit]:hover,
.form-style-4 input[type=button]:hover{
background: #394D61;
}
</style>

<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>


  <!-- =======================================================
  * Template Name: iPortfolio - v3.1.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<?php
include('db_connection.php');
if (isset($_POST['submit'])) {
    # code...
    $question = $_POST['question'];
    $marks = $_POST['marks'];
    $subject = $_POST['subject'];
    $level = $_POST['level'];
    $cognitive = $_POST['cognitive'];
    $unit = $_POST['unit'];

    $sql = mysqli_query($conn, "SELECT COUNT(question) AS question FROM questions WHERE question = '$question' AND marks = '$marks'");
    $res = mysqli_fetch_assoc($sql);
    $qns = $res['question'];
    if ($qns >= 1) {
      # code...
      echo "<script>alert('oops! Question was already there');</script>";
    }
    else
    {
    mysqli_query($conn, "INSERT INTO `questions`(`subject`, `question`, `marks`, `question_level`, `cognitive_level`, `unit`) VALUES ('$subject','$question', '$marks', '$level', '$cognitive', '$unit')");
    
     echo "<script>alert('Question Inserted :)');</script>";
}
}


?>

<body>


  <main id="main">
      <center><img src="srithead.png" alt="SRINIVASA RAMANUJAN INSTITUTE OF TECHNOLOGY"></center>
<div align="left" class="mt-4 p-3">
    <a href="manageqns.php" class="btn btn-success">Manage Questions</a><br><br>
     <a href="main.php" class="btn btn-warning">Generate Question Paper</a><br><br>
     <a href="upload.php" class="btn btn-warning">Upload Question Paper</a>
</div>
<center style="position: absolute;top: 70%;left: 50%;transform: translate(-60%, -60%);">

      <form class="form-style-4" action="" method="post">
        <label for="field4">
<span>Enter Subject</span><input type="text" name="subject" required="true">
</label>      

<label for="field4">
<span>Enter Unit number</span>
<select name="unit" required>
  <option></option>
   <option value="1">I</option>
    <option value="2">II</option>
     <option value="3">III</option>
      <option value="4">IV</option>
     <option value="5">V</option>
</select>
</label> 

<label for="field4">
<span>Enter question</span><input type="text" name="question" required="true">
</label> 

<label for="field1">
<span>Enter Marks</span><input type="text" name="marks" required="true" />
</label>

<label for="field4">
<span>Level of question</span>
<select name="level" required>
  <option></option>
   <option value="easy">Easy</option>
    <option value="medium">Medium</option>
     <option value="difficult">Difficult</option>
</select>
</label> 

<label for="field4">
<span>Cognitive Level</span>
<select name="cognitive" required>
  <option></option>
   <option value="understand">understand</option>
    <option value="apply">Apply</option>
     <option value="remember">Remember</option>
</select>
</label> 


<label>
<span> </span><input type="submit" value="submit question" name="submit" />
</label>
</form>
</center>
    </main>
  </body>
</html>
