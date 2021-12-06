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
.form-style-4 textarea{
  font-style: italic;
  padding: 0px 0px 0px 0px;
  background: transparent;
  outline: none;
  border: none;
  border-bottom: 1px dashed #83A4C5;
  width: 275px;
  overflow: hidden;
  resize:none;
  height:60px;
}

.form-style-4 textarea:focus, 
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
  padding: 18px 20px 8px 10px;
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
    // $password = $_POST['Password'];

    mysqli_query($conn, "INSERT INTO `questions`(`question`, `marks`, `subject`) VALUES ('$question','$marks', '$subject')");
    
     echo "<script>alert('Question Inserted :)');</script>";
}

if (isset($_POST['delete'])) {
  # code...
  $qid = $_POST['qid'];
    mysqli_query($conn, "DELETE FROM questions WHERE id='$qid'");
    
     echo "<script>alert('Question Deleted from database :)');</script>";  

}

?>

<body>
<center><img src="srithead.png" alt="SRINIVASA RAMANUJAN INSTITUTE OF TECHNOLOGY"></center>
<div class="container pt-5">
  <h3 class="text-center">Questions available</h3>
    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Question</th>
            <th>Marks</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php

  $sql=mysqli_query($conn, "SELECT * FROM questions");
  while ($res=mysqli_fetch_assoc($sql)) {
    # code...
    $question = $res['question'];
    $qid = $res['id'];
    $mark = $res['marks'];
    ?>
          <tr>
            <td><?php echo($question);?></td>
            <td><?php echo($mark);?></td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="qid" value="<?php echo($qid);?>">
                <input type="submit" name="delete" value="X" style="border: none;background-color: white;">
              </form>
            </td>
          </tr>
          <?php
  }

  ?>
        </tbody>
      </table>
      <div align="center" class="p-5">
        <a href="questions.php" class="btn btn-warning">Insert new question</a>
      </div>
    </div>

    
</div>

</body>
</html>
