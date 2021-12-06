<?php
error_reporting(0);
session_start();
include("db_connection.php");

if (strlen($_SESSION['username']) == 0) {
    header('location: index.php');
 }

$subject = $_SESSION['subject'];

// echo "<script>alert('$subject');</script>";

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
               <span style="float: right;">Max Marks: 20</span></p>
            </div>
            <div class="mt-4 m-4 table-responsive">
               <table class="table table-bordered">
                   <thead>
                       <tr>
                           <th colspan="2"></th>
                           <th class="text-center">Question</th>
                           <th class="text-center">Marks</th>
                           <th class="text-center">Unit</th>
                           <th class="text-center">level</th>
                           <th class="text-center">Cognitive</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php 
                       while($unitnumber <= 5)
                       {
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

                        ?>

                        <tr style="margin: 0px;padding: 0px;">
                            <td align="center"><?php echo($s);?></td>
                            <td>a</td>

                            <!-- <td>a</td> -->
                            <td><?php echo($question);?></td>
                             <td class="text-center"><?php echo($marks);?></td>
                             <td class="text-center"><?php echo($unit);?></td>
                              <td class="text-center"><?php echo($question_level);?></td>
                               <td class="text-center"><?php echo($cognitive_level);?></td>
                        </tr>
                        <?php
                        if ($marks != "10") {
                            # code...
                        
                        ?>
                         <tr style="margin: 0px;padding: 0px;">
                           <td></td>
                            <td>b</td>
                            <td><?php echo($question1);?></td>
                             <td class="text-center"><?php echo($marks1);?></td>
                             <td class="text-center"><?php echo($unit1);?></td>
                              <td class="text-center"><?php echo($question_level1);?></td>
                               <td class="text-center"><?php echo($cognitive_level1);?></td>
                        </tr>


                    <?php
                   
                }
                 $s++;
                       }
                       $unitnumber++;
                   }
                       ?>
                   </tbody>
               </table>
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