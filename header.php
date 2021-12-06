<?php

include("db_connection.php");
$username = $_SESSION['username'];

if (isset($_POST['update'])) {
    # code...
    $old = $_POST['oldPassword'];
    $new = $_POST['newPassword'];

    $sql = mysqli_query($conn, "SELECT * FROM examsection");
    $res = mysqli_fetch_assoc($sql);
    $rollnum = $res['username'];
    $pass = $res['password'];

    if ($pass == $old) {
        # code...
        $sql = mysqli_query($conn, "UPDATE `examsection` SET `password`='$new' WHERE password = '$old'");
    // $res = mysqli_fetch_assoc($sql);
        echo "<script>alert('Password updated :)');</script>";
    }
    else{
        echo "<script>alert('Old Password is wrong :)');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

<style type="text/css">
    .bar{
        margin-top: 20px;
    }
    @media only screen and (min-width: 768px)
        {
            .navigate{display: none;}
            .wrong{display: none;}
            #nav{
                display: flex;
            }
        }

    @media only screen and (max-width: 767px)
        {
            #navigate{cursor: pointer;}
            #wrong{display: none;cursor: pointer;}
            .result{margin-top: 40px;}
            .result .function{height: 400px;}
            #nav{display: none;}
            .header{margin-top: 10px;}
            /*.navigate{display: block;}*/
            /*.navigate:hover .nav{display: block;}*/
            #nav{
                background-color: tomato;
                width: 140%;
                margin-left: -70px;
                height: 120px;
                position: absolute;
                top: 160%;
                z-index: 10;
                
                
            }
            #nav li a{display: block;text-decoration: none;color: white;margin-left: 20px;text-align: center;}
            #nav li{
                
                width: 100%;
                text-align: center;
                display: block;5
                /*margin-bottom: -10px;*/
            }
            #nav li:hover{
                background-color: #CC4F38;
            }

        }

         .btn-grad {background-image: linear-gradient(to right, #FF512F 0%, #F09819  51%, #FF512F  100%)}
         .btn-grad, .btn-grad1 {
            margin: 10px;
            padding: 10px 20px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
          .btn-grad1 {background-image: linear-gradient(to right, #fc00ff 0%, #00dbde  51%, #fc00ff  100%)}
          .btn-grad1:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
</style>
</head>
<body>


 <div class="container pt-2 header">
        <div class="row head">
            <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                <a href="index.php"><img src="sritlogo.png" alt="Logo" class="float-left col-lg-3 col-md-3 col-sm-3 col-5"></a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-4 bar">
                 <ul class="nav" id="nav">
                    <li><a href="main.php">Main</a></li>
                    <li><a href="" data-toggle="modal" data-target="#hod_login">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                <i class="fas fa-bars float-right navigate" id="navigate" onclick="navigation()"></i>
                <i class="fas fa-times float-right wrong" id="wrong" onclick="wrong()"></i>
            </div>
        </div>
    </div>


</body>
</html>

    <script type="text/javascript">
    function navigation(){
            document.getElementById('nav').style.display = 'block';
            document.getElementById('navigate').style.display = 'none';
            document.getElementById('wrong').style.display = 'block';

        }    
        function wrong(){
            document.getElementById('nav').style.display = 'none';
            document.getElementById('navigate').style.display = 'block';
            document.getElementById('wrong').style.display = 'none';
        }
</script>
<!--HOD Login model-->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="hod_login" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="mt-4 mb-3">
                    <h4 class="modal-title text-center text-success">Update password</h4>
                </div>
                <div class="modal-body">
        <form method="post" action="">
                <div class="">
                <label for="username">Old Password</label>
                <input type="password" class="" id="username" placeholder="Enter Old password" name="oldPassword" required style="text-indent: 10px;">
                <!-- <p class="text-danger"></p>           -->
                </div>
                <div class="">
                    <label for="spwd"> New Password</label>
                    <input type="password" class="" placeholder="Enter New Password" id="spwd" name="newPassword" required style="text-indent: 10px;">
                    <!-- <p class="text-danger"></p> -->
                </div>
                <button type="submit" class="btn btn-grad1" name="update">Update</button>
        </form>
                </div>
            </div>
            
        </div>
    </div>
</div>