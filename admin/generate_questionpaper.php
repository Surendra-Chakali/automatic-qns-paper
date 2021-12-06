<?php
error_reporting(0);
session_start();
include("db_connection.php");

if (strlen($_SESSION['username']) == 0) {
    header('location: index.php');
 }

$subject = $_SESSION['subject'];


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
        .function{box-shadow: 4px 3px 14px 7px lightgray;transition: .4s;border-radius: 1em;width: 900px;}
        
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

    </style>
</head>
<body>
<?php
 $s = 1;
 $unitnumber = 1;
?>


    <div class="container function mt-4 pb-4">
        <div class="p-5">
           
            <div class="">
               <img src="img/sritlogo.png" alt="Logo" class="float-left" width="90px" height="90px">
            </div>
            <h4 class="text-center">SRINIVASA RAMANUJAN INSTITUTE OF TECHNOLOGY</h4>
            <p class="text-center" style="font-size: 14px;">(Affiliated to JNTUA & approved by AICTE)(Accredited by NAAC with 'A'Grade & Accredited by NBA[EEE, ECE & CSE])</p>

            <h5 class="text-center" style="text-transform: uppercase;"><?php echo($subject);?></h5>
            <div class="pt-5 pb-4">
                <p><span style="float: left;">Time: 3 hours</span>
               <span style="float: right;">Max Marks: 70</span></p>
            </div>
            <div class="mt-4 m-4">
                <p class="text-center"><b>PART - A</b></p>
                <p class="text-center">(Compulsory Questions)</p>
                <p class="mb-4"><b>I.&nbsp;&nbsp;Answer the following (10 x 2 = 20)</b></p>
                <?php

                    $i = 1;

                    $sql = mysqli_query($conn, "SELECT * FROM questions WHERE subject = '$subject' AND marks = '2' ORDER BY RAND() LIMIT 10");
                    while($res = mysqli_fetch_assoc($sql))
                    {
                    $question = $res['question'];
                    $id = $res['id'];
                ?>
                    <div>
                        <p class="pl-4" style="margin-top: -10px;"><?php echo($i);?>&nbsp;&nbsp;&nbsp;<?php echo($question);?></p>
                    </div>
                <?php
                $i++;
            }
            ?>
            </div>

            <div class="mt-4 m-4">
               <p class="text-center"><b>PART - B</b></p>
                <p class="text-center">(Answer all five units, 5 x 10 = 50)</p>
                
                <?php

                   while($unitnumber <= 5)
                       {
                        echo "<p class='text-center'><b> UNIT - $unitnumber</b></p>";
                    $sql = mysqli_query($conn, "SELECT * FROM questions WHERE subject = '$subject' AND unit = '$unitnumber' AND marks != '2' ORDER BY RAND() LIMIT 1");
                       while($res = mysqli_fetch_assoc($sql))
                        {
                        $question = $res['question'];
                        $marks = $res['marks'];
                        $unit = $res['unit'];
                        $question_level = $res['question_level'];
                        $cognitive_level = $res['cognitive_level'];


        $sql1 = mysqli_query($conn, "SELECT * FROM questions WHERE subject = '$subject' AND question != '$question' AND unit = '$unitnumber' AND marks = '5' ORDER BY RAND()  LIMIT 1");
                         $res1 = mysqli_fetch_assoc($sql1);
                         $question1 = $res1['question'];
                        $marks1 = $res1['marks'];
                        $unit1 = $res1['unit'];
                        $question_level1 = $res1['question_level'];
                        $cognitive_level1 = $res1['cognitive_level'];

                      
                            # code...
                        

                        ?>
                    <div>
                        <?php

                        if ($marks != "10") {
                           
                            # code...
                            ?>
                            <p class="pl-4"><?php echo($s);?>&nbsp;&nbsp;a.&nbsp;&nbsp;<?php echo($question);?></p>
                            <p class="pl-4">&nbsp;&nbsp;&nbsp;&nbsp;b.&nbsp;&nbsp;<?php echo($question1);?></p>
                        <?php
                        }
                        else
                        {
                        ?>
                        <p class="pl-4"><?php echo($s);?>&nbsp;&nbsp;&nbsp;<?php echo($question);?></p>
                    <?php
                     }
                     $s++;
                    ?>

                        <p class="text-center"><b>OR</b></p>
                        <?php

$sql2 = mysqli_query($conn, "SELECT * FROM questions WHERE subject = '$subject' AND unit = '$unitnumber' AND question != '$question' AND question != '$question1' AND marks != '2' ORDER BY RAND() LIMIT 1");
                       while($res2 = mysqli_fetch_assoc($sql2))
                        {
                        $question2 = $res2['question'];
                        $marks2 = $res2['marks'];
                        $unit2 = $res2['unit'];
                        $question_level2 = $res2['question_level'];
                        $cognitive_level2 = $res2['cognitive_level'];


        $sql3 = mysqli_query($conn, "SELECT * FROM questions WHERE subject = '$subject' AND question != '$question2' AND unit = '$unitnumber' AND marks = '5' ORDER BY RAND()  LIMIT 1");
                         $res3 = mysqli_fetch_assoc($sql3);
                         $question3 = $res3['question'];
                        $marks3 = $res3['marks'];
                        $unit3 = $res3['unit'];
                        $question_level3 = $res3['question_level'];
                        $cognitive_level3 = $res3['cognitive_level'];


                        if ($marks2 != "10") {
                            # code...
                            ?>
                            <p class="pl-4"><?php echo($s);?>&nbsp;&nbsp;a.&nbsp;&nbsp;<?php echo($question2);?></p>
                            <p class="pl-4">&nbsp;&nbsp;&nbsp;&nbsp;b.&nbsp;&nbsp;<?php echo($question3);?></p>
                        <?php
                        }
                        else
                        {
                        ?>
                        <p class="pl-4"><?php echo($s);?>&nbsp;&nbsp;&nbsp;<?php echo($question2);?></p>
                    <?php } $s++;
                } }
                       $unitnumber++;
                   }
                       
                   
                       ?>
            </div>
        </div>
    </div>

    <div align="center" class="p-5">
        <button type="submit" class="btn btn-warning pl-4 pr-4" onclick="window.print();">Print</button>
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