<?php
error_reporting(0);
session_start();
include("db_connection.php");

if (strlen($_SESSION['username']) == 0) {
    header('location: index.php');
 }


if (isset($_POST['submit'])) {
    # code...
    $subject = $_POST['subject'];
    $question_name = $_POST['qnspaper'];
    
    $sql = mysqli_query($conn, "SELECT COUNT(question_paper) AS question_paper FROM `question_papers` WHERE question_paper = '$question_name'"); 
    $res = mysqli_fetch_assoc($sql);
    $qns=$res['question_paper'];
    // echo "<script>alert('$qns');</script>";
    if ($qns >= 1) {
        # code...
        echo "<script>alert('aleready there');</script>";
    }
    else{
         mysqli_query($conn, "INSERT INTO `question_papers`(`subject`, `question_paper`) VALUES ('$subject', '$question_name')");
         echo "<script>alert('Uploaded');</script>";
    }

   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Avanni">
    <title>SRIT | Automatic question paper generator</title>
    <link rel="shortcut icon" href="img/sritlogo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/107525cc11.js"></script>
    <style type="text/css">
        .nav{
            
            list-style-type: none;
        }
        .nav{
              display: flex;
              justify-content:space-around;
              position: relative;top: 40%;
              height: 40px;
              line-height: 40px;
        }
        .main{
            position: relative;
            
            top: 70px;
            /*transform: translate(-50%, -50%);*/
        }
        .function{box-shadow: 4px 3px 14px 7px lightgray;transition: .4s;border-radius: 1em;width: 300px;height: 300px;position: absolute;top: 55%;left: 50%;transform: translate(-50%, -50%);}
        
        select{
            display: block;
            border: none;
            outline: none;
            border-bottom: 1px solid gray;
            margin-top: 10px;
            width: 100%;
        }
        input[type='submit']
        {
           width: 100%;
           border: none;
           padding: 7px;
           background-color: #1E90FF;
        }
        input[type='file']{
            border: none;
            width:  100%;
            border-bottom: 1pz solid gray;
        }

    </style>
</head>
<body>
<!-- <?php include('header.php');?> -->

 <center><img src="srithead.png" alt="SRINIVASA RAMANUJAN INSTITUTE OF TECHNOLOGY"></center>
    <div class="function container" >
        <form action="" method="post">
        <div class="container p-5">
            

            <label for="subject">Select Subject</label>
            <select name="subject" id="subject" required>
                <option></option>
                <?php

                $sql = mysqli_query($conn, "SELECT distinct subject FROM questions ");
                 while($res = mysqli_fetch_assoc($sql))
                 {
                 $subject = $res['subject'];
                ?>
                <option value="<?php echo($subject)?>"><?php echo($subject);?></option>
            <?php } ?>
            </select>

            <label for="file" class="mt-4">Choose file</label>
            <input type="file" name="qnspaper" class="mt-2" required>

        </div>

        

        <div>
            <input type="submit" name="submit" value="Upload Question paper">
        </div>
    </form>
    </div>



    <script src="assets/js/validation_js.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/equal-height.min.html"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/progress-bar.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/YTPlayer.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>